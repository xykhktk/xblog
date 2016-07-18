<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/27
 * Time: 21:39
 */
namespace  backend\controllers;
use backend\controllers\BaseController;
use yii\web\Controller;
use yii\data\Pagination;
use common\models\Category;
use Yii;

class CategoryController extends BaseController{

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

    public function actionDelete(){
        $select = Yii::$app->request->post('selected');
        //return \yii\helpers\Json::encode(array('data' => $select));
        if (Category::deleteIn($select)){
            Yii::$app->session->setFlash('success' ,'删除成功');
        }else{
            Yii::$app->session->setFlash('error' ,'删除失败');
        }
        return $this->redirect(['index']);
    }

    public function actionEdit($id){
        $iid = (int)$id;
        $model = Category::findOne($iid);   //注意跟find（）不同
        if($model){
            if( Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save()){
                Yii::$app->session->setFlash('success','编辑文章分类成功');
                return $this->redirect(['index']);
            }
            return $this->render('edit',['model' => $model]);
        }
        return $this->render('index');
    }

}
