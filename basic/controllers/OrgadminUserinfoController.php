<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\Organization;
use app\models\Academy;
use app\models\department;
use yii\helpers\ArrayHelper;

class OrgadminUserinfoController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$session = Yii::$app->session;
        $organizationId = $session->get('organizationId');
        $searchModel = new UserSearch(['user_organization_id' => $organizationId]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $dataProvider = new ActiveDataProvider([
        //     'query' => User::find()->with('userDepartment', 'userOrganization'),
        //     'pagination' => [
        //         'pageSize' => 10,
        //     ],
        // ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = User::findOne($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $session = Yii::$app->session;
        $organizationId = $session->get('organizationId');
        $depModel = new Department;
        $department = $depModel->getDepartmentsList($organizationId);
        $academy = ArrayHelper::map(Academy::find()->asArray()->all(), 'academy_name', 'academy_name');

        if ($model->load(Yii::$app->request->post()) && $model->addUserInfoByOrg()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'department' => $department,
                'academy' => $academy,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $session = Yii::$app->session;
        $organizationId = $session->get('organizationId');
        $depModel = new Department;
        $department = $depModel->getDepartmentsList($organizationId);
        $academy = ArrayHelper::map(Academy::find()->asArray()->all(), 'academy_name', 'academy_name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'department' => $department,
                'academy' => $academy,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
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