<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deals".
 *
 * @property integer $DealID
 * @property string $Deal
 * @property string $Description
 */
class Deals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Description'], 'string'],
            [['Deal'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DealID' => Yii::t('app', 'Deal ID'),
            'Deal' => Yii::t('app', 'Deal'),
            'Description' => Yii::t('app', 'Description'),
        ];
    }
}
