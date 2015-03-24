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
            [['id', 'user_id', 'staff_id'], 'integer'],
            [['appointment_code', 'client_name', 'client_username', 'city', 'contact_number', 'email_address', 'appointment_date', 'appointment_time', 'country', 'visa_type', 'date_created', 'status', 'confirmed_by', 'notes'], 'safe'],
            [['payment_rate'], 'number'],
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

        $query->joinwith('time');

        $query->andFilterWhere([
            'id' => $this->appointment_code
        ]);

        $query->andFilterWhere(['like', 'appointment_code', $this->appointment_code])
            ->andFilterWhere(['like', 'client_name', $this->client_name])
            ->andFilterWhere(['like', 'status', $this->status])

            ->andFilterWhere(['like', 'appointment_date', $this->appointment_date])
            ->andFilterWhere(['like', 'time.time', $this->appointment_time]);

        return $dataProvider;
    }
}
