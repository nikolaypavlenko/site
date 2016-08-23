<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Tag;
use yii\data\Pagination;



class MineController extends Controller
{
    
    public function actionDetailtag($tag='', $price='')
    {
        $tages = Tag::find()->all(); // для левого сайдбара
        
        if(isset($_GET['page'])) { //при отправки товара в корзину, чтобы оставались на той же странице
            $pag = $_GET['page'];
        } else {
            $pag = '1';
        }
          
        $query = Tag::find()
                ->select (['*'])
                ->leftJoin('relation_tag', '`relation_tag`.`tag_id` = `tag`.`id`')
                ->leftJoin('product', '`relation_tag`.`product_id` = `product`.`id`')
                ->leftJoin('img', '`img`.`product_id` = `product`.`id`')
                ->FilterWhere(['like', '`tag`.`id`', $tag])
                ->andWhere(['like', '`product`.`status`', '1'])
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
                $query->orderBy(['price' => SORT_ASC ]);
       
       $countQuery = clone $query;
       $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 9]);
                
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('detailtag', [
               'posts' => $posts,
               'pages' => $pages,
               'tages' => $tages,
               //'pag' => $pag,
                ]);
    }
}

