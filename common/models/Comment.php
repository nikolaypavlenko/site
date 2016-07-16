<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $title
 * @property string $comment
 * @property integer $product_id
 * @property string $data
 * @property integer $parent_id
 * @property integer $user_id
 * @property integer $status_id
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string'],
            [['product_id', 'parent_id', 'user_id', 'status_id'], 'integer'],
            [['data'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'comment' => 'Ваш отзыв',
            'product_id' => 'Product ID',
            'data' => 'Data',
            'parent_id' => 'Parent ID',
            'user_id' => 'User ID',
            'status_id' => 'Status ID',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getChildComment() 
    {
        return $this->hasMany(Comment::className(), ['parent_id' => 'id']);
    }
}
