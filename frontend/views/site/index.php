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
                         <?=$item->name ?><br>
                    <?php endforeach ;?>
            </div><br><br><br><br>

             <div class="row">
                <div><h4> Новости </h4></div><br>
                    <?php foreach ($news as $new) :?>
                        <a href="index.php?r=site/detailnews&id=<?=$new->id ?>"><?=$new->title_ru ?></a><br>
                    <?php endforeach ;?>
            </div>
        </div>





        <div class="col-md-10 col-lg-10">
    

        <?php if (!empty($posts)) : ?>
                
            <div class="row">

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($posts['0'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$posts['0']->id ?>"><b><h3><center><?=$posts['0']->title_ru ?></center></h3></b></a>
                        <em> <?=$posts['0']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$posts['0']->logo ?></span></b><br>
                        Цена: <?=$posts['0']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($posts['1'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$posts['1']->id ?>"><b><h3><center><?=$posts['1']->title_ru ?></center></h3></b></a>
                        <em> <?=$posts['1']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$posts['1']->logo ?></span></b><br>
                        Цена: <?=$posts['1']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($posts['2'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$posts['2']->id ?>"><b><h3><center><?=$posts['2']->title_ru ?></center></h3></b></a>
                        <em> <?=$posts['2']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$posts['2']->logo ?></span></b><br>
                        Цена: <?=$posts['2']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>
            </div>
        
            <div class="row">

                <div class="col-md-4 col-lg-4">
                     <?php if (!empty($posts['3'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$posts['3']->id ?>"><b><h3><center><?=$posts['3']->title_ru ?></center></h3></b></a>
                        <em> <?=$posts['3']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$posts['3']->logo ?></span></b><br>
                        Цена: <?=$posts['3']->price ?> грн. <br><br>
                        <hr>
                     <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($posts['4'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$posts['4']->id ?>"><b><h3><center><?=$posts['4']->title_ru ?></center></h3></b></a>
                        <em> <?=$posts['4']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$posts['4']->logo ?></span></b><br>
                        Цена: <?=$posts['4']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($posts['5'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$posts['5']->id ?>"><b><h3><center><?=$posts['5']->title_ru ?></center></h3></b></a>
                        <em> <?=$posts['5']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$posts['5']->logo ?></span></b><br>
                        Цена: <?=$posts['5']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($posts['6'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$posts['6']->id ?>"><b><h3><center><?=$posts['6']->title_ru ?></center></h3></b></a>
                        <em> <?=$posts['6']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$posts['6']->logo ?></span></b><br>
                        Цена: <?=$posts['6']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($posts['7'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$posts['7']->id ?>"><b><h3><center><?=$posts['7']->title_ru ?></center></h3></b></a>
                        <em> <?=$posts['7']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$posts['7']->logo ?></span></b><br>
                        Цена: <?=$posts['7']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($posts['8'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$posts['8']->id ?>"><b><h3><center><?=$posts['8']->title_ru ?></center></h3></b></a>
                        <em> <?=$posts['8']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$posts['8']->logo ?></span></b><br>
                        Цена: <?=$posts['8']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>
            </div>


             <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>

        <?php endif; ?>

        </div>
    </div>
    </div>
</div>
