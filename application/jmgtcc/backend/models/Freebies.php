<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "freebies".
 *
 * @property integer $id
 * @property string $freebies_name
 * @property string $freebies_description
 */
class Freebies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'freebies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freebies_name', 'freebies_description'], 'required'],
        	[['freebies_name', 'freebies_description'], 'unique', 'message' => 'Duplicate records'],
            [['freebies_name'], 'string', 'max' => 45],
        	[['freebies_description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'freebies_name' => Yii::t('app', 'Freebies Name'),
            'freebies_description' => Yii::t('app', 'Freebies Description'),
        ];
    }
}
