<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login form-vertical login-form">
    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <p>请输入用户名和密码</p>

    <!--<div class="row">
        <div class="col-lg-5">-->
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

               <!-- <label class="control-label visible-ie8 visible-ie9">用户名</label>-->
                <?= $form->field($model, 'username',[
                    'inputOptions' =>  ['class' => 'm-wrap placeholder-no-fix','placeholder' => '用户名'], //inputOptions 区分大小写.这是本身input框的class
                    'inputTemplate' => '<div class="control-group"><div class="controls"><div class="input-icon left"><i class="icon-user"></i>{input}</div></div></div>',
                ])->label(false)->textInput(['autofocus' => true]) ?>


            <?= $form->field($model, 'password',[
                'inputOptions' => ['class' => 'm-wrap placeholder-no-fix','placeholder' => '密码'],   //参考class，加了个placeholder，果然可以....
                'inputTemplate' => '<div class="control-group"> <div class="controls"><div class="input-icon left"><i class="icon-lock"></i>{input}</div></div></div>'
            ])->label(false)->passwordInput() ?>
                <!--label(false),如果没有设置这个，ActiveForm会自动加上一个lable-->

                <!--<div class="control-group">
                    <label class="control-label visible-ie8 visible-ie9">密码</label>
                    <div class="controls">
                        <div class="input-icon left">
                            <i class="icon-lock"></i>
                           <input class="m-wrap placeholder-no-fix" placeholder="密码" name="password" type="password">
                            <div class="m-wrap placeholder-no-fix">

                            </div>
                        </div>
                    </div>
                </div>-->

                <div class="form-actions">
                    <label class="checkbox">
                        <?= $form->field($model, 'remember')->checkbox() ?>
                    </label>
                     <?= Html::submitButton('登录', ['class' => 'btn btn-primary green pull-right', 'name' => 'login-button']) ?>
                    <!--<i class="m-icon-swapright m-icon-white"></i>-->
                </div>

            <?php ActiveForm::end(); ?>
        <!--</div>
    </div>-->
</div>
