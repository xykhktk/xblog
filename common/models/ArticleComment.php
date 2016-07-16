<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/15
 * Time: 23:57
 */

namespace common\models;

use yii\db\ActiveRecord;

class ArticleComment extends  ActiveRecord
{

    public static function tableName(){
        return '{{%article_comment}}';
    }

    public function rules(){
        return [
            [['name','id','article_id','pid','content'] ,'safe']        //这里没加上content，会导致content保存不成功
        ];
    }

    public function beforeSave($insert){
        if(parent::beforeSave($insert)){
            $this->date = time();
            return true;
        }
        return false;
    }

}