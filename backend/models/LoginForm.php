<?php
namespace backend\models;

use common\models\Admin;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;
    const BACKEND_ADMIN_ID = 'backend_admin_id';
    const BACKEND_ADMIN_USERNAME = 'backend_admin_username';
    const BACKEND_ADMIN_COOKIE = 'backend_admin_cookie';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '用户名或密码错误');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * 
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Admin::findByUsername($this->username);
        }

        return $this->_user;
    }

    /**
     *
     */
    public function loginByCookie(){
        $cookie = Yii::$app->request->cookies;
        if($cookie->has(self::BACKEND_ADMIN_COOKIE)){
            $cookiedata = $cookie->getValue(self::BACKEND_ADMIN_COOKIE);
            if(isset($cookiedata['id']) && isset($cookiedata['username'])){
                $this->user = Admin::find()->where(['username' => $cookiedata['username'] , 'id' => $cookiedata['id']])->asArray()->one();
                if ($this->user){
                    
                }
            }
        }

    }


}
