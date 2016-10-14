<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization_user".
 *
 * @property string $organization_user_id
 * @property string $organization_user_username
 * @property string $organization_user_password
 * @property string $organization_id
 *
 * @property Organization $organizationUser
 */
class OrganizationUser extends \yii\db\ActiveRecord
{

    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password'], 'required', 'message' => '密码不能为空'],
            [['organization_user_username', 'organization_user_password'], 'required', 'message' => '账号密码不能为空'],
            [['organization_id'], 'required'],
            [['organization_id'], 'integer'],
            [['organization_user_username'], 'string', 'max' => 20],
            [['organization_user_password'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'organization_user_id' => '账号编号',
            'organization_user_username' => '用户名',
            'organization_user_password' => '密码',
            'organization_id' => '所属一级组织',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['organization_id' => 'organization_id']);
    }

    public function createUser(){
        $this->organization_user_password = md5($this->password);
        return $this->save();
    }

    public function updateUser(){
        if($this->password != $this->organization_user_password){
            $this->organization_user_password = md5($this->password);
        }
        return $this->update();
    }
}
