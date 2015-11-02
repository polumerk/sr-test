<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Holidays */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => '',
]) . ' ' . $model->name_holiday;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Holidays'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_holiday, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="holidays-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
