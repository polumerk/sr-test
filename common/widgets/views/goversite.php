<?php 

use yii\helpers\Html;
use yii\helpers\Url;

 ?>



        <aside class="gossite">
                <div class="name-block">
                Правительство
                </div>
<?php foreach ($model as $site): ?>
                <div class="gossite-site">
                    <a href="<?= Html::encode("{$site->url_site}") ?>" target="_blank">
                    <div class="gossite-site-img">
                        <?= Html::img($site->getImage()->getUrl('60x60')); ?> 
                    </div>
                    <div class="gossite-site-name">
                    <?= Html::encode("{$site->name_site}") ?><!-- Правительство Российской Федерации -->
                    </div>
                    </a>
                </div>     
<?php endforeach; ?>          
                   
                                    <div class="down" onclick="var el = $('.gossite'),
                                    curHeight = el.height(),
                                    autoHeight = el.css('height', 'auto').height();
                                    el.height(curHeight).animate({height: autoHeight}, 1000); 
                                    $('.gossite .down').css('display', 'none');
                                    $('.gossite .up').css('display', 'block');">
                        <?= Html::img('@web/img/down.png'); ?>
                    </div>                    
                    <div class="up" onclick="$('.gossite').animate({height:'50px'}, 1000);
                                                                    $('.gossite .down').css('display', 'block');
                                                                    $('.gossite .up').css('display', 'none');">
                        <?= Html::img('@web/img/up.png'); ?>
                    </div>
        </aside><!-- .right-sidebar -->