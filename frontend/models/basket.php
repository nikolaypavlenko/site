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
                
                
        
        
    }

