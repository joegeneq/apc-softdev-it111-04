<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TourDeals;

/**
 * TourDealsSearch represents the model behind the search form about `app\models\TourDeals`.
 */
class TourDealsSearch extends TourDeals
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DealID'], 'integer'],
            [['DealName', 'DealDescription'], 'safe'],
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
        $query = TourDeals::find();

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
            'DealID' => $this->DealID,
        ]);

        $query->andFilterWhere(['like', 'DealName', $this->DealName])
            ->andFilterWhere(['like', 'DealDescription', $this->DealDescription]);

        return $dataProvider;
    }
}
