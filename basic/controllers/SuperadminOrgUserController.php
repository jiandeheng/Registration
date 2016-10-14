<?php

namespace app\controllers;

use Yii;
use app\models\OrganizationUser;
use app\models\OrganizationUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Organization;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

/**
 * SuperadminOrgUserController implements the CRUD actions for OrganizationUser model.
 */
class SuperadminOrgUserController extends Controller
{

    public $layout = 'superadmin-org-user-layout';
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
     * Lists all OrganizationUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrganizationUserSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = new ActiveDataProvider([
            'query' => OrganizationUser::find()->with('organization'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrganizationUser model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $orgModel = $model->organization;
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new OrganizationUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrganizationUser();

        $org = Organization::find()->asArray()->all();
        $organization = ArrayHelper::map($org, 'organization_id', 'organization_name');
        foreach ($organization as $key => $value) {
            $model->organization_id = $key;
            break;
        }

        if ($model->load(Yii::$app->request->post()) && $model->CreateUser()) {
            return $this->redirect(['view', 'id' => $model->organization_user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'organization' => $organization,
            ]);
        }
    }

    /**
     * Updates an existing OrganizationUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->password = $model->organization_user_password;
        $org = Organization::find()->asArray()->all();
        $organization = ArrayHelper::map($org, 'organization_id', 'organization_name');
        if ($model->load(Yii::$app->request->post()) && $model->updateUser()) {
            return $this->redirect(['view', 'id' => $model->organization_user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'organization' => $organization,
            ]);
        }
    }

    /**
     * Deletes an existing OrganizationUser model.
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
     * Finds the OrganizationUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return OrganizationUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrganizationUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function beforeAction($action){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['superadmin-login/index']);
        }
        return true;
    }
    
}
