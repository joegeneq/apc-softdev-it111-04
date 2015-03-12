<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contact_number".
 *
 * @property integer $id
 * @property string $country
 * @property string $prefix
 * @property integer $digits
 */
class ContactNumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_number';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['digits'], 'integer'],
            [['country'], 'string', 'max' => 45],
            [['prefix'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country' => Yii::t('app', 'Country'),
            'prefix' => Yii::t('app', 'Prefix'),
            'digits' => Yii::t('app', 'Digits'),
        ];
    }
}
