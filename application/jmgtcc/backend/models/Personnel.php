<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "personnel".
 *
 * @property integer $id
 * @property string $personnel_name
 * @property string $email
 */
class Personnel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personnel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['personnel_name', 'email'], 'required'],
            [['personnel_name', 'email'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'personnel_name' => Yii::t('app', 'Personnel Name'),
            'email' => Yii::t('app', 'Email'),
        ];
    }
}
