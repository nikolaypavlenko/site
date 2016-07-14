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

				<h3> цена:  <?=$product->price ?> грн. </h3><br>

						<?php foreach ($product->tag as $item) :?>
		                         <a href="index.php?r=site/detailtag&id=<?=$item->id?>"><?=$item->name?>&nbsp&nbsp</a>   
		                <?php endforeach ;?>
				<hr>

		
			<?php foreach ($posts as $post) :?>

					<div class='row'>
						<div class="col-md-6 col-lg-6">
								<b>автор: <?echo $post['username'] ?> </b>
						</div>

						<div class="col-md-6 col-lg-6" align="right">
								<?echo $post['data'] ?> 
						</div>
					</div>
					<div class='row'>
						<div class="col-md-11 col-lg-11">
							<em><?echo $post['comment'] ?></em>
						</div>
						<div class="col-md-1 col-lg-1">
								<a href="index.php?r=site/detail&id=<?=$post['product_id']?>&parent=<?=$post['id']?>">
									<button type="button" class="btn btn-default btn-xs">ответить</button>
								</a>
						</div>

						
							<?php if (!empty($paren) AND $paren == $post['id']) : ?> <!-- вывод комментария к отзыву -->

								 	<?php $form = ActiveForm::begin(); ?>
								    <?= $form->field($comment, 'comment')->textArea(['maxlength' => true]) ?>
								    <div class="form-group">
								        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Опубликовать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
								    </div>
								    <?php ActiveForm::end(); ?>

							<?php endif; ?>

					</div><hr>
			<?php endforeach ;?>

		

		
			<br><br>
			  <?php $form = ActiveForm::begin(); ?>

			    <?= $form->field($comment, 'comment')->textArea(['maxlength' => true]) ?>

			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Опубликовать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>

			    <?php ActiveForm::end(); ?>

		</div>



	
