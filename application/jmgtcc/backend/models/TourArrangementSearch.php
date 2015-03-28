<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TourArrangement;

/**
 * TourArrangementSearch represents the model behind the search form about `backend\models\TourArrangement`.
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
            [['arrangement_code', 'place_of_origin', 'destination', 'arrival_date', 'return_date', 'hotel_name', 'room_type', 'inclusion_food_deals', 'inclusion_freebies', 'inclusion_tour_type', 'inclusion_transport_service', 'remarks', 'date_created'], 'safe'],
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
            'arrival_date' => $this->arrival_date,
            'return_date' => $this->return_date,
            'number_of_pax' => $this->number_of_pax,
            'date_created' => $this->date_created,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'arrangement_code', $this->arrangement_code])
            ->andFilterWhere(['like', 'place_of_origin', $this->place_of_origin])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'hotel_name', $this->hotel_name])
            ->andFilterWhere(['like', 'room_type', $this->room_type])
            ->andFilterWhere(['like', 'inclusion_food_deals', $this->inclusion_food_deals])
            ->andFilterWhere(['like', 'inclusion_freebies', $this->inclusion_freebies])
            ->andFilterWhere(['like', 'inclusion_tour_type', $this->inclusion_tour_type])
            ->andFilterWhere(['like', 'inclusion_transport_service', $this->inclusion_transport_service])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
