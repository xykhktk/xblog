<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

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
        //'css/site.css',
        'statics/css/media/bootstrap.min.css',
        'statics/css/media/bootstrap-responsive.min.css',
        'statics/css/media/font-awesome.min.css',
        'statics/css/media/style-metro.css',
        'statics/css/media/style.css',
        'statics/css/media/style-responsive.css',
        'statics/css/media/default.css',
        'statics/css/media/uniform.default.css',
        'statics/css/site.css',
    ];
    public $js = [
        /*'statics/js/jquery-1.10.1.min.js',*/
        'statics/js/jquery-migrate-1.2.1.min.js',
        'statics/js/jquery-ui-1.10.1.custom.min.js',
        'statics/js/bootstrap.min.js',
        'statics/js/jquery.slimscroll.min.js',
        'statics/js/jquery.blockui.min.js',
        'statics/js/jquery.cookie.min.js',
        'statics/js/jquery.uniform.min.js',
        'statics/js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];

    //定义按需加载JS方法，注意加载顺序在最后
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }

    //定义按需加载css方法，注意加载顺序在最后
    public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }
}
