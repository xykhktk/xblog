<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/18
 * Time: 23:27
 */

namespace backend\controllers;
use yii\web\Controller;
use Yii;

class BaseController extends  Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) { //先让CommonController的beforeAction执行
            $session = Yii::$app->session->get('backend_admin_username');

            if(!isset($session) || empty($session)){
                return Yii::$app->response->redirect(['site/login']);
            }
            return true;
        }
        return false;
    }

}