<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\helpers\Url;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
 public function actions()
    {
        return [
            'error' => [
                'class' => 'developeruz\yii2_custom_errorhandler\ErrorHandler',
                'array_of_exceptions' => [
                    403 => function()
                    {   
                        if (Yii::$app->user->isGuest) {
                            return $this->redirect(Url::to('/site/login'));
                        }
                        else { 
                            Yii::$app->session->setFlash('error', Yii::t('app', 'You are not allowed. Contact your administrator.'));                            
                            return $this->redirect(Url::to('/site/index'));
                        }
                    }, 
                    500 => function()
                    {
                        //send notification to administrator 
                        
                        return $this->redirect(Url::to('/site/index'));
                    }, 
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {   
        $this->layout = 'login';

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
