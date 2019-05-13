<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Funcionarios;

/**
 * FuncionariosSearch represents the model behind the search form of `app\models\Funcionarios`.
 */
class FuncionariosSearch extends Funcionarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cpf', 'nome', 'cargo', 'cidade', 'estado'], 'safe'],
            [['idade', 'departamento'], 'integer'],
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
        $query = Funcionarios::find();

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
            'idade' => $this->idade,
            'departamento' => $this->departamento,
        ]);

        $query->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
