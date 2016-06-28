<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
?>
<?=Breadcrumbs::widget([
    'homeLink' => ['label' => '后台管理'],
    'links' => [
        ['label' => '文章分类列表','url' => ['index']],
        '添加文章分类'
    ]
])
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

