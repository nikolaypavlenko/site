<?php use yii\helpers\Html;

$this->title = 'Новости';

?>


	<?php foreach ($news as $new) :?>
                         
            <h1 style="color:grey"><?=$new->title_ru ?></h1><br>

			<p><em><?=$new->text_ru ?></em></p><br>

    <?php endforeach ;?>