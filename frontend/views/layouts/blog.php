<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/10
 * Time: 20:35
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\web\View;

AppAsset::register($this);


//$this->registerJsFile('/xblog/backend/web/statics/js/bootstrap.js',[ 'depends'=> 'backend\assets\AppAsset']);
//$this->registerCssFile('/xblog/frontend/web/statics/css/bootstrap-responsive.min.css');
//$this->registerCssFile('/xblog/frontend/web/statics/css/blog.css');

$this->registerJs('jQuery(document).ready(function() {    
		   App.init();
		});',View::POS_END);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'xblog',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItemsLeft = [      //分开命名
        ['label' => '首页', 'url' => ['/site/index']],
        ['label' => '关于', 'url' => ['/site/about']],
        ['label' => '联系我', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItemsRight[] = ['label' => '注册', 'url' => ['/site/signup']];
        $menuItemsRight[] = ['label' => '登录', 'url' => ['/site/login']];
    } else {
        $menuItemsRight[] = [
            'label' => Yii::$app->user->identity->username,
            'items' => [    //注意s
                ['label' =>'<i class="icon-signout"></i>退出' ,'url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post'] ]
            ]
        ];
    }
    echo Nav::widget([  //echo分为2个，也就是左边、右边分开输出
        'options' => ['class' => 'navbar-nav navbar-left'], //navbar-right改为navbar-left，这个可能是bootstrap的一个样式
        'encodeLabels' => false,
        'items' => $menuItemsLeft,
    ]);
    echo Nav::widget([  //增加这一个，作为右边的输出
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItemsRight,
    ]);
    NavBar::end();
    ?>

    <div class="">
        <?= $content ?>
    </div>
</div>



<?/*= $content */?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
