<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property integer $RoleID
 * @property string $RoleName
 * @property string $Description
 *
 * @property User[] $users
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RoleName'], 'string', 'max' => 25],
            [['Description'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'RoleID' => Yii::t('app', 'Role ID'),
            'RoleName' => Yii::t('app', 'Role Name'),
            'Description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['Roles_RoleID' => 'RoleID']);
    }
}
