<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\veiculo;

/**
 * veiculoSearch represents the model behind the search form of `app\models\veiculo`.
 */
class veiculoSearch extends veiculo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chassi', 'marca', 'modelo', 'placa', 'cpf_proprietario'], 'safe'],
            [['ano'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = veiculo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ano' => $this->ano,
        ]);

        $query->andFilterWhere(['like', 'chassi', $this->chassi])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'placa', $this->placa])
            ->andFilterWhere(['like', 'cpf_proprietario', $this->cpf_proprietario]);

        return $dataProvider;
    }
}
