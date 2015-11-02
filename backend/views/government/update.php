<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GovernmentSite */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => '',
]) . ' ' . $model->name_site;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Government Sites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_site, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="government-site-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
