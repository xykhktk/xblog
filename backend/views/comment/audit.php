<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/17
 * Time: 20:56
 */
use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\common\LinkPages;
use yii\widgets\Breadcrumbs;

?>
<?=Breadcrumbs::widget([
    'homeLink' => ['label' => '后台管理-'],
    'links' => [
        ['label' => '评论审核','template' => '<li>{link}</li>']
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

    <?=Html::beginForm(['delete'] , 'post'  , ['id' => 'dltForm'])?>
    <table class="table table-hover">
        <thead>
        <tr>
            <!--<th class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked',this.checked);"></th>-->
            <th>标题</th>
            <th>内容</th>
            <th>所评文章</th>
            <th>发表时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($model as $value){?>
            <tr>
                <!--<td class="text-center"><input type="checkbox" name="selected[]" value="<?/*=$value['id']*/?>"></td>-->
                <td><?=$value['name']?></td>
                <td><?=$value['content']?></td>
                <td><?=$value['title']?></td>
                <td><?=date('Y-m-d H:i', $value['date'])?></td>
                <td><a href="<?=Url::to(['passaudit' , 'id' => $value['id']])?>" title="编辑" class="data_op data_edit">通过审核</a> </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <?=Html::endForm();?>
    <?=LinkPages:: widget(['pagination' => $pagination]);?>
</div>
