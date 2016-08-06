<?php

namespace frontend\models;

use Yii;

    class Basket 
    {
        
        public static function Count_items()
        {
            $session = Yii::$app->session;
            
            return(count($session['basket']));
        }
                
        public static function Count_values()
        {
            $session = Yii::$app->session;
            
            if($session['basket']) {
            
            return array_count_values($session['basket']); 
            }
        }
        
        
    }

