<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PartnerSite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-site-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php if (!$model->isNewRecord): ?>
    	<?= Html::img($model->getImage()->getUrl(), ['option' => 'value']); ?>	

		<?= $form->field($model, 'icon_site_hidden')->hiddenInput(['value' => $model->icon_site])->label(false); ?>

    <?php endif ?>

    <?= $form->field($model, 'icon_site')->fileInput(['accept' => 'image/*']) ?>

    <?= $form->field($model, 'name_site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_site')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
