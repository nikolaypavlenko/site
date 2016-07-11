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
                    <?php if (!empty($provider->allModels['0'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider->allModels['0']->id ?>"><b><h3><center><?=$provider->allModels['0']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider->allModels['0']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider->allModels['0']->logo ?></span></b><br>
                        Цена: <?=$provider->allModels['0']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider->allModels['1'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider->allModels['1']->id ?>"><b><h3><center><?=$provider->allModels['1']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider->allModels['1']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider->allModels['1']->logo ?></span></b><br>
                        Цена: <?=$provider->allModels['1']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider->allModels['2'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider->allModels['2']->id ?>"><b><h3><center><?=$provider->allModels['2']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider->allModels['2']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider->allModels['2']->logo ?></span></b><br>
                        Цена: <?=$provider->allModels['2']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>
            </div>
        
            <div class="row">

                <div class="col-md-4 col-lg-4">
                     <?php if (!empty($provider->allModels['3'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider->allModels['3']->id ?>"><b><h3><center><?=$provider->allModels['3']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider->allModels['3']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider->allModels['3']->logo ?></span></b><br>
                        Цена: <?=$provider->allModels['3']->price ?> грн. <br><br>
                        <hr>
                     <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider->allModels['4'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider->allModels['4']->id ?>"><b><h3><center><?=$provider->allModels['4']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider->allModels['4']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider->allModels['4']->logo ?></span></b><br>
                        Цена: <?=$provider->allModels['4']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider->allModels['5'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider->allModels['5']->id ?>"><b><h3><center><?=$provider->allModels['5']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider->allModels['5']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider->allModels['5']->logo ?></span></b><br>
                        Цена: <?=$provider->allModels['5']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider->allModels['6'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider->allModels['6']->id ?>"><b><h3><center><?=$provider->allModels['6']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider->allModels['6']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider->allModels['6']->logo ?></span></b><br>
                        Цена: <?=$provider->allModels['6']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider->allModels['7'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider->allModels['7']->id ?>"><b><h3><center><?=$provider->allModels['7']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider->allModels['7']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider->allModels['7']->logo ?></span></b><br>
                        Цена: <?=$provider->allModels['7']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php if (!empty($provider->allModels['8'])) : ?>
                        <a href="index.php?r=site/detail&id=<?=$provider->allModels['8']->id ?>"><b><h3><center><?=$provider->allModels['8']->title_ru ?></center></h3></b></a>
                        <em> <?=$provider->allModels['8']->description_ru ?></em><br>
                        <b>Модель: <span style="color:blue"><?=$provider->allModels['8']->logo ?></span></b><br>
                        Цена: <?=$provider->allModels['8']->price ?> грн. <br><br>
                        <hr>
                    <?php endif; ?>
                </div>
            </div>


        <?php endif; ?>

        </div>
    </div>
    </div>
</div>
