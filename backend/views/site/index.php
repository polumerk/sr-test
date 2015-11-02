<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать <?php echo Yii::$app->user->identity->username; ?>!</h1>

        <p class="lead">Вы зашли в административную часть сайта "СЛУЖУ РОССИИ!".</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
            </div>
        </div>

    </div>
</div>
