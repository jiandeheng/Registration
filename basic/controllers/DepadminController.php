<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;

class DepadminController extends Controller
{

	public $layout = 'depadmin-layout';

	public function actionIndex(){
		return $this->render('index');
	}

	public function beforeAction($action){
		$session = Yii::$app->session;
		if(!($session->get('isLogin'))){
			return $this->redirect(['depadmin-login/login']);
		}
        return parent::beforeAction($action);
    }
}