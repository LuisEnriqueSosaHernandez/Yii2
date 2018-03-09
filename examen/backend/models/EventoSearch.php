<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Evento;

/**
 * EventoSearch represents the model behind the search form of `backend\models\Evento`.
 */
class EventoSearch extends Evento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAsistente', 'Edad', 'Tel', 'Estado', 'Ciudad'], 'integer'],
            [['NombreAsistente', 'FechaNacimiento', 'Correo', 'Organizacion'], 'safe'],
            [['Ingresos'], 'number'],
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
        $query = Evento::find();

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
            'idAsistente' => $this->idAsistente,
            'FechaNacimiento' => $this->FechaNacimiento,
            'Edad' => $this->Edad,
            'Tel' => $this->Tel,
            'Estado' => $this->Estado,
            'Ciudad' => $this->Ciudad,
            'Ingresos' => $this->Ingresos,
        ]);

        $query->andFilterWhere(['like', 'NombreAsistente', $this->NombreAsistente])
            ->andFilterWhere(['like', 'Correo', $this->Correo])
            ->andFilterWhere(['like', 'Organizacion', $this->Organizacion]);

        return $dataProvider;
    }
}
