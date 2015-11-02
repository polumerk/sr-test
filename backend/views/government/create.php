<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GovernmentSite */

$this->title = Yii::t('app', 'Create Government Site');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Government Sites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="government-site-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
