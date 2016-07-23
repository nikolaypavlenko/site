    <div class="body-content">
        
        <?php foreach($purchase  as $key => $product) :?>
                <?php  $i++ ;?>
                    <?php if($i == 1 or $i == 5 or $i == 9) {
                                echo "<div class='row'>" ;
                            } ?> 
                        <div class="col-md-3 col-lg-3">
                            <?php if (!empty($product)) : ?>
                                <b><h3><center><?=$item->title_ru ?></center></h3></b>
                                <img style="height:100px" src="<?=$product->img['0']['image'] ?>""><br>
                                <h1 style="color:grey"><?=$product->title_ru ?></h1>
                                модель:  <span style="color:green"><?=$product->logo ?></span>
                                <h4> цена:  <?=$product->price ?> грн.
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['site/basket', 'product_id' => $product->id]) ; ?>">
                                    <button type="button" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-remove"></span></button></a></h4>

                            <?php endif; ?>
                        </div>

                    <?php if($i == 4 or $i == 8 or $i == 12) {
                                echo "</div>" ; 
                          } ?> 
                    
        <?php endforeach ;?>
        
               
    </div>
