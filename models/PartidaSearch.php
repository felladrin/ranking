<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Partida;

/**
 * PartidaSearch represents the model behind the search form about `app\models\Partida`.
 */
class PartidaSearch extends Partida
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jogo_id', 'jogador_um', 'jogador_dois', 'jogador_vencedor'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Partida::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'jogo_id' => $this->jogo_id,
            'jogador_um' => $this->jogador_um,
            'jogador_dois' => $this->jogador_dois,
            'jogador_vencedor' => $this->jogador_vencedor,
        ]);

        return $dataProvider;
    }
}
