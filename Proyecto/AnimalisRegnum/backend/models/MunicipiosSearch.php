<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Municipios;

/**
 * MunicipiosSearch represents the model behind the search form of `backend\models\Municipios`.
 */
class MunicipiosSearch extends Municipios
{
    /**
     * {@inheritdoc}
     */

    public $globalSearch;

    public function rules()
    {
        return [
            [['IdMunicipio', 'IdEstado'], 'integer'],
            [['Nombre','globalSearch'], 'safe'],
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
        $query = Municipios::find();

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
            'IdMunicipio' => $this->IdMunicipio,
            'IdEstado' => $this->IdEstado,
        ]);

        $query->orFilterWhere(['like', 'Nombre', $this->globalSearch])->
         orFilterWhere(['like', 'IdMunicipio', $this->globalSearch])->
        orFilterWhere(['like', 'IdEstado', $this->globalSearch]);

        return $dataProvider;
    }
}
