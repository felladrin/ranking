<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partida".
 *
 * @property integer $id
 * @property integer $jogo_id
 * @property integer $jogador_um
 * @property integer $jogador_dois
 * @property integer $jogador_vencedor
 *
 * @property Jogador $jogadorUm
 * @property Jogador $jogadorVencedor
 * @property Jogador $jogadorDois
 * @property Jogo $jogo
 */
class Partida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jogo_id', 'jogador_um', 'jogador_dois'], 'required'],
            [['jogo_id', 'jogador_um', 'jogador_dois', 'jogador_vencedor'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jogo_id' => 'Jogo ID',
            'jogador_um' => 'Jogador Um',
            'jogador_dois' => 'Jogador Dois',
            'jogador_vencedor' => 'Jogador Vencedor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogadorUm()
    {
        return $this->hasOne(Jogador::className(), ['id' => 'jogador_um']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogadorVencedor()
    {
        return $this->hasOne(Jogador::className(), ['id' => 'jogador_vencedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogadorDois()
    {
        return $this->hasOne(Jogador::className(), ['id' => 'jogador_dois']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogo()
    {
        return $this->hasOne(Jogo::className(), ['id' => 'jogo_id']);
    }
}
