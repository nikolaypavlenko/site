<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $country
 * @property string $first_name
 * @property string $last_name
 * @property string $birthday
 * @property string $skype
 * @property integer $phone
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'country', 'first_name', 'last_name', 'birthday', 'skype', 'phone'], 'required'],
            [['id', 'user_id', 'phone'], 'integer'],
            [['birthday'], 'safe'],
            [['country', 'first_name', 'last_name', 'skype'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'country' => 'Country',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthday' => 'Birthday',
            'skype' => 'Skype',
            'phone' => 'Phone',
        ];
    }
}
