<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\province;

/**
 * ProvinceSearch represents the model behind the search form about `app\models\province`.
 */
class ProvinceSearch extends province
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['province_code', 'province_description', 'region_id'], 'safe'],
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
        $query = province::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinwith('region');

        $query->andFilterWhere([
            'id' => $this->id,
            // 'region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['like', 'province_code', $this->province_code])
            ->andFilterWhere(['like', 'province_description', $this->province_description])
            ->andFilterWhere(['like', 'region.region_code', $this->region_id])
            ;

        return $dataProvider;
    }
}
