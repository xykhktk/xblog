<?php
/**
 * Created by PhpStorm.
 * User: biaoge
 * Date: 2016/7/20
 * Time: 10:57
 */

namespace common\models;

use yii\db\ActiveRecord;

class Tags extends ActiveRecord
{

    public static function tableName(){
        return '{{%tags}}';
    }

    public function rules(){
        return [
            ['tagname','required','message'=>'标签名不能为空'],
            ['tagname','string','max'=>20,'tooLong'=>'长度不能大于20']
        ];
    }

    public static function deleteIn($selected){
        return self::deleteAll(['id' => $selected]);
    }

}