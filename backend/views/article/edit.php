<?php
use yii\widgets\Breadcrumbs;
?>
<?=Breadcrumbs::widget([
    'homeLink' => ['label' => '首页'],
    'links' => [
        ['label' => '文章' ,'url' => ''],
        '文章编辑'
    ]
   ]
)?>

<?= $this->render('_form',['model' => $model , 'category' =>$category ,'tags'=>$tags ]) ?>