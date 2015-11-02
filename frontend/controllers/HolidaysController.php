<?php

namespace frontend\controllers;


use common\models\Holidays;
use yii\data\Pagination;

class HolidaysController extends \yii\web\Controller
{
    public function actionIndex()
    {
	    $query = Holidays::find()->where(['status_holiday' => Holidays::STATUS_ACTIVE])->orderBy(['date_holiday' => SORT_DESC]);
	    $countQuery = clone $query;
	    $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>'5']);
	    $models = $query->offset($pages->offset)
	        ->limit($pages->limit)
	        ->all();

	    return $this->render('index', [
	         'models' => $models,
	         'pages' => $pages,
	    ]);
    }

    public function actionView($slug)
    {	
    	$model = Holidays::find()->where(['slug' => $slug])->one();
        return $this->render('view', [
            'model' => $model,
        ]);
    }

}
