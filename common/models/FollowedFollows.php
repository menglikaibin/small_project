<?php

namespace common\models;

use backend\models\Author;
use Yii;

/**
 * This is the model class for table "followed_follows".
 *
 * @property string $id
 * @property integer $author_id
 * @property integer $user_id
 */
class FollowedFollows extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'followed_follows';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'user_id'], 'required'],
            [['author_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => '作者',
            'user_id' => '用户',
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
