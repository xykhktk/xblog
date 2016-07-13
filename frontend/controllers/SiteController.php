<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\components\CategroyQry;
use frontend\components\ArticleQry;
use yii\data\Pagination;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
       /* \frontend\components\ArticleQry::getInstance()->getA();
        \frontend\components\ArticleQry::getInstance()->getA();
        \frontend\components\ArticleQry::getInstance()->getA(); 测试单例，应该是3个相同的数字？ */
        //\frontend\components\CategroyQry::getInstance()->getCategroys();
        //print_r(CategroyQry::getInstance()->getCategroys());
        //print_r(ArticleQry::getInstance()->count());
        //print_r(ArticleQry::getInstance()->getArticles());
        $pagination = new Pagination(['totalCount' => ArticleQry::getInstance()->count() , 'pageSize' => 1]);
        $article = ArticleQry::getInstance()->getArticles(0,$pagination->offset,$pagination->limit);
        print_r($article);
        return $this->render('index',[
            'categroy' => CategroyQry::getInstance()->getCategroys(),
            'pagination' => $pagination,
            'article' => $article,
        ]);
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
