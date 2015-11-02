<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'СЛУЖУ РОССИИ!';
?>

        

        

        <div class="contain">

            <div class="allnews-main">
                <div class="name-block">
                    Календарь праздников
                </div>

<?php foreach ($models as $key => $model): ?>

                <div class="allnews-block">
                    <div class="allnews-img">
                        <a href="<?php echo Url::toRoute('/holidays/'.$model->slug); ?>">
                            <?= Html::img($model->getImage()->getUrl()); ?>
                        </a>
                    </div>
                    <div class="allnews-block-text">
                        <div class="allnews-date">
                            <?= Yii::$app->formatter->asDate($model->date_holiday,'long'); ?>
                        </div>
                        <div class="allnews-url">
                            <a href="<?php echo Url::toRoute('/holidays/'.$model->slug); ?>">
                                <?= $model->name_holiday; ?>
                            </a>
                        </div>
                        <div class="allnews-text">
                        	<?= $model->text_holiday;?>
                        </div>
                    </div>
                </div>

<?php endforeach ?>  

<?php 
	// отображаем ссылки на страницы
	echo LinkPager::widget([
	    'pagination' => $pages,
	]);
 ?>  
            </div>
          
        </div><!-- .container-->        



