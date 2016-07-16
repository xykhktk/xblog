<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\components\CategroyQry;
use frontend\components\ArticleQry;
use yii\data\Pagination;
use frontend\components\CommentQry;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;   //接收ajax请求，需要关闭csrf

    public function actionIndex($cid = 0)
    {
       /* \frontend\components\ArticleQry::getInstance()->getA();
        \frontend\components\ArticleQry::getInstance()->getA();
        \frontend\components\ArticleQry::getInstance()->getA(); 测试单例，应该是3个相同的数字？ */
        //\frontend\components\CategroyQry::getInstance()->getCategroys();
        //print_r(CategroyQry::getInstance()->getCategroys());
        //print_r(ArticleQry::getInstance()->count());
        //print_r(ArticleQry::getInstance()->getArticles());
        print_r(ArticleQry::getInstance()->getHotArticle());
        $categroy = CategroyQry::getInstance()->getCategroys();
        $cid = (int)$cid;
        $currentCate = [];
        if($cid != 0 && !isset($categroy[$cid])){   //大于0却没有分类
            $cid = 0;
        }else{
            $currentCate = $categroy[$cid];
        }

        $pagination = new Pagination(['totalCount' => ArticleQry::getInstance()->count() , 'pageSize' => 10]);
        $article = ArticleQry::getInstance()->getArticles($cid,$pagination->offset,$pagination->limit);
        //print_r($article);
        return $this->render('index',[
            'categroy' => $categroy,
            'pagination' => $pagination,
            'article' => $article,
            'currentCate' => $currentCate,
            'hotArticle' => ArticleQry::getInstance()->getHotArticle()
        ]);
    }

    public function actionBlog()
    {
        $this->layout = 'blog.php';
        return $this->render('blog');
    }

    public function actionArticle($id = 0)
    {
        if($id > 0){
            $article = ArticleQry::getInstance()->getActicle($id);
            ArticleQry::getInstance()->incrArticle($id);
            return $this->render('article',[ 'article' => $article,]);
        }
        return $this->redirect(['site/index']);
    }

    public function actionSearch($search = '')
    {
        if(empty($search) || mb_strlen($search,'utf-8')> 255){
            return $this->redirect('site/index');
        }
        //print_r(ArticleQry::getInstance()->getLikeArticleCount($search));
        $count = ArticleQry::getInstance()->getLikeArticleCount($search);
        //print_r(ArticleQry::getInstance()->getLikeArticle($search));
        $article = ArticleQry::getInstance()->getLikeArticle($search);
        $pagination = new Pagination(['totalCount'=>$count,'pageSize'=> 10 ]);
        $categroy = CategroyQry::getInstance()->getCategroys();
        return $this->render('index',[
            'categroy' => $categroy,
            'article' => $article,
            'search' => $search,
            'pagination' => $pagination,
            'hotArticle' => ArticleQry::getInstance()->getHotArticle()
        ]);
        //return $this->render('article');
    }

    public function actionUp($id = 0)
    {
        if($id > 0 && Yii::$app->request->isAjax){
            $result = ArticleQry::getInstance()->upArticle($id);
            exit(json_encode($result)); //给js传参数？
            //return $this->render('article',[ 'article' => $article,]);
        }else{
        }
        return $this->redirect(['site/index']);
    }

    public function actionRecomment()
    {
        //echo '111123';  //在firefox下，在  网络  预览  中看
        //print_r('123');   //同上
        if(Yii::$app->request->isAjax){
            $data['name'] = Yii::$app->request->post('name','');
            $data['content'] = Yii::$app->request->post('content','');
            $data['article_id'] = Yii::$app->request->post('rid','');
            exit(json_encode(CommentQry::getInstance()->add($data)));    //前端js接收的方式
        }else{
            return $this->redirect(['site/index']);
        }

    }

}
