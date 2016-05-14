<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jogador".
 *
 * @property integer $id
 * @property string $nome
 * @property string $link
 * @property string $email
 *
 * @property Partida[] $partidas
 * @property JogadorPorJogo[] $JogadorPorJogos
 * @property Jogo[] $jogos
 */
class Jogador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jogador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'link', 'email'], 'required'],
            [['nome', 'link', 'email'], 'string'],
            [['email'], 'unique']
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
            'link' => 'Link',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidas()
    {
        return $this->hasMany(Partida::className(), ['jogador_dois' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogadorPorJogos()
    {
        return $this->hasMany(JogadorPorJogo::className(), ['jogador_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogos()
    {
        return $this->hasMany(Jogo::className(), ['id' => 'jogo_id'])->viaTable('jogador_por_jogo', ['jogador_id' => 'id']);
    }

    /**
     * Get either a Gravatar URL for a specified email address.
     *
     * @param int|string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @return String containing either just a URL or a complete image tag
     */
    public function pegarGravatarUrl($s = 80, $d = 'retro', $r = 'g')
    {
        return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email))) . "?s=$s&d=$d&r=$r";
    }
}
