<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'СЛУЖУ РОССИИ!';
?>

        

        

        <div class="contain">
            <div class="tab-post">
                <div class="name-block">
                Регионы
                </div>
                <div class="tab-regions">
<table>
    <tr>
        <th width="2%">
            №
        </th>
        <th width="12%">
            Субъект федерации
        </th>
        <th width="12%">
            Флаг
        </th>
        <th width="12%">
            Герб
        </th>
        <th width="12%">
            Терри-тория (км²)
        </th>
        <th width="12%">
            Админ центр
        </th>
        <th width="28%">
            Административно-территориальное деление (согласно ОКАТО)
        </th>
        <th width="10%">
            Код ОКАТО
        </th>
    </tr>
    <tr>
        <td>
          1  
        </td>
        <td>
          Адыгея
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/adigeya.svg.png'); ?> 
            </div>
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Coat_of_arms_of_Adygea.svg.png'); ?> 
           </div>
        </td>
        <td>
            7792
        </td>
        <td>
            Майкоп
        </td>
        <td>
            7 районов и 2 города
        </td>
        <td>
            79
        </td>

    </tr>    <tr>
        <td>
          2  
        </td>
        <td>
          Алтай
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Altai.svg.png'); ?> 
            </div>
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Coat_Altai.svg.png'); ?> 
           </div>
        </td>
        <td>
            92 903
        </td>
        <td>
            Горно-Алтайск
        </td>
        <td>
            10 районов и 1 город
        </td>
        <td>
            84
        </td>

    </tr>    <tr>
        <td>
          3  
        </td>
        <td>
          Башкортостан
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Bashkortostan.svg.png'); ?> 
            </div>
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Coat_Bashkortostan.svg.png'); ?> 
           </div>
        </td>
        <td>
            142 947
        </td>
        <td>
            Уфа
        </td>
        <td>
            54 района и 21 город
        </td>
        <td>
            80
        </td>

    </tr>    <tr>
        <td>
          4  
        </td>
        <td>
          Бурятия
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Buryatia.svg.png'); ?> 
            </div>
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Coat_Buryatiya.svg.png'); ?> 
           </div>
        </td>
        <td>
            351 334
        </td>
        <td>
            Улан-Удэ
        </td>
        <td>
            21 район и 2 города
        </td>
        <td>
            81
        </td>

    </tr>   <tr>
        <td>
          5  
        </td>
        <td>
          Дагестан
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Dagestan.svg.png'); ?> 
            </div>
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Coat_Dagestan.svg.png'); ?> 
           </div>
        </td>
        <td>
            50 270
        </td>
        <td>
            Махачкала
        </td>
        <td>
            41 район и 10 городов
        </td>
        <td>
            82
        </td>

    </tr>   <tr>
        <td>
          6  
        </td>
        <td>
          Ингушетия
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Ingushetia.svg.png'); ?> 
            </div>
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Coat_Ingushetia.svg.png'); ?> 
           </div>
        </td>
        <td>
            3628
        </td>
        <td>
            Магас
        </td>
        <td>
            4 района и 4 города
        </td>
        <td>
            26
        </td>

    </tr>   <tr>
        <td>
          7  
        </td>
        <td>
          Кабардино-Балкария
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Kabardino-Balkaria.svg.png'); ?> 
            </div>
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Coat_Kabardino-Balkaria.svg.png'); ?> 
           </div>
        </td>
        <td>
            12 470
        </td>
        <td>
            Нальчик
        </td>
        <td>
            10 районов и 3 города
        </td>
        <td>
            83
        </td>

    </tr>   <tr>
        <td>
          8  
        </td>
        <td>
          Калмыкия
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Kalmykia.svg.png'); ?> 
            </div>
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Coat_Kalmykia.svg.png'); ?> 
           </div>
        </td>
        <td>
            74 731
        </td>
        <td>
            Элиста
        </td>
        <td>
            13 районов и 1 город
        </td>
        <td>
            85
        </td>

    </tr>   <tr>
        <td>
          9  
        </td>
        <td>
          Карачаево-Черкесия
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Karachay-Cherkessia.svg.png'); ?> 
            </div>
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Coat_Karachay-Cherkessia.svg.png'); ?> 
           </div>
        </td>
        <td>
            14 277
        </td>
        <td>
            Черкесск
        </td>
        <td>
            10 районов и 2 города
        </td>
        <td>
            91
        </td>

    </tr>  <tr>
        <td>
          10  
        </td>
        <td>
          Карелия
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Karelia.svg.png'); ?> 
            </div>
        </td>
        <td>
            <div class="tab-regions-img">
                <?= Html::img('@web/img/Coat_Republic_of_Karelia.svg.png'); ?> 
           </div>
        </td>
        <td>
            180 520
        </td>
        <td>
            Петрозаводск
        </td>
        <td>
            16 районов и 13 городов
        </td>
        <td>
            86
        </td>

    </tr>
</table>
            </div>                    
  



            </div>
        </div><!-- .container-->

        
