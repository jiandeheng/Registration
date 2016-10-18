<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\OrgLoginForm;
use Yii;

class DepadminLoginController extends Controller
{

	public function actionLogin(){
		$this->layout = false;

		$model = new OrgLoginForm;
		if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->depLogin($post)) {
                return $this->redirect(['depadmin/index']);
            }
        }

		return $this->render('login', ['model' => $model]);
	}

	public function actionLogout()
    {   
        Yii::$app->session->remove('loginUsername');
        Yii::$app->session->remove('isLogin');
        Yii::$app->session->remove('organizationId');
        Yii::$app->session->remove('departmentId');
        return $this->redirect(['depadmin-login/login']);
    }

}