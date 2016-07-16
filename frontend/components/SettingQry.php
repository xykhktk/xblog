<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/16
 * Time: 23:03
 */

namespace frontend\components;

use frontend\components\BaseDb;
use common\models\Setting;

class SettingQry extends BaseDb
{

    public function getSetting(){
        //return Setting::find(1)->asArray();  /
        //注意： Setting::find(1) 找出来将是一个模型对象！！
        return Setting::find()->where(['id' => 1])->asArray()->one();
        //如果没有one，也会是某一种对象
    }

}