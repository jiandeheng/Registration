<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Superadmin;
use Yii;

class SuperadminLoginController extends Controller
{
	public function actionIndex(){
		$this->layout = false;

		$model = new Superadmin();

		if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->login($post)) {
                return $this->redirect(['superadmin/dashboard']);
            }
        }

		return $this->render('index', ['model' => $model]);
	}

	public function actionLogout()
    {   
        Yii::$app->session->remove('loginUsername');
        Yii::$app->session->remove('isLogin');
        // if (!isset(Yii::$app->session['isLogin'])) {
        //     return $this->redirect(['superadmin-login/index']);
        // }
        if(Yii::$app->user->logout(false)){
            return $this->redirect(['superadmin-login/index']);
        }
    }


}