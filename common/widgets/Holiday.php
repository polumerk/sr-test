<?php

namespace common\widgets;

use Yii;
use common\models\Holidays;
use yii\helpers\Html;



class Holiday extends \yii\base\Widget
{
    public $message;

    public function init()
    {
        parent::init();

    
    }

    public function run()
    {   
        
            if (($model = Holidays::find()->where(['status_holiday' => Holidays::STATUS_ACTIVE,'date_holiday'=> Holidays::getMaxdate()])->limit(1)->all()) !== null) 
            {
                return $this->render('holiday', ['model' => $model,]);

            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }


    }

}

