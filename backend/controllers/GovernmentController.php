<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\GovernmentSite;
use common\models\GovernmentSiteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GovernmentController implements the CRUD actions for GovernmentSite model.
 */
class GovernmentController extends Controller
{
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
     * Lists all GovernmentSite models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GovernmentSiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GovernmentSite model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GovernmentSite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GovernmentSite(['scenario' => 'insert']);

        if ($model->load(Yii::$app->request->post())) {

            $model->icon_file = \yii\web\UploadedFile::getInstance($model, 'icon_site');

            $model->icon_site = $model->icon_file->baseName . '.' . $model->icon_file->extension;

            if($model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GovernmentSite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {

            $model->icon_file = \yii\web\UploadedFile::getInstance($model, 'icon_site');

            if($model->icon_file)
            {
                $model->icon_site = $model->icon_file->baseName . '.' . $model->icon_file->extension;
            } else
            {
               $model->icon_site = $model->icon_site_hidden; 
            }

            if($model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GovernmentSite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GovernmentSite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GovernmentSite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GovernmentSite::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
