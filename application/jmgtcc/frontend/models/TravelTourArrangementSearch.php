<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TravelTourArrangement;

/**
 * TravelTourArrangementSearch represents the model behind the search form about `frontend\models\TravelTourArrangement`.
 */
class TravelTourArrangementSearch extends TravelTourArrangement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number_of_pax', 'user_id'], 'integer'],
            [['arrangement_code', 'place_of_origin', 'destination', 'departure_date', 'return_date', 'airline_name', 'flight_type', 'class_type', 'hotel_name', 'room_type', 'inclusion_food_deals', 'inclusion_freebies', 'inclusion_tour_type', 'inclusion_transport_service', 'remarks', 'date_created'], 'safe'],
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
        $query = TravelTourArrangement::find()->where(['user_id'=>Yii::$app->user->identity->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['arrangement_code'=>SORT_DESC]]
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
            'date_created' => $this->date_created,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'arrangement_code', $this->arrangement_code])
            ->andFilterWhere(['like', 'place_of_origin', $this->place_of_origin])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'airline_name', $this->airline_name])
            ->andFilterWhere(['like', 'flight_type', $this->flight_type])
            ->andFilterWhere(['like', 'class_type', $this->class_type])
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
