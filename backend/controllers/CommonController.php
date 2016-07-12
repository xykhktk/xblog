<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/10
 * Time: 16:59
 */

namespace backend\controllers;
use Yii;
use backend\models\LoginForm;
use yii\web\Controller;

class CommonController extends  Controller
{
    public $userName;
    public $userId;

    public function beforeAction($action){
        if(!$this->getUserSeesion()){

        }

        $this->userName = Yii::$app->session->get(LoginForm::BACKEND_ADMIN_USERNAME);
        $this->id = Yii::$app->session->get(LoginForm::BACKEND_ADMIN_ID);
    }

    private function getUserSeesion(){
        $session = Yii::$app->getSession();
        $this->userName = $session->get(LoginForm::BACKEND_ADMIN_USERNAME);
        $this->userId = $session->get(LoginForm::BACKEND_ADMIN_ID);
        return $this->userId;
    }

}