<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionBlog()
    {
        $this->layout = 'blog.php';
        return $this->render('blog');
    }

    public function actionArticle()
    {
        return $this->render('article');
    }

}
