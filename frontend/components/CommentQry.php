<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/16
 * Time: 0:02
 */

namespace frontend\components;

use frontend\components\BaseDb;
use frontend\components\ArticleQry;
use common\models\ArticleComment;

class CommentQry extends BaseDb
{

    public function add($data)
    {
        $result = ['status' => 0,'msg' => '非法操作'];
        if (!ArticleQry::getInstance()->articileExist($data['article_id'])){
            return $result;
        }elseif(empty($data['name']) || mb_strlen($data['name'],'utf-8') > 20){
            $result = ['status' => 0,'msg' => '名称不能为空并且在20位以内'];
            //return $result;
        }elseif(empty($data['content']) || mb_strlen($data['content'],'utf-8') > 200){
            $result = ['status' => 0,'msg' => '评论内容不能为空并且不能大于200。'];
            //return $result;
        }else{
            $data['123'] = '123';
            $comment = new ArticleComment();
            $comment->setAttributes($data); //setAttribute 和 setAttributes 。分2种设置方式。
            if($comment->save()){
                $result = ['status' => 1,'msg' => '评论发表成功'];
            }else{
                $result = ['status' => 1,'msg' => '评论出错。'];
            }
        }
        return $result;
    }

    /**
     * @param $id 文章的id
     * @param int $offset
     * @param int $limit
     */
    public function articleCommentlist($id,$offset = 0,$limit = 10){
        $comment =  ArticleComment::find()->where(['article_id' => $id ])->offset($offset)->limit($limit)->asArray()->all();
        foreach ($comment as $k=>$v){
            $comment[$k]['date'] = date('Y-m-d H:i:s',$v['date']);
        }
        return $comment;
    }

    /**
     * 主评论个数
     * @param $articleid
     * @return int|string
     */
    public function count($articleid){
        return ArticleComment::find()->where(['article_id' => $articleid ,'pid' => 0 ,'status' => 1])->count();
    }


}