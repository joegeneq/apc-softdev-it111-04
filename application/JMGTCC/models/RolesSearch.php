<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Roles;

/**
 * RolesSearch represents the model behind the search form about `app\models\Roles`.
 */
class RolesSearch extends Roles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RoleID'], 'integer'],
            [['RoleName', 'Description'], 'safe'],
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
        $query = Roles::find();

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
            'RoleID' => $this->RoleID,
        ]);

        $query->andFilterWhere(['like', 'RoleName', $this->RoleName])
            ->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProvider;
    }
}
