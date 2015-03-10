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
            [['id', 'number_of_pax', 'hotels_id'], 'integer'],
            [['destination', 'arrival_date', 'departure_date', 'hotel_name', 'room_type', 'inclusion', 'remarks'], 'safe'],
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
            'departure_date' => $this->departure_date,
            'number_of_pax' => $this->number_of_pax,
            'hotels_id' => $this->hotels_id,
        ]);

        $query->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'hotel_name', $this->hotel_name])
            ->andFilterWhere(['like', 'room_type', $this->room_type])
            ->andFilterWhere(['like', 'inclusion', $this->inclusion])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
