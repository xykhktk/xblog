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
use Yii;

class LoginForm extends Model
{
    public $username;
    public $password_hash;
    public $remember;

    private $user;
    const BACKEND_ADMIN_ID = 'backend_admin_id';
    const BACKEND_ADMIN_USERNAME = 'backend_admin_username';
    const BACKEND_ADMIN_USERPASS = 'backend_admin_userpass';
    const BACKEND_ADMIN_COOKIE = 'backend_admin_cookie';

/*    public function rules(){
      return [
            ['username','validateAccount','skipOnEmpty'=>false],
            [['password_hash','remember'] , 'safe']
        ];
    }*/

    public function validateAccount($attribute,$params){
        /*if(!preg_match('/^\w{2,30}$/',$this->$attribute)){
            $this->addError($attribute,"账号或密码错误");
        }else if(strlen($attribute) < 3){
            $this->addError($attribute,"账号或密码错误");
        }else{
            $user = Admin::find()->where(['username' => $this->attributes])->asArray()->one();
            if(!isset($user) || md5($this->password_hash) != $user['password_hash']){
                $this->addError($attribute,"账号或密码错误");
            }else{
                $this->user = $user;
            }
        }*/
    }

    /**
     * 应该在一张表上记录登录时间和ip，先不用这个方法
     * @return bool
     */
    private function updateUserStatus(){
        if(isset($this->user)){
            $user = Admin::findOne(['id' => $this->user['id']]);//findOne不接where？
            $user->updated_at = time();
            return $user->save();
        }
    }


    public function login(){    //账户密码验证，在validateAccount 已经做了
        //if(!$this->user) return false;

        $username = Yii::$app->request->post('username');
        $password =  Yii::$app->request->post('password_hash');

        print_r($username);print_r($password);

        $user = Admin::find()->where(['username' => $username])->asArray()->one();
        if(!isset($user) || md5($password) != $user['password_hash']){
            print_r("111");
            return false;
        }


        $session = Yii::$app->session;
        $session->set(self::BACKEND_ADMIN_USERNAME,$username);
        //$session->set(self::BACKEND_ADMIN_USERPASS,$this->user['password_hash']);
        return true;
    }

    public function logout(){
        $session = Yii::$app->session;
        $session->remove(self::BACKEND_ADMIN_USERNAME);
        //$session->remove(self::BACKEND_ADMIN_USERNAME);
        $session->destroy();
        return true;
    }


}