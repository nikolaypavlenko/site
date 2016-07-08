<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "relation_tag".
 *
 * @property integer $id
 * @property integer $tag_id
 * @property integer $product_id
 */
class RelationTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relation_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_id', 'product_id'], 'required'],
            [['tag_id', 'product_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_id' => 'Tag ID',
            'product_id' => 'Product ID',
        ];
    }

    
    
}