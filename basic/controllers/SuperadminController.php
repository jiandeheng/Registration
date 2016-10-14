<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;

class SuperadminController extends Controller
{
	public function actionDashboard(){
		$this->layout = 'superadminlayout';
		return $this->render('dashboard');
	}

	public function beforeAction($action){
		if(Yii::$app->user->isGuest){
			return $this->redirect(['superadmin-login/index']);
		}
		return true;
	}

}