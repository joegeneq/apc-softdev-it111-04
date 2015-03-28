<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tour_type".
 *
 * @property integer $id
 * @property string $tour_name
 * @property string $tour_description
 */
class TourType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tour_name', 'tour_description'], 'required'],
            [['tour_description'], 'string'],
        	[['tour_name', 'tour_description'], 'unique', 'message' => 'Duplicate records'],
            [['tour_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tour_name' => Yii::t('app', 'Tour Name'),
            'tour_description' => Yii::t('app', 'Tour Description'),
        ];
    }
}
