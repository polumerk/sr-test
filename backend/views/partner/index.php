<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use arogachev\sortable\grid\SortableColumn;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PartnerSiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Partner Sites');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-site-index" id='part'>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Partner Site'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Change position'), ['?sort=sort'], ['class' => 'btn btn-warning','style'=>'float:right']) ?>
    </p>

<?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => SortableColumn::className(),
                'gridContainerId' => 'part',
                'template' => '<div class="sortable-section">{currentPosition} - {moveWithDragAndDrop}</div>
                                <div class="sortable-section">{moveAsFirst} {moveAsLast}</div>',              
            ],
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'icon_site',
                'format' => 'image',    
                'value' => function ($data) {
                                                return $data->getImage()->getUrl('40x40');
                                            },
            ],
            'name_site',
            'url_site:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php Pjax::end(); ?>    

</div>
