<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'statics/css/site.css',
        //'statics/css/Font-Awesome/css/font-awesome.min.css',
    ];
    public $js = [
        /*'statics/js/test.js',*/
    ];
    public $depends = [ //这是继承Bootstrap.css之类的文件
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
