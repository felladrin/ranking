<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jogo".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property Partida[] $partidas
 * @property JogadorPorJogo[] $JogadorPorJogos
 * @property Jogador[] $jogadors
 */
class Jogo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jogo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'unique'],
            [['nome'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidas()
    {
        return $this->hasMany(Partida::className(), ['jogo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogadorPorJogos()
    {
        return $this->hasMany(JogadorPorJogo::className(), ['jogo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogadors()
    {
        return $this->hasMany(Jogador::className(), ['id' => 'jogador_id'])->viaTable('jogador_por_jogo', ['jogo_id' => 'id']);
    }
}
