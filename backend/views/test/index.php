<?php
use yii\helpers\Html;
use yii\web\JsExpression;
use xj\uploadify\Uploadify;
use backend\assets\AppAsset;

//外部TAG
AppAsset::register($this);
$this->registerJsFile('/xblog/backend/web/statics/js/bootstrap.js',[ 'depends'=> 'backend\assets\AppAsset']);

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

<?= \cliff363825\kindeditor\KindEditorWidget::widget([
    'name' => 'content',
    'options' => [], // html attributes
    'clientOptions' => [
        'width' => '680px',
        'height' => '350px',
        'themeType' => 'default', // optional: default, simple, qq
        'langType' => \cliff363825\kindeditor\KindEditorWidget::LANG_TYPE_ZH_CN, // optional: ar, en, ko, ru, zh-CN, zh-TW
    ],
]); ?>

