<?php

namespace common\widgets;

use Yii;
use common\models\PartnerSite;
use yii\helpers\Html;



class Partsite extends \yii\base\Widget
{
    public $conact;

    public function init()
    {
        parent::init();

    
    }

    public function run()
    {

    	if($this->conact === 'siteindex')
    	{
            if (($model = PartnerSite::find()->orderBy('sort')->all()) !== null) 
            {
                return $this->render('partsite', ['model' => $model,]);

            } else {
                throw new NotFoundHttpException('Запрашиваемая страница не существует.');
            }
        }

        return false;
    }

}
