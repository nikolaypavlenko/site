<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Tag;
use yii\data\Pagination;
use yii\data\Sort;


class MineController extends Controller
{
    
    public function actionDetailtag($tag='', $price='', $propert='')
    {
        $tages = Tag::find()->all(); // для левого сайдбара
        
        if(isset($_GET['page'])) { //при отправки товара в корзину, чтобы оставались на той же странице
            $pag = $_GET['page'];
        } else {
            $pag = '1';
        }
        
        $sort = new Sort([
        'attributes' => [
            'price' => [
                'asc' => ['price' => SORT_ASC],
                'desc' => ['price' => SORT_DESC],
                'default' => SORT_DESC,
                'label' => 'цене',
                ],
            ],
        ]);
        
        $query = Tag::find()
                ->select (['product.title_ru', 'product.logo', 'img.image', 'product.price', 'relation_tag.product_id'])
                ->distinct()
                ->leftJoin('relation_tag', '`relation_tag`.`tag_id` = `tag`.`id`')
                ->leftJoin('product', '`relation_tag`.`product_id` = `product`.`id`')
                ->leftJoin('img', '`img`.`product_id` = `product`.`id`')
                ->FilterWhere(['like', '`tag`.`id`', $tag])
                ->andWhere(['like', '`product`.`status`', '1'])
                ->andFilterWhere(['like', '`product`.`description_ru`', $propert])
                ->asArray();
                if($price){
                    $prices = explode("-", $price);

                    if(isset($prices[0]) && isset($prices[1])) {
                        $query->andWhere(['between', 'price', $prices[0], $prices[1]]);
                    }
                    else{
                        $query->andWhere(['>=', 'price', $prices[0]]);
                    }
                }
        $query->orderBy($sort->orders);
       
        //$countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9]);
        $pages->pageSizeParam = false;

        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        return $this->render('detailtag', [
               'posts' => $posts,
               'pages' => $pages,
               'tages' => $tages,
               'pag' => $pag,
               'sort' => $sort,
               'tag' => $tag,
               'price' => $price,
               'propert' => $propert,
                ]);
    }
    
    public function actionAdd_detailtag_basket($id,  $page = 1, $tag='', $price='', $propert='') 
    {  
        $session = Yii::$app->session;
        $session->open();

        $basket = $session['basket'];
        $basket[] = $id;
        $session['basket'] = $basket;  
        
        return $this->redirect( Yii::$app->urlManager->createUrl(['mine/detailtag', 'price' => $price,
            'tag' => $tag, 'page' => $page, 'propert' => $propert]));    
    }
}
   


        


