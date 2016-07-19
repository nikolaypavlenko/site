
объединение таблицы с самой собой
SELECT first.id, first.comment, first.product_id, first.data, first.parent_id, second.id, second.comment, second.data 
               FROM comment first, comment second 
               WHERE first.id = second.parent_id




         <?php foreach($comments as $comment){
                    var_dump($comment->user->username); 
          }
            die(); ?>

            
        /*$post_childs = Comment::find()
                    ->select('first.id, first.comment, first.product_id, first.data, first.parent_id, second.id, second.comment, second.data ')
                    ->from('comment first, comment second')
                    //->leftJoin('user , `user`.`id` = `second`.`user_id`')
                    ->where(['product_id' => $id])
                    ->where('first.id = second.parent_id ')

                    //->orderBy(['`comment`.`id`' => SORT_DESK])
                    //->asArray()
                    ->all();*/
        //var_dump($post_child); die();



            $products = Product::findAll($session['basket']); выборка с БД массива с значениями  массива session['basket']
