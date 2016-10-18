<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department_user".
 *
 * @property string $department_user_id
 * @property string $department_user_username
 * @property string $department_user_password
 * @property string $department_id
 * @property string $organization_id
 *
 * @property Department $department
 */
class DepartmentUser extends \yii\db\ActiveRecord
{

    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password'], 'required', 'message' => '密码不能为空' ],
            [['department_user_username', 'department_user_password'], 'required', 'message' => '账号密码不能为空'],
            [['department_id', 'organization_id'], 'required'],
            [['department_id', 'organization_id'], 'integer'],
            [['department_user_username'], 'string', 'max' => 20],
            [['department_user_password'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_user_id' => '编号',
            'department_user_username' => '账号',
            'department_user_password' => '密码',
            'department_id' => '所属部门',
            'password' => '密码',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['organization_id' => 'organization_name']);
    }

    public function createUser(){
        $this->department_user_password = md5($this->password);
        return $this->save();
    }

    public function updateUser(){
        if($this->password != $this->department_user_password){
            $this->department_user_password = md5($this->password);
        }
        return $this->update();
    }
}
