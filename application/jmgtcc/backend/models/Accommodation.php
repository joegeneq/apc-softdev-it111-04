<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "accommodation".
 *
 * @property integer $id
 * @property string $accommodation_name
 * @property string $accommodation_desc
 */
class Accommodation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accommodation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accommodation_desc'], 'string'],
            [['accommodation_name'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'accommodation_name' => Yii::t('app', 'Accommodation Name'),
            'accommodation_desc' => Yii::t('app', 'Accommodation Desc'),
        ];
    }
}
