<?php
use yii\data\ActiveDataProvider;
use yii\data\DataProviderInterface;
use common\models\Tag;
use yii\db\Query;
use yii\db\ActiveQuery;
use yii\db\BaseActiveRecord;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;




/*$tags = Tag::find()->where(['id' => $id])->one();

$products = $tags->product;
// создание провайдера данных с конфигурацией для сортировки и постраничной разбивки
$provider = new XyzDataProvider([
    'pagination' => [...],
    'sort' => [...],
]);
// Получение данных с разбивкой на страницы и сортировкой.
$models = $provider->getModels();
// получение количества данных на текущей странице
$count = $provider->getCount();
// получение общего количества данных на всех страницах
$totalCount = $provider->getTotalCount();

*/

$query = Tag::find()->where(['id' => $id])->all();

$provider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' => 3,
    ],
 ]);
// возвращает массив Post объектов
//$posts = $provider->getModels();
// получение количества данных на текущей странице
//$count = $provider->getCount();
// получение общего количества данных на всех страницах
//$totalCount = $provider->getTotalCount();

/*$dataProvider = new SqlDataProvider([
    'sql' => 'SELECT `title_ru`, `description_ru`' .
             'FROM `product` ' .
             'INNER JOIN `relation_tag` ON (`product.id` = `relation_tag.product_id`) ' .
             'INNER JOIN `tag` ON (`relation_tag`.`tag_id` = `tag`.`id`) ' .
             'WHERE `relation_tag`.`tag_id` = `{$id}`' 
             //'GROUP BY ArticleID',
    //'params' => [':author' => 'Arno Slatius'],
]);*/

    $dataProvider = new ArrayDataProvider([
    'allModels' => Tag::find()->where(['id' => $id])->one(),
]);


        var_dump( $dataProvider); die();



 $tags = Tag::find()->where(['id' => $id])->one();

        $products = $tags->product;





var_dump($tags) ; die();


echo yii\grid\GridView::widget([
    'dataProvider' => $provider,
]);
