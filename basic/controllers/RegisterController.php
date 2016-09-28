<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\User;
use Yii;

class RegisterController extends Controller
{

	public function actionRegister(){
		$this->layout = 'layout1';
		$model = new User;
		if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->register($post)) {
                $url = Yii::$app->session->setFlash('info', '报名成功');
            }
        }

        $academy = array(
        	'信息工程学院' => '信息工程学院',
        	'外国语学院' => '外国语学院' 
        );
        $organization = array(
        	'校团委' => '校团委',
        	'学生会' => '学生会'
        );
        $department = array(
        	'网络中心' => '网络中心',
        	'学术科技部' => '学术科技部'
        );
		return $this->render('register' ,['model' => $model, 'academy' => $academy, 'organization' => $organization, 'department' => $department, 'url'=>$url]);
	}
}