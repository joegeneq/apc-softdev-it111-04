<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "myaddress".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $gender
 * @property string $created_at
 *
 * @property Mycomment[] $mycomments
 */
class Myaddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'myaddress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'firstname', 'middlename', 'lastname', 'gender'], 'required'],
            [['id'], 'integer'],
            [['created_at'], 'safe'],
            [['firstname', 'middlename', 'lastname'], 'string', 'max' => 30],
            [['gender'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstname' => Yii::t('app', 'First Name'),
            'middlename' => Yii::t('app', 'Middle Name'),
            'lastname' => Yii::t('app', 'Last Name'),
            'gender' => Yii::t('app', 'Male/Female'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMycomments()
    {
        return $this->hasMany(Mycomment::className(), ['myaddress_id' => 'id']);
    }
}
