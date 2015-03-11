<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "inclusion".
 *
 * @property integer $id
 * @property string $tour_type
 * @property string $food_deals
 * @property string $transport_service
 * @property string $freebies
 * @property string $remarks
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
            [['tour_type', 'food_deals', 'transport_service', 'freebies'], 'required'],
            [['tour_type'], 'string', 'max' => 60],
            [['food_deals', 'transport_service', 'freebies', 'remarks'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tour_type' => Yii::t('app', 'Tour Type'),
            'food_deals' => Yii::t('app', 'Food Deals'),
            'transport_service' => Yii::t('app', 'Transport Service'),
            'freebies' => Yii::t('app', 'Freebies'),
            'remarks' => Yii::t('app', 'Remarks'),
        ];
    }
}
