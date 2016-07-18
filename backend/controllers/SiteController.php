<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
        public function actions()
        {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ],
            ];
        }

    public function actionIndex()
    {
        $msg = 'main page';
        return $this->render('index',['msg' => $msg]);
    }

    public function actionLogin()
    {
        $this->layout = 'login.php';

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }

        /*$model = new LoginForm();

        $username = Yii::$app->request->post('username');
        $password =  Yii::$app->request->post('password_hash');
        print_r($username);print_r($password);print_r("out");

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->login()){
            return $this->redirect('index');
        }
        return $this->render('login',['model' => $model]);*/
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        $session = Yii::$app->session;
        $session->remove('backend_admin_username');
        $session->destroy();
        return $this->goHome();

        /*$model = new LoginForm();
        $model->logout();
        return $this->redirect('index');*/

    }
}
