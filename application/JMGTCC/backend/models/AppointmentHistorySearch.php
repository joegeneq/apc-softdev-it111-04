<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AppointmentHistory;

/**
 * AppointmentHistorySearch represents the model behind the search form about `backend\models\AppointmentHistory`.
 */
class AppointmentHistorySearch extends AppointmentHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HistoryID', 'Appointment_AppointmentID'], 'integer'],
            [['PrevAppointmenttDate', 'PrevAppointmentTime'], 'safe'],
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
        $query = AppointmentHistory::find();

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
            'HistoryID' => $this->HistoryID,
            'PrevAppointmenttDate' => $this->PrevAppointmenttDate,
            'PrevAppointmentTime' => $this->PrevAppointmentTime,
            'Appointment_AppointmentID' => $this->Appointment_AppointmentID,
        ]);

        return $dataProvider;
    }
}
