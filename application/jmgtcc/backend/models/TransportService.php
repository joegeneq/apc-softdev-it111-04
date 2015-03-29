<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "transport_service".
 *
 * @property integer $id
 * @property string $transport_type
 * @property string $transport_description
 */
class TransportService extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transport_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transport_type', 'transport_description'], 'required'],
            [['transport_description'], 'string'],
        	[['transport_type', 'transport_description'], 'unique', 'message' => 'Duplicate records'],
            [['transport_type'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'transport_type' => Yii::t('app', 'Transport Type'),
            'transport_description' => Yii::t('app', 'Transport Description'),
        ];
    }
}
