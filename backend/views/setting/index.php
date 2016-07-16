<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\common\LinkPages;
use yii\widgets\Breadcrumbs;
/*use backend\assets\AppAsset;

AppAsset::register($this);
$this->registerJsFile('@web/statics/js/index-list.js',['depends' => 'yii\web\JqueryAsset']);*/
//自己写的js，用于删除时的响应
?>
<?=Breadcrumbs::widget([
    'homeLink' => ['label' => '后台管理>>'],
    'links' => [
        ['label' => '网站设置','template' => '<li>{link}</li>']
    ]
])
?>
<div class="inner-container">
    <?=Html::beginForm('' , 'post' , ['enctype' => 'multipart/form-data' , 'class' => '' , 'id' =>'addForm' ])?>

    <div class="form-group" >
        <?=Html::label('博客名称*：' , 'name' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeInput('text' , $model , 'name' , ['class' => 'form-control input span6' ,'value' => $currentSetting['name']])?>
            <?=Html::error($model , 'name')?>
        </div>
    </div>

    <div class="form-group" >
        <?=Html::label('关键字：' , 'keyword' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeInput('text' , $model , 'keyword' , ['class' => 'form-control input span6' ,'value' => $currentSetting['keyword']])?>
            <?=Html::error($model , 'keyword')?>
        </div>
    </div>

    <div class="form-group" >
        <?=Html::label('描述：' , 'description' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeInput('text' , $model , 'description' , ['class' => 'form-control input span6','value' => $currentSetting['description']])?>
            <?=Html::error($model , 'description')?>
        </div>
    </div>

    <div class="form-group" >
        <?=Html::label('版权：' , 'copyright' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeInput('text' , $model , 'copyright' , ['class' => 'form-control input span6','value' => $currentSetting['copyright']])?>
            <?=Html::error($model , 'copyright')?>
        </div>
    </div>

    <div class="form-group">
        <div style="margin-top:10px" class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1">
            <button class="btn btn-primary" type="submit">修改</button>
        </div>
    </div>

    <?=Html::endForm();?>
</div>
