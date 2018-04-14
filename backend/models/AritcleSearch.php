<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Article;

/**
 * AritcleSearch represents the model behind the search form about `backend\models\Article`.
 */
class AritcleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(),['authorName','cateName','statusName']);
    }

    public function rules()
    {
        return [
            [['id', 'author_id', 'category_id', 'create_time', 'update_time', 'status', 'categories_id'], 'integer'],
            [['content', 'title', 'authorName', 'cateName', 'statusName'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,
            'category_id' => $this->category_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'status' => $this->status,
            'categories_id' => $this->categories_id,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'title', $this->title]);

        $query->join('INNER JOIN', 'Author', 'article.author_id = Author.id');
        $query->andFilterWhere(['like', 'Author.name', $this->authorName]);

        $query->join('INNER JOIN', 'Categories', 'article.category_id = Categories.id');
        $query->andFilterWhere(['like', 'Categories.cate_name', $this->cateName]);

        $query->join('INNER JOIN', 'article_status', 'article.status = article_status.id');
        $query->andFilterWhere(['like', 'article_status.status_name', $this->statusName]);

        $dataProvider->sort->attributes['authorName'] =
            [
                'asc' => ['Author.name' => SORT_ASC],
                'desc' => ['Author.name' => SORT_DESC]
            ];

        $dataProvider->sort->attributes['cateName'] =
            [
                'asc' => ['Categories.cate_name' => SORT_ASC],
                'desc' => ['Categories.cate_name' => SORT_DESC]
            ];

        $dataProvider->sort->attributes['statusName'] =
            [
                'asc' => ['article_status.status_name' => SORT_ASC],
                'desc' => ['article_status.status_name' => SORT_DESC]
            ];

        return $dataProvider;
    }
}
