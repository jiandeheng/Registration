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
 * @property string $user_organization
 * @property string $user_department
 * @property string $user_introduction
 * @property string $user_reason
 * @property string $status
 */
class User extends \yii\db\ActiveRecord
{

    public $username;
    public $password;

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
            [['user_academy', 'user_major', 'user_introduction', 'user_reason', 'user_organization', 'user_department'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_tel' => 'User Tel',
            'user_email' => 'User Email',
            'user_birthday' => 'User Birthday',
            'user_academy' => 'User Academy',
            'user_major' => 'User Major',
            'user_organization' => 'User Organization',
            'user_department' => 'User Department',
            'user_introduction' => 'User Introduction',
            'user_reason' => 'User Reason',
            'status' => 'Status',
        ];
    }

    public function register($data){
        $this->scenario = "register";
        if ($this->load($data) && $this->validate()) {
            $this->save();
            return true;
        }
        return false;
    }
}
