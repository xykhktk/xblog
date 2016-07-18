<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/17
 * Time: 20:53
 */

namespace backend\controllers;
use backend\controllers\BaseController;
use yii\web\Controller;
use common\models\ArticleComment;
use yii\data\Pagination;
use Yii;

class CommentController extends BaseController
{
    public function actionIndex(){
        $model = ArticleComment::find()->asArray()->all();
        $page = new Pagination(['totalCount' => count($model) ,'pageSize' => 20]);
        //print_r($model);
        $model = (new \yii\db\Query())->select("ac.id,ac.name,ac.content,ac.status,ac.date,a.title")->from("x_article_comment ac")
            ->leftJoin("x_article as a","ac.article_id = a.id")
            ->offset($page->offset)->limit($page->limit)->all();
        return $this->render('index',['model' => $model , 'pagination' => $page]);
    }

    public function actionDisable($id){
        if(!empty($id)){
            $model = ArticleComment::findOne($id);  //$model = ArticleComment::find($id); 这样的$modle没有save.瞎搞！！
            $model->status = 0;
            $model->save();
        }
        return $this->redirect(['comment/index']);
    }

    public function actionEnable($id){
        if(!empty($id)){
            $model = ArticleComment::findOne($id);  //$model = ArticleComment::find($id); 这样的$modle没有save.瞎搞！！
            $model->status = 1;
            $model->save();
        }
        return $this->redirect(['comment/index']);
    }

    public function actionSearch(){
        $search = Yii::$app->request->post('search');
        if(!empty($search)){
            $model = (new \yii\db\Query())->select("ac.id,ac.name,ac.content,ac.status,ac.date,a.title")
                ->from("x_article_comment ac")->leftJoin("x_article as a","ac.article_id = a.id")
                ->where(['like','ac.name',$search])->orWhere(['like','ac.content',$search])->all();
            $page = new Pagination(['totalCount' => count($model) ,'pageSize' => 20]);
            $model = (new \yii\db\Query())->select("ac.id,ac.name,ac.content,ac.status,ac.date,a.title")
                ->from("x_article_comment ac")->leftJoin("x_article as a","ac.article_id = a.id")
                ->where(['like','ac.name',$search])->orWhere(['like','ac.content',$search])
                ->offset($page->offset)->limit($page->limit)->all();
            //$model = ArticleComment::find()->where(['like','name',$search])->orWhere(['like','content',$search])->asArray()->all();
            //如果没有all，$model就会是一个装有sql语句的对象
            //print_r($model);exit();
            return $this->render('index',['model' => $model , 'pagination' => $page]);
        }
        return $this->redirect(['comment/index']);
    }



}