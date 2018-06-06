<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Animal;

/**
 * AnimalSearch represents the model behind the search form of `backend\models\Animal`.
 */
class AnimalSearch extends Animal
{
    /**
     * {@inheritdoc}
     */
    public $globalSearch;
    public function rules()
    {
        return [
            [['idAnimal', 'IdTipo', 'IdStatus', 'IdCategoria', 'IdSexo', 'IdFoto', 'user_id'], 'integer'],
            [['Nombre', 'FechaR','globalSearch'], 'safe'],
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
        $query = Animal::find();

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
            'idAnimal' => $this->idAnimal,
            'FechaR' => $this->FechaR,
            'IdTipo' => $this->IdTipo,
            'IdStatus' => $this->IdStatus,
            'IdCategoria' => $this->IdCategoria,
            'IdSexo' => $this->IdSexo,
            'IdFoto' => $this->IdFoto,
            'user_id' => $this->user_id,
        ]);

        $query->joinWith('categoria');

        $query->orFilterWhere(['like', 'idAnimal', $this->globalSearch])->
        orFilterWhere(['like', 'Nombre', $this->globalSearch])->
        orFilterWhere(['like', 'FechaR', $this->globalSearch])->
        orFilterWhere(['like', 'IdTipo', $this->globalSearch])->
        orFilterWhere(['like', 'IdStatus', $this->globalSearch])->
        //orFilterWhere(['like', 'IdCategoria', $this->globalSearch])->
        orFilterWhere(['like', 'IdSexo', $this->globalSearch])->
        orFilterWhere(['like', 'user_id', $this->globalSearch])->
        orFilterWhere(['like', 'categoria.Categoria', $this->globalSearch]);
        return $dataProvider;
    }
}
