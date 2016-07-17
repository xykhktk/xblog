<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/16
 * Time: 20:47
 */

namespace backend\controllers;
use yii\web\Controller;
use common\models\Setting;
use Yii;

class SettingController extends  Controller
{

    public function actionIndex(){

        $model = Setting::findOne(1);
        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())){
            /*$model->name = Yii::$app->request->post('name','');
            $model->keyword = Yii::$app->request->post('keyword','');
            $model->description = Yii::$app->request->post('description','');
            $model->copyright = Yii::$app->request->post('copyright','');  md，我自己保存不行，非要用load 才行*/
            $model->save();
            //echo  Yii::$app->request->post('name','');
            return $this->redirect(['setting/index']);
        }else{
            $currentSetting = Setting::find()->where(['id' => 1])->asArray()->one();
            return $this->render('index',['model' => $model,'currentSetting' => $currentSetting]);
        }

    }

}