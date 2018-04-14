<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property string $id
 * @property string $author_id
 * @property string $category_id
 * @property string $content
 * @property string $create_time
 * @property string $update_time
 * @property integer $status
 * @property integer $categories_id
 * @property integer $article_status_id
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'status', 'categories_id', 'title'], 'required'],
            [['author_id', 'category_id', 'create_time', 'update_time', 'categories_id'], 'integer'],
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
            'author_id' => '作者',
            'category_id' => '分类',
            'content' => '内容',
            'create_time' => '发表时间',
            'update_time' => '修改时间',
            'status' => '状态',
            'categories_id' => '分类',
            'authorName' => '作者',
            'cateName' => '分类',
//            'statusName' => '文章状态'
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public function getArticle_status()
    {
        return $this->hasOne(ArticleStatus::className(), ['id' => 'status']);
    }


}
