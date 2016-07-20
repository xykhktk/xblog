<?php
/**
 * Created by PhpStorm.
 * User: biaoge
 * Date: 2016/7/20
 * Time: 10:56
 */

namespace backend\controllers;

use common\models\Tags;
use Yii;

class TagsController extends BaseController
{
    
    public function actionDelete(){
        $select = Yii::$app->request->post('selected');
        if(Tags::deleteIn($select)){
            Yii::$app->session->setFlash('success','删除标签成功');
        }else{
            Yii::$app->session->setFlash('failed' ,'删除标签成功');
        }
        return $this->redirect(['index']);
    }

    public function actionAdd(){
        $model = new Tags();
        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success','add sucess');
        }else{
            Yii::$app->session->setFlash('failed' ,'add failed');
        }
        return $this->redirect(['index']);
    }

    public function actionIndex(){

        $tags = Tags::find()->asArray()->all();
        $newTag = new Tags();
        return $this->render('index',['newTag' => $newTag ,'tags' => $tags] );
    }

}