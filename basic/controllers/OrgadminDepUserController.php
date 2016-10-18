<?php

namespace app\controllers;

use Yii;
use app\models\DepartmentUser;
use app\models\DepartmentUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Department;
use yii\helpers\ArrayHelper;

/**
 * OrgadminDepUserController implements the CRUD actions for DepartmentUser model.
 */
class OrgadminDepUserController extends Controller
{

    public $layout = 'orgadmin-layout';
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all DepartmentUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $organizationId = $session->get('organizationId');
        $searchModel = new DepartmentUserSearch(['organization_id' => $organizationId]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DepartmentUser model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DepartmentUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DepartmentUser();
        $session = Yii::$app->session;
        $organizationId = $session->get('organizationId');
        $model->organization_id = $organizationId;
        $dep = Department::find()->where(['organization_id' => $organizationId])->asArray()->all();
        $department = ArrayHelper::map($dep, 'department_id', 'department_name');
        foreach ($department as $key => $value) {
            $model->department_id = $key;
            break;
        }

        if ($model->load(Yii::$app->request->post()) && $model->createUser()) {
            return $this->redirect(['view', 'id' => $model->department_user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'department' => $department,
            ]);
        }
    }

    /**
     * Updates an existing DepartmentUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->password = $model->department_user_password;
        $session = Yii::$app->session;
        $organizationId = $session->get('organizationId');
        $dep = Department::find()->where(['organization_id' => $organizationId])->asArray()->all();
        $department = ArrayHelper::map($dep, 'department_id', 'department_name');
        if ($model->load(Yii::$app->request->post()) && $model->updateUser()) {
            return $this->redirect(['view', 'id' => $model->department_user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'department' => $department,
            ]);
        }
    }

    /**
     * Deletes an existing DepartmentUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DepartmentUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return DepartmentUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DepartmentUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function beforeAction($action){
        $session = Yii::$app->session;
        if(!($session->get('isLogin'))){
            return $this->redirect(['orgadmin-login/login']);
        }
        return parent::beforeAction($action);
    }
    
}
