<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

    <div class="body-content">

		<div class="col-md-3 col-lg-3">

		    <h1><img style="height:200px" src="<?=$product->img['0']['image'] ?>"><br><br></h1>

		</div>

		<div class="col-md-9 col-lg-9">

				<h1 style="color:grey"><?=$product->title_ru ?></h1><br>

				модель:  <span style="color:green"><?=$product->logo ?></span><br><br>

				<em><?=$product->description_ru ?></em><br>

				<h3> цена:  <?=$product->price ?> грн. 

					           <a href="index.php?r=site/add&id=<?=$product->id?>" <button type="button" class="btn btn-warning"><acronym title="в корзину"> 
                                                               <span class="glyphicon glyphicon-shopping-cart"></span></acronym></a></button> </h3><br>

						<?php foreach ($product->tag as $item) :?>
		                         <a href="index.php?r=site/detailtag&id=<?=$item->id?>"><?=$item->name?>&nbsp&nbsp</a>   
		                <?php endforeach ;?>
	
			<?php if(!empty($comments)) :?> 
  				<?php foreach ($comments as $comment) :?>
					<hr>
					<div class='row'>
						<div class="col-md-6 col-lg-6"> <b>автор: <?=$comment->user->username ?> </b> </div>
						<div class="col-md-6 col-lg-6" align="right"> <?=$comment->data ?>  </div>
					</div>
					<div class='row'>
						<div class="col-md-11 col-lg-11"> <em><?=$comment->comment ?></em> </div>
						<div class="col-md-1 col-lg-1"> <a href="index.php?r=site/detail&id=<?=$comment->product_id?>&parent=<?=$comment->id?>"> 
									<button type="button" class="btn btn-default btn-xs">ответить</button> 	</a> </div>
					</div>

					<?php foreach ($childcomments as $child) :?> 
							
							<?php if ($child->parent_id == $comment->id) : ?> <!-- вывод комментария к отзыву -->
									<div class='row'>	 			
										<div class="col-md-2 col-lg-2">		</div>			
										<div class="col-md-5 col-lg-5">	<hr> 	<b>автор: <?=$child->user->username ?> </b> </div>
										<div class="col-md-5 col-lg-5" align="right"> <hr> 	<?=$child->data ?>  </div>
									</div>
									<div class='row'>
										<div class="col-md-2 col-lg-2">	</div>	
										<div class="col-md-10 col-lg-10">	<em> <?=$child->comment ?> </em></div>
									</div>
							<?php endif; ?>
					<?php endforeach ;?>

					<?php if (!empty($paren) AND $paren == $comment->id) : ?>
							<div class='row'>
								<div class="col-md-2 col-lg-2">	</div>	
								<div class="col-md-10 col-lg-10">
									<?php $form = ActiveForm::begin(); ?>
									    <?= $form->field($comment, 'comment')->textArea(['maxlength' => true ]) ?>
									    <?= $form->field($comment, 'parent_id')->hiddenInput(['value' => $comment->id])->label(false) ?>
									    <div class="form-group">
									        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Опубликовать', 
									        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
									    </div>
									<?php ActiveForm::end(); ?>
								</div>
							</div>
					<?php endif; ?>
				<?php endforeach ;?>
			<?php endif; ?>
			<br><br>
		        
	
	        <?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($comment, 'comment')->textArea(['maxlength' => true]) ?>

		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Опубликовать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>
			<span style="color:red"> <?=$message ?> </span>
		    <?php ActiveForm::end(); ?>

		</div>
	</div>



	
