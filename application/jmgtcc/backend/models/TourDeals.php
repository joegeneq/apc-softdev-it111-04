<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tour_deals".
 *
 * @property integer $id
 * @property string $deal_name
 * @property string $deal_description
 */
class TourDeals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour_deals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deal_description'], 'string'],
            [['deal_name'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'deal_name' => Yii::t('app', 'Deal Name'),
            'deal_description' => Yii::t('app', 'Deal Description'),
        ];
    }
}
