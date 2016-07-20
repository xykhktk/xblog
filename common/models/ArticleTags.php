<?php
/**
 * Created by PhpStorm.
 * User: biaoge
 * Date: 2016/7/20
 * Time: 18:04
 */

namespace common\models;

use yii\db\ActiveRecord;

class ArticleTags extends ActiveRecord
{
    public static function tableName(){
        return '{{%article_tags}}';
    }

    /**
     * 根据文章id和一个tags数组更新。无论文章新增、删除tag都用这个
     * @param int $actileid
     * @param $tags
     */
    public function updateTag($actileid = 0,$tags = []){
        if($actileid!=0){
            ArticleTags::deleteAll(['aid' => $actileid]);
            foreach($tags as $k=>$v){
                $model = new ArticleTags();
                $model->aid = $actileid;
                $model->tid = $v;
                $model->save();
            }
        }
    }
}