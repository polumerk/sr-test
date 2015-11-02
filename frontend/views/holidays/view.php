<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'СЛУЖУ РОССИИ!';
?>

        

        

        <div class="contain">
            <div class="news-post">
                <div class="name-block">
                Сегодня праздник
                </div>
                <div class="news-post-title">
                    <h1><?= $model->name_holiday; ?></h1>
                </div>
                <div class="news-post-date">
                    <?= Yii::$app->formatter->asDate($model->date_holiday,'long'); ?>
                </div>                
                <div class="news-post-img">
                     <?= Html::img($model->getImage()->getUrl()); ?>
                </div>
                <div class="news-post-text">
                	<?= $model->text_holiday;?>
                </div>
                <div class="news-post-all">
                <a href="#">
                    <a href="<?php echo Url::toRoute('/holidays'); ?>">Прошедшие праздники</a>
                </a>
                </div>
            </div>
        </div><!-- .container-->

        
