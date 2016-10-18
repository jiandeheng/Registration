<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\OrganizationUser;
use app\models\DepartmentUser;

/**
 * LoginForm is the model behind the login form.
 */
class OrgLoginForm extends Model
{
    public $loginUsername;
    public $loginPassword;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['loginUsername', 'loginPassword'], 'required', 'message' => '账号密码不能为空', 'on' => ['orgLogin', 'depLogin']],
            // password is validated by validatePassword()
            ['loginPassword', 'validatePass', 'on' => ['orgLogin']],
            ['loginPassword', 'validatePassByDep', 'on' => ['depLogin']],
        ];
    }

    public function validatePass()
    {
        if (!$this->hasErrors()) {
            $data = OrganizationUser::find()->where('organization_user_username = :loginUsername and organization_user_password = :loginPassword', [':loginUsername' => $this->loginUsername, ':loginPassword' => md5($this->loginPassword)])->one();
            if (is_null($data)) {
                $this->addError("loginPassword", "用户名或者密码错误");
            }
        }
    }

     public function login($data)
    {
        $this->scenario = "orgLogin";
        if ($this->load($data) && $this->validate()) {
            //做点有意义的事
            $session = Yii::$app->session;
            $session['loginUsername'] = $this->loginUsername;
            $session['organizationId'] = OrganizationUser::findOne(['organization_user_username' => $this->loginUsername])->organization_id;
            $session['isLogin'] = 1;
            return (bool)$session['isLogin'];
        }
        return false;
    }

    public function validatePassByDep()
    {
        if (!$this->hasErrors()) {
            $data = DepartmentUser::find()->where('department_user_username = :loginUsername and department_user_password = :loginPassword', [':loginUsername' => $this->loginUsername, ':loginPassword' => md5($this->loginPassword)])->one();
            if (is_null($data)) {
                $this->addError("loginPassword", "用户名或者密码错误");
            }
        }
    }

     public function depLogin($data)
    {
        $this->scenario = "depLogin";
        if ($this->load($data) && $this->validate()) {
            //做点有意义的事
            $session = Yii::$app->session;
            $session['loginUsername'] = $this->loginUsername;
            $depModel = DepartmentUser::findOne(['department_user_username' => $this->loginUsername]);
            $session['organizationId'] = $depModel->organization_id;
            $session['departmentId'] = $depModel->department_id;
            $session['isLogin'] = 1;
            return (bool)$session['isLogin'];
        }
        return false;
    }

}
