<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Img */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="img-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<!-- поле image делаем скрытым чтобы ничего не вводить, но надпись поля в представлении осталась -->

    <?= $form->field($model, 'file')->fileInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



	<?// вывод фото, загруженных ранее?>
    <?php foreach($images as $img) :?>

			<img style="width:200px" src='<?=$img->image ?>'  >

	<?php endforeach ;?>

</div>

