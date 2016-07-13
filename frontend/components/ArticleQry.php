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

}