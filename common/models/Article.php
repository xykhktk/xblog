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

}