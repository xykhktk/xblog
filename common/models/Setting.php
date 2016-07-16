<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/16
 * Time: 20:55
 */

namespace common\models;

use yii\db\ActiveRecord;

class Setting extends ActiveRecord
{
    public static function tableName(){
        return "{{%setting}}";
    }

    public function rules(){
        return [
            [['name','keyword','description','copyright'],'required'],
            //['name','string','max' => '100','tooLong','message','网站名称不能大于100'],
            ['name','string','max' => '100','tooLong'=> '网站名称不能大于100'],
            [['keyword','description','copyright'],'string','max' => '255','tooLong'=> '不能大于255']
        ];
    }

}