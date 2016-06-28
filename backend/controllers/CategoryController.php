<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/27
 * Time: 21:39
 */
namespace  backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use common\models\Category;
use Yii;

class CategoryController extends Controller{

    public function actionIndex(){
        $model = Category::find();
        $pagination = new Pagination(['totalCount'=>$model->count(),'pageSize'=>10]);
        $result = $model->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index',['result'=>$result,'pagination'=>$pagination]);
    }


    public function actionAdd(){
        $model = new Category();
        //return \yii\helpers\Json::encode(array('data' => $data));

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('sucess','添加文章分类成功');
            return $this->redirect(['index']);
        }

        return $this->render('add',['model'=> $model]);

    }
}
