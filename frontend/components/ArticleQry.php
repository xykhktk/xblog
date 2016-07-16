<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/13
 * Time: 21:41
 */

namespace frontend\components;

use frontend\components\BaseDb;
use common\models\Article;
use Yii;
use yii\web\Cookie;

class ArticleQry extends BaseDb
{
   /* private  $a;  //测试单例
    public function __construct(){
        $this->a = mt_rand(111,999);
    }

    public function getA(){
        echo $this->a.'<br/>';
    }*/

    public function count($cid = 0){
        $where = [];
        if($cid > 0){
            $where = ['cid' => $cid];
        }
        return Article::find()->where(['status' => 1])->andWhere($where)->count();
    }

    /**
     * @param int $cid  文章分类
     * @param int $offset
     * @param int $limit
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getArticles($cid = 0,$offset = 0,$limit = 10){
        $condition = [];
        if($cid > 0){
            $condition = ['cid' => $cid];
        }
        return Article::find()->select('id,cid,title,description,author,count,update_date')
            ->where($condition)->andWhere(['status' => 1])->offset($offset)->limit($limit)->asArray()->all();
    }

    public function getHotArticle($limit = 10){
        return Article::find()->select('id,title')
            ->where(['status' => 1])->orderBy('up DESC')->limit($limit)->asArray()->all();
    }

    /**
     * 搜索文章前，用于先获取查询结果的数量。
     * @param $title
     * @return int|string
     */
    public function getLikeArticleCount($title){
        //return Article::find()->where('and',['status'=> 1])->andWhere(['like','title',$title])->count();
        return Article::find()->where(['status'=> 1])->andWhere(['like','title',$title])->count();
    }

    /**
     *搜索文章
     * @param $title
     * @param int $offset
     * @param int $limit
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getLikeArticle($title ,$offset = 0,$limit = 10 ){
        return Article::find()->select('id,cid,title,description,author,count,update_date')
            ->where(['status'=> 1])->andWhere(['like','title',$title])->limit($limit)->offset($offset)->asArray()->all();
    }

    public function getActicle($id){
        $sql = "select a.id ,a.title,a.description,a.image,a.author,a.count,a.up,a.update_date,a.cid,a.content,c.name AS  cname
                from {{%article}} a LEFT JOIN  {{%category}} c ON a.cid = c.id
                WHERE a.id=:id AND a.status = 1 LIMIT 1";
        return Article::findBySql($sql,[':id' => $id])->asArray()->one();
    }

    public function incrArticle($id){
        $sql = "UPDATE {{%article}} SET count = count + 1 WHERE  id=:id";
        return Yii::$app->db->createCommand($sql)->bindValue(':id' , $id)->execute();
    }

    public function upArticle($id){
        $result = ['status'=>false ,'msg' => '非法操作'];
        if(Article::find()->where(['id' => $id ,'status' => 1])->count() > 0){
            //cookie 控制点赞间隔
            $key = md5("article_up".Yii::$app->request->userIP.$id);
            if(!Yii::$app->request->cookies->has($key)){
                $c = new Cookie();
                $c->name = $key;
                $c->value = true;
                $c->expire = time() + 60 * 60 * 24 * 7;
                $c->httpOnly = true;
                Yii::$app->response->cookies->add($c);
                Yii::$app->response->send();    //！
                $sql = "UPDATE {{%article}} SET up = up + 1 WHERE  id=:id";
                if(Yii::$app->db->createCommand($sql)->bindValue(':id' , $id)->execute()){
                    $result = ['status'=>true ,'msg' => '点赞成功'];
                }else{
                    $result = ['status'=>false ,'msg' => '操作异常'];
                }
                return $result;
            }
            $result = ['status'=>false ,'msg' => '一周只能点赞一次'];
        }
        return $result;
    }

    /**
     * 是否存在
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     */
    public function articileExist($id){
        return Article::find()->where(['id' => $id,'status' => 1])->one();
    }

}