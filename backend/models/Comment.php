<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property integer $article_id
 * @property string $content
 * @property string $create_time
 * @property integer $user_id
 * @property integer $comment_status_id
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
            [['id', 'comment_status_id'], 'required'],
            [['id', 'article_id', 'create_time', 'user_id', 'comment_status_id'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'content' => 'Content',
            'create_time' => 'Create Time',
            'user_id' => 'User ID',
            'comment_status_id' => 'Comment Status ID',
        ];
    }
}
