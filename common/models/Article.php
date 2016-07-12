<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/4
 * Time: 23:25
 */

namespace common\models;

use yii\db\ActiveRecord;

class Article extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%article}}';
    }

    public static function deleteIn($selected){
        return self::deleteAll(['id' => $selected]);
    }

    public function rules(){
        return [
            ['cid' ,'integer', 'min' => 1 ,'message' => '请选择合法分类' , 'tooSmall' =>  '请选择合法分类'],
            ['title' , 'required' , 'message' =>'标题不能为空'],
            ['title' , 'string' , 'max' => 200 ,'tooLong' => '标题长度不能超过200'],
            ['description' , 'string' , 'max' => 255 ,'tooLong' => '标题长度不能超过200'],
            ['content' ,'required','message'=>'内容不能为空'],
            ['image' , 'string' , 'max' => 255 ,'tooLong' => '图片路径过长'],
            ['author' , 'string' , 'max' => 30 ,'tooLong' => '作者名字不能超过30'],
            [['up','down','sort_order','count'],'integer','min' => 0 ,'message' => '请输入一个大于0的整数'],
            ['status','in','range'=>[0,1],'message'=>'非法操作']
        ];
    }

    public function beforeSave($insert){
        if(parent::beforeSave($insert)){
            $time = time();
            if($this->isNewRecord){
                $this->date = $time;
                $this->update_date = $time;
            }
            return true;
        }
        return false;
    }


}