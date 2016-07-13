<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/13
 * Time: 21:36
 */
namespace  frontend\components;

abstract class BaseDb
{

    public static $instance;
    public static function getInstance(){
        $class = get_called_class();
        if(!isset(self::$instance[$class])){
            self::$instance[$class] = new $class;
        }
        return self::$instance[$class];
    }

}