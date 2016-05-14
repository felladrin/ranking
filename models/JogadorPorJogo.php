<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "jogador_por_jogo".
 *
 * @property integer $jogador_id
 * @property integer $jogo_id
 * @property integer $torneios
 * @property integer $titulos
 * @property integer $vitorias
 * @property integer $derrotas
 * @property integer $pontos
 *
 * @property Jogo $jogo
 * @property Jogador $jogador
 */
class JogadorPorJogo extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jogador_por_jogo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jogador_id', 'jogo_id'], 'required'],
            [['jogador_id', 'jogo_id', 'torneios', 'titulos', 'vitorias', 'derrotas', 'pontos'], 'integer'],
            [['jogo_id', 'jogador_id'], 'unique', 'targetAttribute' => ['jogo_id', 'jogador_id'], 'message' => 'The combination of Jogador ID and Jogo ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jogador_id' => 'Jogador ID',
            'jogo_id' => 'Jogo ID',
            'torneios' => 'Torneios',
            'titulos' => 'Títulos',
            'vitorias' => 'Vitórias',
            'derrotas' => 'Derrotas',
            'pontos' => 'Pontos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogo()
    {
        return $this->hasOne(Jogo::className(), ['id' => 'jogo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogador()
    {
        return $this->hasOne(Jogador::className(), ['id' => 'jogador_id']);
    }

    public static function garantirExistencia($jogo_id, $jogador_id)
    {
        $model = new self;
        $model->jogo_id = $jogo_id;
        $model->jogador_id = $jogador_id;
        if ($model->validate()) $model->save();
    }

    public static function atualizarPontuacao()
    {
        /** @var JogadorPorJogo[] $jogadoresPorJogos */
        $jogadoresPorJogos = JogadorPorJogo::find()->all();
        foreach ($jogadoresPorJogos as $jogadorPorJogo)
        {
            $numeroPartidas = Partida::find()->where(['jogo_id' => $jogadorPorJogo->jogo_id, 'jogador_um' => $jogadorPorJogo->jogador_id])->orWhere(['jogo_id' => $jogadorPorJogo->jogo_id, 'jogador_dois' => $jogadorPorJogo->jogador_id])->andWhere('jogador_vencedor IS NOT NULL')->count();
            $numeroDerrotas = Partida::find()->where(['jogo_id' => $jogadorPorJogo->jogo_id, 'jogador_um' => $jogadorPorJogo->jogador_id])->orWhere(['jogo_id' => $jogadorPorJogo->jogo_id, 'jogador_dois' => $jogadorPorJogo->jogador_id])->andWhere('jogador_vencedor IS NOT NULL')->andWhere(['not', ['jogador_vencedor' => $jogadorPorJogo->jogador_id]])->count();
            $numeroVitorias = Partida::find()->where(['jogo_id' => $jogadorPorJogo->jogo_id, 'jogador_vencedor' => $jogadorPorJogo->jogador_id])->count();

            $pontosTorneios = 1 * $jogadorPorJogo->torneios;
            $pontosTitulos = 2 * $jogadorPorJogo->titulos;
            $pontosVitorias = 1 * $numeroVitorias;
            $pontosPartidas = 1 * $numeroPartidas;

            $jogadorPorJogo->vitorias = $numeroVitorias;
            $jogadorPorJogo->derrotas = $numeroDerrotas;
            $jogadorPorJogo->pontos = $pontosTorneios + $pontosTitulos + $pontosVitorias + $pontosPartidas;
            $jogadorPorJogo->save();
        }
    }
}
