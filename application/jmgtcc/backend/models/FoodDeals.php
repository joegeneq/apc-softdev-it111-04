<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "food_deals".
 *
 * @property integer $id
 * @property string $food_deal_name
 * @property string $food_deal_description
 */
class FoodDeals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'food_deals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['food_deal_name', 'food_deal_description'], 'required'],
            [['food_deal_description'], 'string'],
        	[['food_deal_name'], 'unique', 'message' => 'Duplicate records'],
            [['food_deal_name'], 'string', 'max' => 45]
        		
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'food_deal_name' => Yii::t('app', 'Food Deal Name'),
            'food_deal_description' => Yii::t('app', 'Food Deal Description'),
        ];
    }
}
