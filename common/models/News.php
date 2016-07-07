<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title_ru
 * @property string $title_eng
 * @property string $text_ru
 * @property string $text_eng
 * @property string $date
 * @property integer $status
 * @property integer $user_id
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_eng', 'text_ru', 'text_eng', 'date', 'status', 'user_id'], 'required'],
            [['text_ru', 'text_eng'], 'string'],
            [['date'], 'safe'],
            [['status', 'user_id'], 'integer'],
            [['title_ru', 'title_eng'], 'string', 'max' => 255],
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
            'text_ru' => 'Text Ru',
            'text_eng' => 'Text Eng',
            'date' => 'Date',
            'status' => 'Status',
            'user_id' => 'User ID',
        ];
    }
}
