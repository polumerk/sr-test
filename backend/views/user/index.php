<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'username',
            'email:email',
            // 'status',
            'created_at:date',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;&nbsp;{permit}&nbsp;&nbsp;{delete}',
                 'buttons' =>
                     [
                         'permit' => function ($url, $model) {
                             return Html::a('<span class="glyphicon glyphicon-wrench"></span>', Url::to(['/permit/user/view', 'id' => $model->id]), [
                                 'title' => Yii::t('app', 'Change user role')
                             ]); },
                     ]                

            ],
        ],
    ]); ?>

</div>
