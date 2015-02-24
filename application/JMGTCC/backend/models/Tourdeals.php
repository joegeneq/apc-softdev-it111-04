<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tourdeals".
 *
 * @property integer $DealID
 * @property string $DealName
 * @property string $DealDescription
 */
class Tourdeals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tourdeals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DealDescription'], 'string'],
            [['DealName'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DealID' => 'Deal ID',
            'DealName' => 'Deal Name',
            'DealDescription' => 'Deal Description',
        ];
    }
}
