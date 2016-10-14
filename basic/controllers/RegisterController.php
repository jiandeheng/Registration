<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\User;
use app\models\Department;
use app\models\Organization;
use app\models\Academy;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use Yii;

class RegisterController extends Controller
{

    public $enableCsrfValidation = false;

	public function actionRegister(){
		$this->layout = 'layout1';
		$model = new User;
		if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->register($post)) {
                Yii::$app->session->setFlash('info', '报名成功');
                return $this->redirect(['register/register']);
            }
        }

        $org = Organization::find()->asArray()->all();
        $organization = ArrayHelper::map($org, 'organization_id', 'organization_name');
        foreach ($organization as $key => $value) {
            $depModel = new Department;
            $department = $depModel->getDepartmentsList($key);
            break;
        }

        $aca = Academy::find()->asArray()->all();
        $academy = ArrayHelper::map($aca, 'academy_name', 'academy_name');
		return $this->render('register' ,['model' => $model, 'academy' => $academy, 'organization' => $organization, 'department' => $department, 'url'=>$url]);
	}

    public function actionDepopt($organizationId){
        $dep = new Department;
        $depModel = $dep->getDepartmentsList($organizationId);
        foreach ($depModel as $value => $name) {
            echo Html::tag('option', Html::encode($name), array('value' => $value));
        }
    }

}