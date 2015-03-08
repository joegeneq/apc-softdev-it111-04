<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "airlines".
 *
 * @property integer $id
 * @property string $airline_name
 *
 * @property TravelArrangement[] $travelArrangements
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
            [['airline_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'airline_name' => Yii::t('app', 'Airline Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelArrangements()
    {
        return $this->hasMany(TravelArrangement::className(), ['airlines_id' => 'id']);
    }
}
