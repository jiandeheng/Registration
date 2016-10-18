<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\OrgLoginForm;
use Yii;

class OrgadminController extends Controller
{

	public function actionIndex(){
		$this->layout = 'orgadmin-layout';
		return $this->render('index');
	}

	public function beforeAction($action){
		$session = Yii::$app->session;
		if(!($session->get('isLogin'))){
			return $this->redirect(['orgadmin-login/login']);
		}
        return parent::beforeAction($action);
    }

}