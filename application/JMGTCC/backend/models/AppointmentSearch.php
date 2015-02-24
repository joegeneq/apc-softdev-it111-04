<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Appointment;

/**
 * AppointmentSearch represents the model behind the search form about `backend\models\Appointment`.
 */
class AppointmentSearch extends Appointment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AppointmentID', 'user_id'], 'integer'],
            [['ClientName', 'ClientUsername', 'City', 'ContactNumber', 'EmailAddress', 'AppointmentDate', 'AppointmentTime', 'VisaType', 'DateCreated', 'ConfirmedBy', 'Status', 'Message'], 'safe'],
            [['PaymentRate'], 'number'],
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
        $query = Appointment::find();

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
            'AppointmentID' => $this->AppointmentID,
            'AppointmentDate' => $this->AppointmentDate,
            'AppointmentTime' => $this->AppointmentTime,
            'DateCreated' => $this->DateCreated,
            'PaymentRate' => $this->PaymentRate,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'ClientName', $this->ClientName])
            ->andFilterWhere(['like', 'ClientUsername', $this->ClientUsername])
            ->andFilterWhere(['like', 'City', $this->City])
            ->andFilterWhere(['like', 'ContactNumber', $this->ContactNumber])
            ->andFilterWhere(['like', 'EmailAddress', $this->EmailAddress])
            ->andFilterWhere(['like', 'VisaType', $this->VisaType])
            ->andFilterWhere(['like', 'ConfirmedBy', $this->ConfirmedBy])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Message', $this->Message]);

        return $dataProvider;
    }
}
