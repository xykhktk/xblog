<?php

namespace backend\controllers;
use yii\web\Controller;
use backend\controllers\BaseController;

class UserController extends BaseController
{
    public function actionUser()
    {
        return $this->render('user');
    }

    public function  actionIndex(){
        return $this->render('index');
    }
}