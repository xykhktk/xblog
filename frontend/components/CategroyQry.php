<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/13
 * Time: 21:49
 */

namespace frontend\components;

use frontend\components\BaseDb;
use common\models\Category;

class CategroyQry extends BaseDb
{
    public function getCategroys(){
        $result = [
            0 => [
                'id' => 0,
                'name' => '全部',
                'labelname' => '全部',
                'pid' => -1
            ]
        ];

        $categroy =  Category::getAllCategorys();
        //print_r($cate);
        foreach ($categroy as $cat){
            $result[$cat['id']] =  [
                'id' => $cat['id'],
                'name' => $cat['name'],
                'labelname' => $cat['name'],
                'pid' => $cat['pid']
            ];
            foreach ($cat['child'] as $item) {
                $result[$item['id']] = [
                    'id' =>   $item['id'],
                    'name' =>  $item['name'],
                    'labelname' => '&nbsp&nbsp'.$item['name'],
                     'pid' => $item['pid']
                ];
            }
        }
        return $result;

    }
}