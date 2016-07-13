<?php
/* @var $this yii\web\View */

$this->title = 'Смартфоны и телефоны';
?>
<div class="site-index">

    <div class="container-fluid">

    <div class="body-content">

        <div class="col-md-2 col-lg-2">
                
            <div class="row">
                <div><h4> Выбор по параметрам </h4></div><br>
                    <?php foreach ($tag as $item) :?>
                         <a href="index.php?r=site/detailtag&id=<?=$item->id ?>"><?=$item->name ?></a><br>
                    <?php endforeach ;?>
            </div><br><br><br><br>

        </div>


        
        <div class="col-md-10 col-lg-10">
    

        <?php if (!empty($provider)) : ?>
                
            <div class="row">          




                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider['0'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider['0']->id ?>"><b><h3><center><?=$provider['0']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider['0']->img->image ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider['0']->logo ?></span></b><br>
                        Цена: <?=$provider['0']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider['1'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider['1']->id ?>"><b><h3><center><?=$provider['1']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider['1']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider['1']->logo ?></span></b><br>
                        Цена: <?=$provider['1']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider['2'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider['2']->id ?>"><b><h3><center><?=$provider['2']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider['2']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider['2']->logo ?></span></b><br>
                        Цена: <?=$provider['2']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>
            </div>
        
            <div class="row">

                <div class="col-md-4 col-lg-4">
                     <?php if (!empty($provider['3'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider['3']->id ?>"><b><h3><center><?=$provider['3']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider['3']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider['3']->logo ?></span></b><br>
                        Цена: <?=$provider['3']->price ?> грн. <br><br>
                        <hr>
                     <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider['4'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider['4']->id ?>"><b><h3><center><?=$provider['4']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider['4']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider['4']->logo ?></span></b><br>
                        Цена: <?=$provider['4']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider['5'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider['5']->id ?>"><b><h3><center><?=$provider['5']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider['5']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider['5']->logo ?></span></b><br>
                        Цена: <?=$provider['5']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider['6'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider['6']->id ?>"><b><h3><center><?=$provider['6']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider['6']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider['6']->logo ?></span></b><br>
                        Цена: <?=$provider['6']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider['7'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider['7']->id ?>"><b><h3><center><?=$provider['7']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider['7']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider['7']->logo ?></span></b><br>
                        Цена: <?=$provider['7']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider['8'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider['8']->id ?>"><b><h3><center><?=$provider['8']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider['8']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider['8']->logo ?></span></b><br>
                        Цена: <?=$provider['8']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>
            </div>


        <?php endif; ?>

             <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>

        </div>
    </div>
    </div>
</div>
