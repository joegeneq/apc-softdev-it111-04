<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContactNumber;

/**
 * ContactNumberSearch represents the model behind the search form about `app\models\ContactNumber`.
 */
class ContactNumberSearch extends ContactNumber
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NumberID', 'Digits'], 'integer'],
            [['Country', 'Prefix'], 'safe'],
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
        $query = ContactNumber::find();

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
            'NumberID' => $this->NumberID,
            'Digits' => $this->Digits,
        ]);

        $query->andFilterWhere(['like', 'Country', $this->Country])
            ->andFilterWhere(['like', 'Prefix', $this->Prefix]);

        return $dataProvider;
    }
}
