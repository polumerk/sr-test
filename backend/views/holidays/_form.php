<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\Holidays */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="holidays-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?//= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_holiday')->textInput() ?>

    <?=  $form->field($model, 'text_holiday')->widget(Widget::className(), [
                                                        'settings' => [
                                                            'lang' => 'ru',
                                                            'minHeight' => 200,
                                                            'plugins' => [
                                                                'fullscreen',
                                                            ]
                                                        ]
                                                        ]);    
    ?>

    <?= $form->field($model, 'date_holiday')->widget(\yii\jui\DatePicker::classname(), [
       'language' => 'ru',
       'dateFormat' => 'y/MM/dd', 
       'clientOptions' =>[
                        'yearRange' => 'c-25:c+0',
                        'changeMonth'=> true,
                        'changeYear'=> true,
                        'autoSize'=>true,]
        ]) 
    ?>

    <?php if (!$model->isNewRecord): ?>
        <?= Html::img($model->getImage()->getUrl()); ?>  

        <?= $form->field($model, 'logo_holiday_update')->fileInput(['accept' => 'image/*'])->hint('Выбирете логотип праздника или ни чего не выбирайте если хотите оставить прежний логотип.') ?>

        <?php //echo '<input type="file" id="holidays-logo_holiday_update" name="Holidays[logo_holiday_update]" accept="image/*">'; ?>

    <?php else: ?>    

    <?= $form->field($model, 'logo_holiday')->fileInput(['accept' => 'image/*'])->hint('Выбирете логотип праздника.') ?>

    <?php endif ?>

    <?= $form->field($model, 'status_holiday')->dropDownList([ 1 => 'Показывать', 0 => 'Не показывать', ])->hint('Вы можете отключить вывод праздника на сайте, выбрав "Не показывать".') ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'created_by')->textInput() ?>

    <?//= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
