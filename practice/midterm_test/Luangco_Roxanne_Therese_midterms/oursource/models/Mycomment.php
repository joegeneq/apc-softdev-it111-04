<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mycomment".
 *
 * @property integer $id
 * @property integer $myaddress_id
 * @property string $author
 * @property string $body
 * @property string $created_at
 *
 * @property Myaddress $myaddress
 */
class Mycomment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mycomment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'myaddress_id', 'author', 'body'], 'required'],
            [['id', 'myaddress_id'], 'integer'],
            [['body'], 'string'],
            [['created_at'], 'safe'],
            [['author'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'myaddress_id' => Yii::t('app', 'Myaddress ID'),
            'author' => Yii::t('app', 'Author'),
            'body' => Yii::t('app', 'Body'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMyaddress()
    {
        return $this->hasOne(Myaddress::className(), ['id' => 'myaddress_id']);
    }
}
