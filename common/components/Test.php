<?php

namespace  common\components;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/7
 * Time: 23:37
 */
use yii\base\Component;

class Test extends  Component       //配置文件在common\config\main.php
{
    public $name;
    public $favor;
    private $test;

    public function test(){
        echo 'in test component';
    }

    public function print_r(){
        echo $this->name . '=== ' . $this->favor;
    }

    public function print_private(){    //私有变量不能这样访问
        echo $this->test;
    }

    public function setTest($value){    //私有变量访问的正确方式
        $this->test = 'add_'.$value;
    }
    public function getTest(){
        return $this->test;
    }

}