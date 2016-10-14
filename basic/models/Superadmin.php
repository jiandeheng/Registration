<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "superadmin".
 *
 * @property string $superadmin_id
 * @property string $superadmin_username
 * @property string $superadmin_password
 */
class Superadmin extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $loginUsername;
    public $loginPassword;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'superadmin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loginUsername', 'loginPassword'], 'required', 'message' => '账号密码不能为空..'],
            ['loginPassword', 'validatePass', 'on' => ['login']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'superadmin_id' => 'Superadmin ID',
            'superadmin_username' => 'Superadmin Username',
            'superadmin_password' => 'Superadmin Password',
        ];
    }

    public function validatePass()
    {
        if (!$this->hasErrors()) {
            $data = self::find()->where('superadmin_username = :loginUsername and superadmin_password = :loginPassword', [':loginUsername' => $this->loginUsername, ':loginPassword' => md5($this->loginPassword)])->one();
            if (is_null($data)) {
                $this->addError("loginPassword", "用户名或者密码错误");
            } else{
                Yii::$app->user->login($data);
            }
        }
    }

     public function login($data)
    {
        $this->scenario = "login";
        if ($this->load($data) && $this->validate()) {
            //做点有意义的事
            $session = Yii::$app->session;
            $session['loginUsername'] = $this->loginUsername;
            $session['isLogin'] = 1;
            return (bool)$session['isLogin'];
        }
        return false;
    }

    /**
     * 根据给到的ID查询身份。
     *
     * @param string|integer $id 被查询的ID
     * @return IdentityInterface|null 通过ID匹配到的身份对象
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * 根据 token 查询身份。
     *
     * @param string $token 被查询的 token
     * @return IdentityInterface|null 通过 token 得到的身份对象
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string 当前用户ID
     */
    public function getId()
    {
        return $this->superadmin_id;
    }

    /**
     * @return string 当前用户的（cookie）认证密钥
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

}
