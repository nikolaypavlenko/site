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

		</div>

	</div>

		<div class="col-md-9 col-lg-9">
			
			<br><br>
			  <?php $form = ActiveForm::begin(); ?>

			    <?= $form->field($comment, 'title')->textInput() ?>

			    <?= $form->field($comment, 'comment')->textArea(['maxlength' => true]) ?>


			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Опубликовать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>

			    <?php ActiveForm::end(); ?>

		</div>



	




<?php //var_dump($product->tag);

