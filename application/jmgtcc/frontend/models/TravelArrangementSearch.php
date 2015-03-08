<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TravelArrangement;

/**
 * TravelArrangementSearch represents the model behind the search form about `frontend\models\TravelArrangement`.
 */
class TravelArrangementSearch extends TravelArrangement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number_of_adult', 'numbrt_of_children', 'number_of_infant', 'number_of_rooms', 'hotels_id', 'airlines_id', 'user_id'], 'integer'],
            [['arrangement_code', 'departure_date', 'return_date', 'place_of_origin', 'destination', 'hotel_name', 'star_rating', 'accommodation', 'flight_type', 'cabin_type', 'tour_type', 'tour_deals', 'transport_service', 'date_created', 'status', 'date_confirmed', 'confirmed_by', 'date_updated', 'updated_by', 'notes'], 'safe'],
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
        $query = TravelArrangement::find();

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
            'number_of_adult' => $this->number_of_adult,
            'numbrt_of_children' => $this->numbrt_of_children,
            'number_of_infant' => $this->number_of_infant,
            'number_of_rooms' => $this->number_of_rooms,
            'date_created' => $this->date_created,
            'date_confirmed' => $this->date_confirmed,
            'date_updated' => $this->date_updated,
            'hotels_id' => $this->hotels_id,
            'airlines_id' => $this->airlines_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'arrangement_code', $this->arrangement_code])
            ->andFilterWhere(['like', 'place_of_origin', $this->place_of_origin])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'hotel_name', $this->hotel_name])
            ->andFilterWhere(['like', 'star_rating', $this->star_rating])
            ->andFilterWhere(['like', 'accommodation', $this->accommodation])
            ->andFilterWhere(['like', 'flight_type', $this->flight_type])
            ->andFilterWhere(['like', 'cabin_type', $this->cabin_type])
            ->andFilterWhere(['like', 'tour_type', $this->tour_type])
            ->andFilterWhere(['like', 'tour_deals', $this->tour_deals])
            ->andFilterWhere(['like', 'transport_service', $this->transport_service])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'confirmed_by', $this->confirmed_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
