    <div class="body-content">
        <?php $i = 1 ;?>
        <?php foreach($purchase  as $key => $product) :?>
                
                <?php if(is_float($i/"2")) {
                             echo "<div class='row'>" ; 
                      } ?>
                <?php if (!empty($product)) : ?>
                    <div class="col-md-6 col-lg-6">
                        <div class="col-md-6 col-lg-6">
                            <div class="col-md-4 col-lg-4">
                                    <img style="height:100px" src="<?=$product->img['0']['image'] ?>"">
                            </div>
                            <div class="col-md-8 col-lg-8">
                                    <h4 class="basket-titl"><?=$product->title_ru ?></h4>
                                    модель:  <span style="color:green"><?=$product->logo ?></span>
                                    <h4> цена:  <?=$product->price ?> грн. </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6"> 
                            <div class="row">
                                <div class="btn-group btn-lg basket-count" role="group" aria-label="...">
                                        <a class="btn btn-default" href="<?php echo Yii::$app->urlManager->createUrl(['site/basket', 'product_id' => $product->id]) ; ?>"> 
                                            <span class="glyphicon glyphicon-minus"></span> </a>
                                            <span class="btn btn-default" ><b>
                                                <?php foreach ($count as $prod_id => $value) :?>
                                                        <?php if($prod_id == $product->id): echo $value ; $quantity = $value ;?>
                                                        <?php endif ?>
                                                <?php endforeach ;?></b></span>
                                        <a class="btn btn-default" href="<?php echo Yii::$app->urlManager->createUrl(['site/add_basket', 'id' => $product->id]) ; ?>">
                                            <span class="glyphicon glyphicon-plus"></span></a>
                                </div>
                            </div>
                            <div class=row">
                                <div class="summa"> сумма: <?php echo $summa = ($product->price)* $quantity ; $itogo[] = $summa; ?> грн. </div>
                            </div>
                       </div>
                    <hr class="basket_line"> 
                    </div>
                <?php endif; ?>
                <?php if(!is_float($i/"2")) {
                         echo "</div>" . "<br><br>";
                      } ?>        
                <?php $i++ ;?> 
        <?php endforeach ;?>
    </div>
        <div class="row">
        <div class="col-md-6 col-lg-6"></div>
        <div class="col-md-6 col-lg-6">
            <span class="itogo-basket"> Итого: <?=array_sum($itogo) ?> грн. </span> <button type="button" class="btn btn-success">Оплатить</button>

        </div>
        </div>
        
    </div>
