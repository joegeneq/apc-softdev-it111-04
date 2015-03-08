<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "time".
 *
 * @property integer $id
 * @property string $time
 * @property string $description
 */
class Time extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'time';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time', 'description'], 'required'],
            [['time'], 'safe'],
            [['description'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'time' => Yii::t('app', 'Time'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
