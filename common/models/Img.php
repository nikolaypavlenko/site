<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "img".
 *
 * @property integer $id
 * @property string $image
 * @property integer $product_id
 */
class Img extends \yii\db\ActiveRecord
{
    public $file;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'product_id'], 'required'],
            [['product_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions'=>'jpg, png']

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'product_id' => 'Product ID',
        ];
    }
}
