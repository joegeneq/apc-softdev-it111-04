<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property integer $RoleID
 * @property string $RoleName
 * @property string $RoleDescription
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
            [['RoleDescription'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'RoleID' => 'Role ID',
            'RoleName' => 'Role Name',
            'RoleDescription' => 'Role Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['roles_RoleID' => 'RoleID']);
    }
}
