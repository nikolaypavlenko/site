<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Tag;

?>
<div class="row">
<div class="content col-md-9 col-lg-9">
    <div class="row">
    <?=Html::beginForm(\yii\helpers\Url::to('mine/detailtag'), 'get') ?>
        <div>
            <?=Html::textInput('propert', '', ['class' =>['form-control', 'searching'], 'placeholder' => '    свойство']) ?>
        </div>
        <div>
            <?=Html::dropDownList('tag', $currentProduct, ArrayHelper::map(Tag::listTag(), 'id', 'name'),
            ['class' => ['form-control'], 'prompt' => 'модель']) ?>
        </div>
        <div>
            <?=Html::dropDownList('price', '',[
                '0-150' => 'до 150 грн.',
                '150-200' => '150 грн. - 200 грн.',
                '200-250' => '200 грн. - 250 грн.',
                '250-300' => '250 грн. - 300 грн.',
                '300' => '300 грн. - выше',
            ],['class' => ['form-control'], 'prompt' => 'цена']) ?>
        </div>
        <div >
            <?=Html::submitButton('Искать', ['class' => ['btn btn-success', 'searching']]) ?>
        </div>
    <?=Html::endForm() ?>
    </div>
</div>
</div>

