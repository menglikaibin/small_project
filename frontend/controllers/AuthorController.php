<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Author;
use frontend\models\AuthorSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\FollowedFollows;

/**
 * AuthorController implements the CRUD actions for Author model.
 */
class AuthorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Author models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthorSearch();
        $id = Yii::$app->getUser()->getId();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $author = (new Query())
            ->select('author_id')
            ->from('followed_follows')
            ->where(['user_id'=>$id])
            ->orderBy('author_id')
            ->all();
        $author_id = array_column($author,'author_id');
//        print_r($author_id);die();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'author_id' => $author_id
        ]);
    }

    /**
     * Displays a single Author model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Author model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Author();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Author model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Author model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionFollow()
    {
        $model = Yii::$app->request->get();
        if (Yii::$app->db->createCommand()->insert('followed_follows', ['author_id' => $model['id'], 'user_id' => Yii::$app->getUser()->getId()])->execute())
        {
            return $this->render('succeed');
        }
        else
        {
            return false;
        }
    }

    public function actionUnfollow()
    {
        $user_id = Yii::$app->getUser()->getId();
        $author_id = Yii::$app->request->get('id');
        if (Yii::$app->db->createCommand()->delete('followed_follows',['author_id'=>$author_id,'user_id'=>$user_id])->execute())
        {
            return $this->render('success');
        }
        else
        {
            return false;
        }
    }

    /**
     * Finds the Author model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Author the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Author::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('所请求的页不存在');
        }
    }
}
