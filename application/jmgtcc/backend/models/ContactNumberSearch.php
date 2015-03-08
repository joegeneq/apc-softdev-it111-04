<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ContactNumber;

/**
 * ContactNumberSearch represents the model behind the search form about `backend\models\ContactNumber`.
 */
class ContactNumberSearch extends ContactNumber
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'digits'], 'integer'],
            [['country', 'prefix'], 'safe'],
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
            'id' => $this->id,
            'digits' => $this->digits,
        ]);

        $query->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'prefix', $this->prefix]);

        return $dataProvider;
    }
}
