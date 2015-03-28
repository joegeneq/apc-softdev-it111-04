<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "airlines".
 *
 * @property integer $id
 * @property string $airline_name
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
        	[['airline_name'], 'unique', 'message' => 'Duplicate records'],
        	[['airline_name'], 'required'],
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
}
