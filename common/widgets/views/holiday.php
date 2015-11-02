<?php 

use yii\helpers\Html;
use yii\helpers\Url;

 ?>            

<?php foreach ($model as $holi): ?>

        <aside class="selebriti">
            <div class="sele-img">
                <a href="<?php echo Url::toRoute('/holidays/'.$holi->slug); ?>">
                    <?= Html::img($holi->getImage()->getUrl()); ?> 
                </a>
            </div>
            <div class="sele-text">        
                <div class="sele-date"><?= Yii::$app->formatter->asDate($holi->date_holiday,'d MMMM'); ?> </div>
                <p>
                    <a href="<?php echo Url::toRoute('/holidays/'.$holi->slug); ?>">                        
                       <?= $holi->name_holiday; ?> 
                    </a>
                </p>
            </div>
        </aside><!-- .selebriti -->

<?php endforeach ?>




