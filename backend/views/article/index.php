<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\common\LinkPages;
use yii\widgets\Breadcrumbs;
use common\models\Category;
use backend\assets\AppAsset;

AppAsset::register($this);
$this->registerJsFile('@web/statics/js/index-list.js',['depends' => 'yii\web\JqueryAsset']);
//自己写的js，用于删除时的响应
$categorys = Category::getParent(); //注意模型的静态可以在页面中使用
?>
<?=Breadcrumbs::widget([
    'homeLink' => ['label' => '后台管理-'],
    'links' => [
        ['label' => '文章列表','template' => '<li>{link}</li>']
    ]
])
?>
<div class="inner-container">
    <?php if(Yii::$app->session->hasFlash('success')){?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?=Yii::$app->session->getFlash('success')?>
        </div>
    <?php }?>
    <?php if(Yii::$app->session->hasFlash('error')){?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?=Yii::$app->session->getFlash('error')?>
        </div>
    <?php }?>
    <p class="text-right">
        <a class="btn btn-primary btn-middle" href="<?=Url::to(['add'])?>">添加</a>
        <a id="delete-btn" class="btn btn-primary btn-middle" >删除</a>
    </p>
    <?=Html::beginForm(['delete'] , 'post'  , ['id' => 'dltForm'])?>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked',this.checked);"></th>
            <th>标题</th>
            <th>分类</th>
            <th>排序</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($result as $value){?>
            <tr>
                <td class="text-center"><input type="checkbox" name="selected[]" value="<?=$value['id']?>"></td>
                <td><?=$value['title']?></td>
                <!--<td><?/*=isset($categorys[$value['cid']]) ? $categorys[$value['cid']]['name'] : '无';*/?></td>-->
                <td><?=$value['name']?></td>
                <td><?=$value['sort_order']?></td>
                <td><?=$value['status'] == 1 ? '开启' : '禁用';?></td>
                <td><a href="<?=Url::to(['edit' , 'id' => $value['id']])?>" title="编辑" class="data_op data_edit">编辑</a> | <a href="javascript:void(0);" title="删除" class="data_op data_delete">删除</a></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <?=Html::endForm();?>
    <?=LinkPages:: widget(['pagination' => $pagination]);?>
</div>
