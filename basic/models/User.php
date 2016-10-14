<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $user_id
 * @property string $user_name
 * @property string $user_tel
 * @property string $user_email
 * @property string $user_birthday
 * @property string $user_academy
 * @property string $user_major
 * @property string $user_organization_id
 * @property string $user_department_id
 * @property string $user_introduction
 * @property string $user_reason
 * @property string $status
 *
 * @property Department $userDepartment
 * @property Organization $userOrganization
 */
class User extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['user_name', 'required', 'message' => '中文名字不能为空'],
            ['user_name', 'string', 'length' => [2, 4], 'message' => '中文名字过长'],
            ['user_tel', 'required', 'message' => '手机号码不能为空'],
            ['user_tel', 'integer', 'min' => 13000000000, 'message' => '请输入11位的手机号码'],
            ['user_email', 'required', 'message' => '邮箱不能为空'],
            ['user_email', 'email', 'message' => '请输入正确格式的邮箱'],
            ['user_birthday', 'required', 'message' => '生日不能空'],
            ['user_major', 'required', 'message' => '专业班级不能为空'],
            [['user_organization_id', 'user_department_id'], 'integer'],
            [['user_academy', 'user_major', 'user_introduction', 'user_reason'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '编号',
            'user_name' => '名称',
            'user_tel' => '手机号码',
            'user_email' => '电子邮箱',
            'user_birthday' => '出生年月日',
            'user_academy' => '学院',
            'user_major' => '专业',
            'user_organization_id' => '组织',
            'user_department_id' => '部门',
            'user_introduction' => '自我介绍',
            'user_reason' => '报名原因',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'user_department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrganization()
    {
        return $this->hasOne(Organization::className(), ['organization_id' => 'user_organization_id']);
    }

    /**
     * 报名，把表单信息存到数据库，成功返回true，失败返回false
     * @return boolean
     */
    public function register($data){
        if ($this->load($data) && $this->validate()) {
            $this->save();
            return true;
        }
        return false;
    }
}
