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

             <div class="row">
                <div><h4> Новости </h4></div><br>
                    <?php foreach ($news as $new) :?>
                        <a href="index.php?r=site/detailnews&id=<?=$new->id ?>"><?=$new->title_ru ?></a><br>
                    <?php endforeach ;?>
            </div>
        </div>

        <div class="col-md-10 col-lg-10">
    
            <?php if (!empty($posts)) : ?>
                        <?php $i = 0 ;?>
                
                        <?php foreach($posts as  $item) :?>
                                <?php  $i++ ;?>
                                    <?php if($i == 1 or $i == 4 or $i == 7) {
                                                echo "<div class='row'>" ;
                                            } ?> 

                                        <div class="col-md-4 col-lg-4">
                                            <?php if (!empty($item)) : ?>
                                                <a href="index.php?r=site/detail&id=<?=$item->id ?>"><b><h3><center><?=$item->title_ru ?></center></h3></b></a>
                                                
                                                <img style="height:200px" src="<?=$item->img['0']['image'] ?>"><br><br>
                                                
                                                <b>Модель: <span style="color:blue"><?=$item->logo ?></span></b><br>
                                                
                                                Цена: <?=$item->price ?> грн. <br><br>
                                                <hr>
                                            <?php endif; ?>
                                        </div>

                                    <?php if($i == 3 or $i == 6 or $i == 9) {
                                                echo "</div>" ;
                                            } ?> 
                        <?php endforeach ;?>
            <?php endif; ?>
        </div>
        <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
        </div>
    </div>
</div>
