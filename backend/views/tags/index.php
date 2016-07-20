<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\common\LinkPages;
use yii\widgets\Breadcrumbs;
?>
<?=Breadcrumbs::widget([
    'homeLink' => ['label' => '后台管理>>'],
    'links' => [
        ['label' => '标签设置','template' => '<li>{link}</li>']
    ]
])
?>
<div class="inner-container">

    <div style="width: 60%">
    <?=Html::beginForm('delete' , 'post' , ['class' => '' , 'id' =>'addForm' ])?>
        <?php
        $index = 0;
        foreach ($tags as $tag){
            $index = $index + 1 ;?>

            <span style="display: inline-block"><input type="checkbox" name="selected[]" value="<?= $tag['id']?>" /><?= $tag['tagname']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

        <?php } ?>

        <div class="form-group">
                <div style="margin-top:10px" class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1">
                    <button class="btn btn-primary" type="submit">删除标签</button>
                </div>
            </div>
    <?=Html::endForm();?>
    <div>

    </br></br></br>
    <?=Html::beginForm('add' , 'post' , ['class' => '' , 'id' =>'addForm' ])?>
    <div class="form-group" >
        <?=Html::label('添加标签：' , '' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeInput('text' , $newTag , 'tagname' , ['class' => 'form-control input span6' ])?>
            <?=Html::error($newTag , 'name')?>
        </div>
    </div>
    <div class="form-group">
        <div style="margin-top:10px" class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1">
            <button class="btn btn-primary" type="submit">添加标签</button>
        </div>
    </div>
    <?=Html::endForm();?>


</div>