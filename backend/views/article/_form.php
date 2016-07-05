<?php
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\Category;
use yii\web\JsExpression;
use xj\uploadify\Uploadify;
use backend\assets\AppAsset;

AppAsset::register($this);
$this->registerJsFile('/xblog/backend/web/statics/js/bootstrap.js',[ 'depends'=> 'backend\assets\AppAsset']);

?>
<div class="inner-container">
    <?=Html::beginForm('' , 'post' , ['enctype' => 'multipart/form-data' , 'class' => '' , 'id' =>'addForm' ])?>
    <div class="form-group">
        <?=Html::label('名称*：' , 'title' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeInput('text' , $model , 'title' , ['class' => 'form-control input span6'])?>
            <?=Html::error($model , 'title')?>
        </div>
    </div>

    <div class="form-group">
        <?=Html::label('分类：' , 'cid' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeDropDownList($model , 'cid' , [ 0 => 'all'] , ['class' => 'form-control width_auto span6'])?>
            <?=Html::error($model , 'cid')?>
        </div>
    </div>

    <div class="form-group">
        <?=Html::label('图片：' , 'image' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <img src="<?=Url::base().'/statics/image/logo_azteca.jpg'?>" alt="pic" height=20px />
            <?php
            echo Html::fileInput('test', NULL, ['id' => 'test']);
            echo Uploadify::widget([
                'url' => \yii\helpers\Url::to(['s-upload']),
                'id' => 'test',
                'csrf' => true,
                'renderTag' => false,
                'jsOptions' => [
                    'width' => 120,
                    'height' => 40,
                    'onUploadError' => new JsExpression(<<<EOF
                function(file, errorCode, errorMsg, errorString) {
                    console.log('The file ' + file.name + ' could not be uploaded: ' + errorString + errorCode + errorMsg);
                }
EOF
                    ),
                    'onUploadSuccess' => new JsExpression(<<<EOF
                function(file, data, response) {
                    data = JSON.parse(data);
                    if (data.error) {
                        console.log(data.msg);
                    } else {
                        console.log(data.fileUrl);
                    }
                }
EOF
                    ),
                ]
            ]);
            ?>

            <?=Html::error($model , 'image')?>
        </div>
    </div>

    <div class="form-group">
        <?=Html::label('描述：' , 'description' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeTextarea($model , 'description' , ['class' => 'form-control width_auto span6'])?>
            <?=Html::error($model , 'description')?>
        </div>
    </div>


    <div class="form-group">
        <?=Html::label('作者：' , 'author' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeInput('text' , $model , 'author' , ['class' => 'form-control input span6'])?>
            <?=Html::error($model , 'author')?>
        </div>
    </div>

    <div class="form-group">
        <?=Html::label('浏览次数：' , 'count' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeInput('text' , $model , 'count' , ['class' => 'form-control input span6'])?>
            <?=Html::error($model , 'count')?>
        </div>
    </div>

    <div class="form-group">
        <?=Html::label('顶：' , 'up' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeInput('text' , $model , 'up' , ['class' => 'form-control input span6'])?>
            <?=Html::error($model , 'up')?>
        </div>
    </div>

    <div class="form-group">
        <?=Html::label('踩：' , 'down' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeInput('text' , $model , 'down' , ['class' => 'form-control input span6'])?>
            <?=Html::error($model , 'down')?>
        </div>
    </div>

    <div class="form-group">
        <?=Html::label('排序：' , 'sort_order' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeInput('text' , $model , 'sort_order' , ['class' => 'form-control input span6'])?>
            <?=Html::error($model , 'sort_order')?>
        </div>
    </div>

    <div class="form-group">
        <?=Html::label('状态：' , 'status' , ['class' =>'control-label col-sm-2 col-md-1'])?>
        <div class="controls col-sm-10 col-md-11">
            <?=Html::activeDropDownList($model , 'status' , [1 => '开启' , 0 => '禁用'] , ['class' => 'form-control width_auto span6'])?>
            <?=Html::error($model , 'status')?>
        </div>
    </div>

    <div class="form-group">
        <?=Html::label('内容：' , 'content' , ['class' =>'control-label col-sm-2 col-md-1'])?>
            <?= \cliff363825\kindeditor\KindEditorWidget::widget([
               /* 'name' => '内容',*/
                'model' => $model,
                'attribute' => 'content',
                'options' => ['content'], // html attributes
                'clientOptions' => [
                    'width' => '100%',
                    'height' => '350px',
                    'themeType' => 'default', // optional: default, simple, qq
                    'langType' =>  'zh-CN', // optional: ar, en, ko, ru, zh-CN, zh-TW
                    'uploadJson' => Url::to(['upload'])
                ],
            ]); ?>
            <?=Html::error($model , 'content')?>
    </div>
</div>

    <div class="form-group">
        <div style="margin-top:10px" class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1">
            <button class="btn btn-primary" type="submit">提交</button>
            <a class="btn btn-primary green" href="<?=Url::to(['index'])?>">返回</a>
        </div>
    </div>
    <?=Html::endForm();?>
</div>
