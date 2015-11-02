<?php 

use yii\helpers\Html;
use yii\helpers\Url;

 ?>            

            <div class="contain"> <!-- Partner block -->
                <div class="name-block">
                    Партнеры
                </div>
                    <div class="partsite">
<?php $count=0; foreach ($model as $site): $count++;?>
                <div class="partsite-site">
                    <a href="<?= Html::encode("{$site->url_site}") ?>" target="_blank">
                    <div class="partsite-site-img">
                        <?= Html::img($site->getImage()->getUrl('60x60')); ?> 
                    </div>
                    <div class="partsite-site-name">
                    <?= Html::encode("{$site->name_site}") ?><!-- Правительство Российской Федерации -->
                    </div>
                    </a>
                </div>     
<?php endforeach; ?>   
               

                    </div>  
                    <div class="part-nav">
                        <!-- nav block for part-site -->
                    </div>
            </div> <!-- Partner block -->

<?php if ($count>5): ?>    

        <script type="text/javascript">
        $('.partsite').owlCarousel({
            loop:true,
            nav:true,
            items:5,
            navText: ['← Предыдущие','Следующие →'],
            navContainer: '.part-nav',
            navClass: ['part-prev','part-next'], 
        })
        </script>

<?php endif ?>        