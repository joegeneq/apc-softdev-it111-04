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
            [['id', 'number_of_pax', 'hotels_id', 'airlines_id', 'user_id'], 'integer'],
            [['arrangement_code', 'destination', 'departure_date', 'return_date', 'flight_type', 'class_type', 'hotel_name', 'room_type', 'inclusion', 'remarks', 'date_created', 'status', 'date_confirmed', 'confirmed_by', 'date_updated', 'updated_by'], 'safe'],
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
        $query = TravelTourArrangement::find();

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
            'date_created' => $this->date_created,
            'date_confirmed' => $this->date_confirmed,
            'date_updated' => $this->date_updated,
            'hotels_id' => $this->hotels_id,
            'airlines_id' => $this->airlines_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'arrangement_code', $this->arrangement_code])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'flight_type', $this->flight_type])
            ->andFilterWhere(['like', 'class_type', $this->class_type])
            ->andFilterWhere(['like', 'hotel_name', $this->hotel_name])
            ->andFilterWhere(['like', 'room_type', $this->room_type])
            ->andFilterWhere(['like', 'inclusion', $this->inclusion])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'confirmed_by', $this->confirmed_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}