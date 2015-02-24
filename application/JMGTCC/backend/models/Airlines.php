<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "airlines".
 *
 * @property integer $AirlineID
 * @property string $AirlineName
 *
 * @property Travelarrangement[] $travelarrangements
 */
class Airlines extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'airlines';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AirlineName'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AirlineID' => 'Airline ID',
            'AirlineName' => 'Airline Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelarrangements()
    {
        return $this->hasMany(Travelarrangement::className(), ['Airlines_AirlineID' => 'AirlineID']);
    }
}
