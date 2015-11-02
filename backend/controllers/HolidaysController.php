<?php

namespace backend\controllers;

use Yii;
use common\models\Holidays;
use common\models\HolidaysSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HolidaysController implements the CRUD actions for Holidays model.
 */
class HolidaysController extends Controller
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
     * Lists all Holidays models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HolidaysSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Holidays model.
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
     * Creates a new Holidays model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Holidays(['scenario' => 'insert']);

        if ($model->load(Yii::$app->request->post())) {
        
            $model->logo_holiday_file = \yii\web\UploadedFile::getInstance($model,'logo_holiday');

            $model->logo_holiday = $model->logo_holiday_file->baseName . '.' . $model->logo_holiday_file->extension;    

            //$model->date_holiday = Yii::$app->formatter->asDate($model->date_holiday,'y/MM/DD');

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        } 
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Holidays model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   
        $POST[] = $_FILES;

        $model = $this->findModel($id);

        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {

            $model->logo_holiday_file = \yii\web\UploadedFile::getInstance($model,'logo_holiday_update');

            //$model->date_holiday = Yii::$app->formatter->asDate($model->date_holiday,'y/MM/DD');
            if ($model->logo_holiday_update) {

                $model->logo_holiday = $model->logo_holiday_file->baseName . '.' . $model->logo_holiday_file->extension; 

            }
            

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Holidays model.
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
     * Finds the Holidays model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Holidays the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Holidays::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
