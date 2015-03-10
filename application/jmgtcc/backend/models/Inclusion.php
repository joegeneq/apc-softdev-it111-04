<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "inclusion".
 *
 * @property integer $id
 * @property string $inclusion_name
 * @property string $inclusion_description
 * @property string $price
 */
class Inclusion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inclusion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inclusion_name', 'inclusion_description'], 'required'],
            [['inclusion_description'], 'string'],
            [['price'], 'number'],
            [['inclusion_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'inclusion_name' => Yii::t('app', 'Inclusion Name'),
            'inclusion_description' => Yii::t('app', 'Inclusion Description'),
            'price' => Yii::t('app', 'Price'),
        ];
    }
}
