<?php
namespace frontend\controllers;

use common\models\Comment;
use Yii;
use yii\web\Controller;
use frontend\components\CategroyQry;
use frontend\components\ArticleQry;
use yii\data\Pagination;
use frontend\components\CommentQry;
use frontend\components\SettingQry;
use common\models\Tags;

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
        //print_r(ArticleQry::getInstance()->getHotArticle());
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
            'hotArticle' => ArticleQry::getInstance()->getHotArticle(),
            'tags' => Tags::find()->asArray()->all()
        ]);
    }

    public function actionBlog()
    {
        $this->layout = 'blog.php';
        return $this->render('blog');
    }

    public function init(){
        parent::init();
        $blogSetting = SettingQry::getInstance()->getSetting();
        //print_r($blogSetting);
        foreach ($blogSetting as $k=>$v) {
            Yii::$app->view->params[$k] = $v;       //给layout的传值方式
        }
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
        //echo '111123';  //在firefox下，在  网络->预览  中看
        //print_r('123');   //同上
        if(Yii::$app->request->isAjax){
            $data['name'] = Yii::$app->request->post('name','');
            $data['content'] = Yii::$app->request->post('content','');
            $data['article_id'] = Yii::$app->request->post('rid','');
            $data['pid'] = Yii::$app->request->post('comment_id',0);
            //var_dump($data);exit();
            exit(json_encode(CommentQry::getInstance()->add($data)));    //前端js接收的方式
        }else{
            return $this->redirect(['site/index']);
        }
    }

    /**
     * @param $id 文章的id
     * @param int $offset
     * @param int $limit
     */
    //public function actionRecommentlist($id,$offset = 0,$limit = 10){     如果指定了传参。但是又没有传，例如没传id
    //exception 'yii\web\BadRequestHttpException' with message 'Missing required parameters: id'
    public function actionRecommentlist(){
        $articleid = Yii::$app->request->get('article_id',0);   //??
        $commentCount = CommentQry::getInstance()->count($articleid);
        $pagination = new Pagination(['totalCount' => $commentCount,'pageSize' => 3]);
        $data =  CommentQry::getInstance()->articleCommentlist($articleid ,$pagination->offset,$pagination->limit);
        //print_r($data);

        $str =  \yii\widgets\LinkPager::widget([        //'pageSize' => 1  足够小，否则无法输出
            'pagination' => $pagination,                //然后在response可以看到html输出
            'options' =>[
                'class' =>  'yiiPager',         //这将是ul的class和id
                'id' => 'yw0'
            ]
        ]
        );

        //要把<li><a href="/xblog/frontend/web/index.php?r=site%2Frecommentlist&amp;page=2&amp;article_id=5&amp;per-page=1" data-page="1">2</a></li>
        //替换成<li><a onclick="ajaxData(2)" data-page="1">2</a></li>
        $str = preg_replace('/href="[^"]+page=(\d+)[^"]+"/','onclick="ajaxData(\1)"',$str);
        $str = str_replace('class="active"', 'class="selected"', $str);

        //echo $str;exit();
        exit(json_encode(['pagestr' => $str ,'data' => $data,'count' => $commentCount]));
    }


    public function actionAboutme()
    {
        return $this->render('aboutme');
    }

}
