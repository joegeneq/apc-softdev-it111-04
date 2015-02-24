<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contactnumber".
 *
 * @property integer $NumberID
 * @property string $Country
 * @property string $Prefix
 * @property integer $Digits
 */
class Contactnumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contactnumber';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Digits'], 'integer'],
            [['Country'], 'string', 'max' => 45],
            [['Prefix'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NumberID' => 'Number ID',
            'Country' => 'Country',
            'Prefix' => 'Prefix',
            'Digits' => 'Digits',
        ];
    }
}
