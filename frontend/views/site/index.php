<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="container">

    <link rel="stylesheet" href="css/article.css" />
    <div class="container">
        <div class="row">
            <div class="col-md-9" >
                <div class="content">
                    <article class="thread thread-card  article-nav" style="padding: 5px 10px;">
                        <a href="<?=Url::base(true)?>">首页</a>
                    </article>
                    <?php  foreach ($article as $a){
                        $date = explode('-',date(('Y-m-d'), $a['update_date']));
                        ?>
                    <article class="thread thread-card">
                        <header>
                            <div class="time-label">
                                <span class="year"><?=$date['0']?></span>
                                <span style="display:block"><?=$date['1']?></span>
                                <span style="display:block"><?=$date['2']?></span>
                            </div>
                            <h3 class="thread-title">
                                <a href="/site/article.html?id=29"><?=$a['title']?></a>
                            </h3>
                            <div class="thread-meta">
                                <?=$a['author']?>&nbsp;
                                <ul class="blog-category">
                                    <li>分类：&nbsp;<?= isset($categroy[$a['cid']])?$categroy[$a['cid']]['name']:'无'?>&nbsp;&nbsp;&nbsp;</li>
                                    <li>浏览次数：<?=$a['count']?></li>
                                </ul>
                            </div>
                        </header>
                        <div class="clearfix"></div>
                        <div class="markdown-body">
                            <?=$a['description']?>
                        </div>
                        <div class="thread-footer">
                            <a href="<?=Url::to(['article','id'=>$a['id']])?>" class="ds-thread-bevel">阅读原文</a>
                        </div>
                    </article>
                     <?php } ?>
                    <!-- 分页数据  -->

                    <div class="pagination">
                        <?= \yii\widgets\LinkPager::widget([
                            'pagination' => $pagination,
                            'options' => ['class' => '']
                        ]);
                        ?>
                    </div>
                </div>

            </div>
            <aside class="col-md-3 sidebar">
                <section class="visitor card">
                    <div class="top">
                        <div class="user-avatar">
                            <a href="javascript:;" class="avatar avatar-50">
                                <img alt="Smister" src="http://www.smister.com/mrs.jpg">
                            </a>
                        </div>
                        <h4 class="name">Gkanon</h4>
                        <a href="javascript:;">一步一脚印 ，贵在坚持..</a>
                    </div>
                </section>
                <section class="card">
                    <h4>分类</h4>
                    <ul>
                        <?php foreach ($categroy as $cid=>$i) {   ?>
                            <li>
                                <a href="<?=(($cid==0)?(Url::base(true)):(Url::to(['article','id'=>$cid]))); ?>" > <?=$i['labelname']?> </a>
                            </li>
                        <?php }  ?>

                    </ul>
                </section>

                <section class="card">
                    <h4>热门文章</h4>
                    <ul>
                        <li style="overflow:hidden;white-space: nowrap;text-overflow: ellipsis;">
                            <a href="/site/article.html?id=9">Coreseek(中文分词的Sphinx)分词搜索配置及其设置增量索引</a>
                        </li>
                        <li style="overflow:hidden;white-space: nowrap;text-overflow: ellipsis;">
                            <a href="/site/article.html?id=17">分析Nginx访问日志及写入数据库</a>
                        </li>
                        <li style="overflow:hidden;white-space: nowrap;text-overflow: ellipsis;">
                            <a href="/site/article.html?id=21">Linux配置MongoDB</a>
                        </li>
                    </ul>
                </section>
            </aside>
        </div>
    </div>
</div>
