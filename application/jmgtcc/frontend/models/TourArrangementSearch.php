<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TourArrangement;

/**
 * TourArrangementSearch represents the model behind the search form about `frontend\models\TourArrangement`.
 */
class TourArrangementSearch extends TourArrangement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number_of_pax', 'user_id'], 'integer'],
            [['destination', 'departure_date', 'return_date', 'airline_name', 'flight_type', 'class_type', 'remarks'], 'safe'],
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
        $query = TourArrangement::find();

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
            'departure_date' => $this->departure_date,
            'return_date' => $this->return_date,
            'number_of_pax' => $this->number_of_pax,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'airline_name', $this->airline_name])
            ->andFilterWhere(['like', 'flight_type', $this->flight_type])
            ->andFilterWhere(['like', 'class_type', $this->class_type])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
