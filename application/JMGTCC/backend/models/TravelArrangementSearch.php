<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TravelArrangement;

/**
 * TravelArrangementSearch represents the model behind the search form about `backend\models\TravelArrangement`.
 */
class TravelArrangementSearch extends TravelArrangement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ArrangementID', 'NumberOfAdult', 'NumberOfChildren', 'NumberOfInfant', 'NumberOfRooms', 'Airlines_AirlineID', 'Hotels_HotelID', 'user_id'], 'integer'],
            [['DepartureDate', 'ReturnDate', 'PlaceOfOrigin', 'Destination', 'HotelName', 'StarRating', 'Accommodation', 'Flight Type', 'CabinType', 'TourType', 'TourDeals', 'TransportService', 'DateCreated', 'Status', 'DateConfirmed', 'ConfirmedBy', 'DateUpdated', 'UpdatedBy'], 'safe'],
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
            'ArrangementID' => $this->ArrangementID,
            'DepartureDate' => $this->DepartureDate,
            'ReturnDate' => $this->ReturnDate,
            'NumberOfAdult' => $this->NumberOfAdult,
            'NumberOfChildren' => $this->NumberOfChildren,
            'NumberOfInfant' => $this->NumberOfInfant,
            'NumberOfRooms' => $this->NumberOfRooms,
            'DateCreated' => $this->DateCreated,
            'DateConfirmed' => $this->DateConfirmed,
            'DateUpdated' => $this->DateUpdated,
            'Airlines_AirlineID' => $this->Airlines_AirlineID,
            'Hotels_HotelID' => $this->Hotels_HotelID,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'PlaceOfOrigin', $this->PlaceOfOrigin])
            ->andFilterWhere(['like', 'Destination', $this->Destination])
            ->andFilterWhere(['like', 'HotelName', $this->HotelName])
            ->andFilterWhere(['like', 'StarRating', $this->StarRating])
            ->andFilterWhere(['like', 'Accommodation', $this->Accommodation])
            ->andFilterWhere(['like', 'Flight Type', $this->Flight Type])
            ->andFilterWhere(['like', 'CabinType', $this->CabinType])
            ->andFilterWhere(['like', 'TourType', $this->TourType])
            ->andFilterWhere(['like', 'TourDeals', $this->TourDeals])
            ->andFilterWhere(['like', 'TransportService', $this->TransportService])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'ConfirmedBy', $this->ConfirmedBy])
            ->andFilterWhere(['like', 'UpdatedBy', $this->UpdatedBy]);

        return $dataProvider;
    }
}
