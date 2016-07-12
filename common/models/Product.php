<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title_ru
 * @property string $title_eng
 * @property string $description_ru
 * @property string $description_eng
 * @property string $logo
 * @property string $tag_id
 * @property integer $price
 * @property integer $account
 * @property integer $status
 * @property string $date_create
 * @property string $date_update
 */
class Product extends \yii\db\ActiveRecord
{
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_eng', 'description_ru', 'description_eng', 'logo', 'tag_id', 'price', 'account', 'status', 'date_create', 'date_update'], 'required'],
            [['description_ru', 'description_eng'], 'string'],
            [[ 'price', 'account', 'status'], 'integer'],
            [['tag_id', 'date_create', 'date_update'], 'safe'],
            [['title_ru', 'title_eng', 'logo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Title Ru',
            'title_eng' => 'Title Eng',
            'description_ru' => 'Description Ru',
            'description_eng' => 'Description Eng',
            'logo' => 'Logo',
            'tag_id' => 'Tag ID',
            'price' => 'Price',
            'account' => 'Account',
            'status' => 'Status',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

   public function getRelationTags()
    {
        return $this->hasMany(RelationTag::className(), ['product_id' => 'id']);
    }

    public function getTag()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->via('relationTags');
    }

    public function getImg()
    {
        return $this->hasMany(Img::className(), ['product_id' => 'id']);
    }

}



 
     /**Yii::$app->db->createCommand()->batchInsert
        ('product', ['title_ru', 'title_eng', 'description_ru', 'description_eng', 'logo', 'tag_id', 'price', 'account', 'status', 'date_create', 'date_update'],
           [ ['Xone' , 
            'Xone', 
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mattis in lectus vel consectetur. Sed nec nulla eu turpis iaculis tincidunt sit amet ut elit. Quisque vitae pellentesque risus.', 
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mattis in lectus vel consectetur. Sed nec nulla eu turpis iaculis tincidunt sit amet ut elit. Quisque vitae pellentesque risus.', 
            'MujJ', 
            '8', 
            '25', 
            '44', 
            '1', 
            '2017-02-05', 
            '2019-02-05'],
            ['Sony-20' , 
            'Sony20', 
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mattis in lectus vel consectetur. Sed nec nulla eu turpis iaculis tincidunt sit amet ut elit. Quisque vitae pellentesque risus.', 
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mattis in lectus vel consectetur. Sed nec nulla eu turpis iaculis tincidunt sit amet ut elit. Quisque vitae pellentesque risus.', 
            'NTY', 
            '7', 
            '44', 
            '54', 
            '1', 
            '2013-02-05', 
            '2010-02-05'],
            ['Sony' , 
            'Sony', 
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mattis in lectus vel consectetur. Sed nec nulla eu turpis iaculis tincidunt sit amet ut elit. Quisque vitae pellentesque risus.', 
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mattis in lectus vel consectetur. Sed nec nulla eu turpis iaculis tincidunt sit amet ut elit. Quisque vitae pellentesque risus.', 
            'v25d', 
            '6', 
            '4', 
            '565', 
            '1', 
            '2002-02-05', 
            '2006-02-05']
            ])
        ->execute(); **/