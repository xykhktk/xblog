<?php
/**
 * Created by PhpStorm.
 * User: biaoge
 * Date: 2016/7/11
 * Time: 17:31
 */

namespace backend\models;

use common\models\Admin;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $remember;

    private $user;
    const BACKEND_ADMIN_ID = 'backend_admin_id';
    const BACKEND_ADMIN_USERNAME = 'backend_admin_username';
    const BACKEND_ADMIN_COOKIE = 'backend_admin_cookie';

    public function rules(){
        return [
            ['username','validateAccount','skipOnEmpty'=>false],
            [['password','remember'] , 'safe']
        ];
    }

    public function validateAccount($attribute,$params){
        if(preg_match('/^\w{2,30}$/',$this->$attribute)){
            $this->addError($attribute,"账号或密码错误");
        }else if(strlen($attribute) < 6){
            $this->addError($attribute,"账号或密码错误");
        }else{
            $user = Admin::find()->where(['username' => $this->attributes])->asArray()->one();
            if(!isset($user) || md5($this->password) != $user['password']){
                $this->addError($attribute,"账号或密码错误");
            }else{
                $this->user = $user;
            }
        }
    }

    private function updateUserStatus(){
        if(isset($this->user)){
            $user = Admin::findOne(['id' => $this->user['id']]);//findOne不接where？
            $user->updated_at = time();
            return $user->save();
        }
    }

    public function login(){
        
    }



}