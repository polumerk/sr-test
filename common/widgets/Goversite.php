<?php

namespace common\widgets;

use Yii;
use common\models\GovernmentSite;
use yii\helpers\Html;



class Goversite extends \yii\base\Widget
{
    public $message;

    public function init()
    {
        parent::init();

    
    }

    public function run()
    {
            if (($model = GovernmentSite::find()->orderBy('sort')->all()) !== null) 
            {
                return $this->render('goversite', ['model' => $model,]);

            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }


    }

}
