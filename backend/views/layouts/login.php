<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/11
 * Time: 21:08
 */
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
//$this->registerCssFile('/xblog/backend/web/statics/css/media/login-soft.css',['depends' =>'backend\assets\AppAsset']);
//$this->registerCssFile('/xblog/backend/web/statics/css/media/login-soft.css');
$this->registerCssFile('/xblog/backend/web/statics/css/media/login.css');
$this->registerJs('jQuery(document).ready(function() { App.init();});',View::POS_END);
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
<body class="login">
<?php $this->beginBody() ?>

<!-- BEGIN LOGO -->
<div class="logo">

    <img src="media/image/logo-big.png" alt="">

</div>
<!-- END LOGO -->

<!-- BEGIN LOGIN -->
<div class="content">

    <!-- BEGIN LOGIN FORM -->

        <h3 class="form-title">Xblog 后台管理</h3>

        <div class="alert alert-error hide">

            <button class="close" data-dismiss="alert"></button>

            <span>Enter any username and password.</span>

        </div>

        <?= $content ?>

        <!--<div class="forget-password">

            <h4>忘记密码?</h4>
            <p>
                点击 <a href="javascript:;" class="" id="forget-password">这里</a>
                以重置密码.
            </p>

        </div>

        <div class="create-account">

            <p>
                还没有注册 ?&nbsp;
                <a href="javascript:;" id="register-btn" class="">创建一个帐号</a>
            </p>

        </div>-->


</div>
<!-- END LOGIN -->

<!-- BEGIN COPYRIGHT -->
<div class="copyright">

    2013 © Metronic - Admin Dashboard Template.

</div>
<!-- END COPYRIGHT -->


<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>
