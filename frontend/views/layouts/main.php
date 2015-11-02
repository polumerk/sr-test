<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\widgets\Goversite;
use common\widgets\Partsite;
use common\widgets\Holiday;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>


<div class="wrapper">
<div class="wrapper-in">
    <header class="header">
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar',
            'id' => 'menusite',
            //'style' => 'min-height: 30px;height:30px;'
        ],
        'renderInnerContainer' => false,
    ]);
    $menuItems = [
        ['label' => 'О нас', 'items' => [
            ['label' => 'Кто мы', 'url' => ['site/obwee']],
            ['label' => 'Руководство', 'url' => ['site/ruko']],
            ['label' => 'Попечительский совет', 'url' => ['site/pope']],
            ['label' => 'Координационный совет', 'url' => ['site/koor']],
            ['label' => 'Документы', 'url' => ['site/docu']],
        ]/*, 'active' => Yii::$app->controller->id == 'site' -- для подсветки пункта основного в меню*/],        
        ['label' => 'Мультимедия',  'items' => [
            ['label' => 'Видео', 'url' => ['site/video']],
            ['label' => 'Фото', 'url' => ['site/foto']],
        ]],     
        ['label' => 'Регионы', 'url' => ['site/regions']],
        ['label' => 'Контакты', 'url' => ['site/kont']],
    ];
    // $menuItems = [
    //     ['label' => 'Главная', 'url' => ['/site/index']],
    //     ['label' => 'About', 'url' => ['/site/about']],
    //     ['label' => 'Contact', 'url' => ['/site/contact']],
    // ];
    // if (Yii::$app->user->isGuest) {
    //     $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    //     $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    // } else {
    //     $menuItems[] = [
    //         'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
    //         'url' => ['/site/logout'],
    //         'linkOptions' => ['data-method' => 'post']
    //     ];
    // }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    </header><!-- .header-->

   

            <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

<div class="middle">
        <div class="contain">
            <main class="logo-block">
                <a href="/">
                <div class="logo"> 
                    <?= Html::img('@web/img/logo-site_002.png',['class'=>'logo-img','width'=>700, 'height'=>150]); ?>
                </div>

<!--                     <div class="name-logo">
                        <div class="namesr">
                        <h1>ОБЩЕРОССИЙСКАЯ ОБЩЕСТВЕННАЯ ОРГАНИЗАЦИЯ <br />
                        <t class="blue">ДВИЖЕНИЕ ПОДДЕРЖКИ ПАТРИОТИЧЕСКИХ ИНИЦИАТИВ</t> <br />
                        <t class="red">"СЛУЖУ РОССИИ"</t> <br />
                        </h1>
                        </div>
                    </div> -->
                </a>
            </main><!-- .logo-block -->
        </div><!-- .container-->
        
        <?php echo Holiday::widget(); ?> <!-- Holidays blocl -->


        <?= $content ?>


            <div class="right-sidebar"> <!-- .right-sidebar -->

                <aside class="lidersite"><!-- Lider block -->
                        <div class="name-block">
                        Лидер
                        </div>
                            <a href="http://kremlin.ru" target="_blank">
                            <div class="lider-img">
                                <?= Html::img('@web/img/lider.jpg'); ?> 
                            </div>
                            </a>
                        <div class="lider-site">
                            <a href="http://kremlin.ru" target="_blank">
                            <div class="lider-site-img">
                                <?= Html::img('@web/img/goverment.svg'); ?> 
                            </div>
                            <div class="lider-name">
                            Президент Российской Федерации
                            </div>
                            </a>
                        </div>                                      
                </aside><!-- Lider block -->

            <?php echo Goversite::widget(); ?> <!-- Government blocl -->

            </div> <!-- .right-sidebar -->


        <?php echo Partsite::widget(['conact'=>Yii::$app->controller->id.Yii::$app->controller->action->id]); ?> <!-- Partner blocl -->


    </div><!-- .middle-->

</div><!-- .wrapper-in -->
</div><!-- .wrapper -->

<footer class="footer">
    <div class="footer-in">
        <p class="pull-left">
        &copy; СЛУЖУ РОССИИ <?= date('Y') ?> Все права защищены <br />
        При полном или частичном использовании материалов ссылка на ресурс обязательна.
        </p>

        <p class="pull-right"></p>
    </div>
</footer>

<div class="social">
                    
                    <div class="social-img">
                        <a href="#"  title="Вконтакте"> <?= Html::img('@web/img/soc/VK.png',['alt'=>'Вконтакте', 'title' => 'Вконтакте']); ?> </a>
                    </div>
                    <div class="social-img">
                        <a href="#"  title="Одноклассники"> <?= Html::img('@web/img/soc/Odnoklasniki.png',['alt'=>'Одноклассники', 'title' => 'Одноклассники']); ?> </a>
                    </div>
                    <div class="social-img">
                        <a href="#"  title="Фейсбук"> <?= Html::img('@web/img/soc/FB.png',['alt'=>'Фейсбук', 'title' => 'Фейсбук']); ?> </a>
                    </div>
                    <div class="social-img">
                        <a href="#"  title="Youtube"> <?= Html::img('@web/img/soc/you.png',['alt'=>'Youtube', 'title' => 'Youtube']); ?> </a>
                    </div>
                    <div class="social-img">
                        <a href="#"  title="Твитер"> <?= Html::img('@web/img/soc/Twitter.png',['alt'=>'Твитер', 'title' => 'Твитер']); ?> </a>
                    </div>
                    <div class="social-img">
                       <a href="#"  title="Rutube"> <?= Html::img('@web/img/soc/rut.png',['alt'=>'Rutube', 'title' => 'Rutube']); ?> </a>
                    </div>
</div>

<script>
    var y = $(".footer").offset().left;
    $(".social").css("left", y+"px");

        // установим обработчик события resize
    $(window).resize(function(){
        var y = $(".footer").offset().left;
        $(".social").css("left", y+"px");
    });

    $('.social-img').hover(
    function(){
        $(this).fadeTo(500, 1);
    },
    function(){
      $(this).fadeTo(500, 0.5);
    });

</script>

<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>

<!-- http://iconbird.com/search/?page=1&q=iconset:Matart+Social+Icons -->