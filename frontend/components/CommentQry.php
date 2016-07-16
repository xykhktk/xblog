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
        } else if($data['pid'] > 0 && !$this->commentExist($data['article_id'],$data['pid'])){
            $result = ['status' => 0,'msg' => '回复的评论不存在'];
        } else{
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
        $result = [];
        $comment =  ArticleComment::find()->where(['article_id' => $id ,'pid' => 0 ,'status' => 1])->offset($offset)->limit($limit)->asArray()->all();
        $commentId = [];
        foreach ($comment as $k=>$v){
            $result[$v['id']] = $v;
            $result[$v['id']]['child'] = '';
            $result[$v['id']]['date'] = date('Y-m-d H:i:s',$v['date']);
            $commentId[] = $v['id'];  //一级评论id
        }
        $childComment = ArticleComment::find()->where(['article_id' => $id,'status' => 1 ])->andWhere(['in' , 'pid' ,$commentId ])->asArray()->all();
        foreach ($childComment as $v) {
            $v['id'] = $v['pid'] ;
            $v['date']=  date('Y-m-d H:i:s',$v['date']);
            $result[$v['pid']]['child'][] = $v; //////////////////////
        }

        return $result;
    }

    /**
     * 主评论个数
     * @param $articleid
     * @return int|string
     */
    public function count($articleid){
        return ArticleComment::find()->where(['article_id' => $articleid ,'pid' => 0 ,'status' => 1])->count();
    }

    /**
     * 评论是否存在
     * @param $articleid
     * @param $pid
     */
    public function commentExist($articleid,$pid){
        return ArticleComment::find()->where(['id' => $pid , 'article_id'=> $articleid,'status' => 1])->count();
    }


}