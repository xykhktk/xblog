<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/4
 * Time: 21:35
 */
use yii\db\ActiveRecord;
class Article extends  ActiveRecord
{

    public static function tableName(){
        return '{{%article}}';
    }

}