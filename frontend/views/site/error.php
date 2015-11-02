<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

        <div class="contain">
            <div class="kont-post">
                <div class="name-block">
                <h1><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="kont-text">
                <br />
                        <div class="alert alert-danger">
                            <?= nl2br(Html::encode($message)) ?>
                        </div>
    <p>
        <?= Yii::t('app', 'The above error occurred while the Web server was processing your request.') ?> 
    </p>
    <p>
        <?= Yii::t('app', 'Please contact us if you think this is a server error. Thank you.') ?> 
    </p>

                </div>


            </div>
        </div><!-- .container-->