<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repassword;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required','message'=>'必须填写用户名'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '用户名已经存在.'],
            ['username', 'match','pattern'=>'/^[(\x{4E00}-\x{9FA5})a-zA-Z]+[(\x{4E00}-\x{9FA5})a-zA-Z_\d]*$/u','message'=>'用户名由字母，汉字，数字，下划线组成，且不能以数字和下划线开头。'],
            ['username', 'string', 'min' => 6, 'max' => 16],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required','message'=>'必须填写邮箱'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => '邮箱已经存在.'],

            [['password','repassword'], 'required','message'=>'密码不能为空'],
            [['password','repassword'], 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password','message'=>'两次输入的密码不一致！'],

           //['verificationCode', 'captcha'],注意，这里是从yii-china抄来的，但是不正确，应该是下面一行
           ['verifyCode', 'captcha'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }

    public  function  attributeLabels()
    {
        return [
             'username' => '用户名',
             'email' => '邮箱',
             'password' => '密码',
             'repassword' => '重复密码',
             'verifyCode' => '验证码',
        ];
    }

}
