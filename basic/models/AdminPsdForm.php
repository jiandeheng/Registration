<?php

namespace app\models;

use yii\base\Model;
use app\models\Superadmin;
use app\models\OrganizationUser;
use app\models\DepartmentUser;

/**
 * LoginForm is the model behind the login form.
 */
class AdminPsdForm extends Model
{
	public $psdUsername;
	public $psdOldPassword;
	public $psdNewPassword;
	public $psdRepNewPassword;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['psdUsername', 'psdOldPassword', 'psdNewPassword', 'psdRepNewPassword'], 'required', 'message' => '账号密码不能为空', 'on' => ['superadminPsd', 'orgadminPsd', 'depadminPsd']],
            // password is validated by validatePassword()
            ['psdOldPassword', 'validateOldPass', 'on' => ['superadminPsd']],
            [['psdNewPassword'], 'validateNewPass', 'on' => ['superadminPsd']],
            ['psdOldPassword', 'validateOldPassOrg', 'on' => ['orgadminPsd']],
            [['psdNewPassword'], 'validateNewPassOrg', 'on' => ['orgadminPsd']],
            ['psdOldPassword', 'validateOldPassDep', 'on' => ['depadminPsd']],
            [['psdNewPassword'], 'validateNewPassDep', 'on' => ['depadminPsd']],
        ];
    }

    public function validateOldPass(){
    	if (!$this->hasErrors()) {
    		$superadminModel = Superadmin::find()->where('superadmin_username = :psdUsername and superadmin_password = :psdOldPassword', [':psdUsername' => $this->psdUsername, ':psdOldPassword' => md5($this->psdOldPassword)])->one();
    		if(is_null($superadminModel)){
    			$this->addError("psdOldPassword", "用户名密码不匹配");
    		}
    	}
    }

    public function validateNewPass(){
        if (!$this->hasErrors()) {
            if($this->psdNewPassword != $this->psdRepNewPassword){
                $this->addError("psdNewPassword", "新密码不一致");
            }
        }
    }

    public function alterPass($data){
        $this->scenario = 'superadminPsd';
        if ($this->load($data) && $this->validate()) {
            $model = Superadmin::find()->where('superadmin_username = :psdUsername and superadmin_password = :psdOldPassword', [':psdUsername' => $this->psdUsername, ':psdOldPassword' => md5($this->psdOldPassword)])->one();
            $model->superadmin_password = md5($this->psdNewPassword);
            $model->loginUsername = $this->psdUsername;
            $model->loginPassword = $this->psdNewPassword;
            return $model->update();
        }
        return false;
    }

    public function validateOldPassOrg(){
        if (!$this->hasErrors()) {
            $model = OrganizationUser::find()->where('organization_user_username = :psdUsername and organization_user_password = :psdOldPassword', [':psdUsername' => $this->psdUsername, ':psdOldPassword' => md5($this->psdOldPassword)])->one();
            if(is_null($model)){
                $this->addError("psdOldPassword", "用户名密码不匹配");
            }
        }
    }

    public function validateNewPassOrg(){
        if (!$this->hasErrors()) {
            if($this->psdNewPassword != $this->psdRepNewPassword){
                $this->addError("psdNewPassword", "新密码不一致");
            }
        }
    }

    public function alterPassOrg($data){
        $this->scenario = 'orgadminPsd';
        if ($this->load($data) && $this->validate()) {
            $model = OrganizationUser::find()->where('organization_user_username = :psdUsername and organization_user_password = :psdOldPassword', [':psdUsername' => $this->psdUsername, ':psdOldPassword' => md5($this->psdOldPassword)])->one();
            $model->organization_user_password = md5($this->psdNewPassword);
            $model->password = $this->psdNewPassword;
            return $model->update();
        }
        return false;
    }

    public function validateOldPassDep(){
        if (!$this->hasErrors()) {
            $model = DepartmentUser::find()->where('department_user_username = :psdUsername and department_user_password = :psdOldPassword', [':psdUsername' => $this->psdUsername, ':psdOldPassword' => md5($this->psdOldPassword)])->one();
            if(is_null($model)){
                $this->addError("psdOldPassword", "用户名密码不匹配");
            }
        }
    }

    public function validateNewPassDep(){
        if (!$this->hasErrors()) {
            if($this->psdNewPassword != $this->psdRepNewPassword){
                $this->addError("psdNewPassword", "新密码不一致");
            }
        }
    }

    public function alterPassDep($data){
        $this->scenario = 'depadminPsd';
        if ($this->load($data) && $this->validate()) {
            $model = DepartmentUser::find()->where('department_user_username = :psdUsername and department_user_password = :psdOldPassword', [':psdUsername' => $this->psdUsername, ':psdOldPassword' => md5($this->psdOldPassword)])->one();
            $model->department_user_password = md5($this->psdNewPassword);
            $model->password = $this->psdNewPassword;
            return $model->update();
        }
        return false;
    }


}
