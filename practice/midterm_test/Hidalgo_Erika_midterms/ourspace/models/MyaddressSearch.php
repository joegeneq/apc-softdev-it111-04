<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Myaddress;

/**
 * MyaddressSearch represents the model behind the search form about `app\models\Myaddress`.
 */
class MyaddressSearch extends Myaddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'home_address'], 'integer'],
            [['firstname', 'middlename', 'lastname', 'gender', 'created_at', 'landline', 'cellphone'], 'safe'],
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
        $query = Myaddress::find();

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
            'created_at' => $this->created_at,
            'home_address' => $this->home_address,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'middlename', $this->middlename])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'landline', $this->landline])
            ->andFilterWhere(['like', 'cellphone', $this->cellphone]);

        return $dataProvider;
    }
}
