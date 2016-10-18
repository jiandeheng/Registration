<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\AdminPsdForm;
use Yii;

class AdminPsdController extends Controller
{
	public $layout = false;

	public function actionSuperadmin(){
		$model = new AdminPsdForm;
		if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->alterPass($post)) {
            	$session = Yii::$app->session;
            	$session->setFlash('info', '修改密码成功');
            	$model->psdUsername = null;
            	$model->psdOldPassword = null;
            	$model->psdNewPassword = null;
            	$model->psdRepNewPassword = null;
            }
        }
		return $this->render('superadmin', ['model' => $model]);
	}

      public function actionOrgadmin(){
            $model = new AdminPsdForm;
            if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->alterPassOrg($post)) {
                  $session = Yii::$app->session;
                  $session->setFlash('info', '修改密码成功');
                  $model->psdUsername = null;
                  $model->psdOldPassword = null;
                  $model->psdNewPassword = null;
                  $model->psdRepNewPassword = null;
            }
        }
            return $this->render('orgadmin', ['model' => $model]);
      }

      public function actionDepadmin(){
            $model = new AdminPsdForm;
            if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->alterPassDep($post)) {
                  $session = Yii::$app->session;
                  $session->setFlash('info', '修改密码成功');
                  $model->psdUsername = null;
                  $model->psdOldPassword = null;
                  $model->psdNewPassword = null;
                  $model->psdRepNewPassword = null;
            }
        }
            return $this->render('depadmin', ['model' => $model]);
      }
}