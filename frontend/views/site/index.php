<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<style>
    .mya {
        background: #eee;
        padding: 1px 4px;
        margin: 0 4px 4px 0;
        display: inline-block;
        text-decoration: none;
        color: #555;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        text-shadow: none !important;
        -webkit-border-radius: 0 !important;
        -moz-border-radius: 0 !important;
        border-radius: 0 !important;
        text-decoration: none;
    }
    a, a:focus, a:hover, a:active {
        outline: 0;
    }

</style>
<div class="container">
    <link rel="stylesheet" href="css/article.css" />
    <div class="container">
        <div class="row">
            <div class="col-md-9" >
                <div class="content">
                    <article class="thread thread-card  article-nav" style="padding: 5px 10px;">
                        <a href="<?=Url::base(true)?>">首页</a>
                        <?php if(!empty($currentCate) && $currentCate['pid'] != -1) echo '&gt&gt'.$currentCate['name'];?>
                        <?php if(!empty($search) ) echo '&gt&gt'.$search;?>
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
                                <a href="<?=Url::to(['article','id'=>$a['id']])?>"><?=$a['title']?></a>
                            </h3>
                            <div class="thread-meta">
                               <!-- <?/*=$a['author']*/?>&nbsp;-->
                                分类：<?= isset($categroy[$a['cid']])?$categroy[$a['cid']]['name']:'无'?>&nbsp;&nbsp;&nbsp;
                                <?php if(count($a['tags']) > 0){ ?>
                                    标签：
                                    <?php foreach ($a['tags'] as $k=>$v){?>
                                    <a href="javascript:void(0)" class="btn-default" style="text-decoration:none;background-color: #eeeeee "><?= $v['tagname']?></a>
                                <?php  }
                                } ?>
                                &nbsp;&nbsp;&nbsp;浏览次数：<?=$a['count']?>
                                <!--<ul class="blog-category">
                                    <li>分类：<?/*= isset($categroy[$a['cid']])?$categroy[$a['cid']]['name']:'无'*/?>&nbsp;&nbsp;&nbsp;</li>
                                    <li>浏览次数：<?/*=$a['count']*/?></li>
                                </ul>-->
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

                <!--搜索-->
                <section class="visitor card">
                    <div class="input-group">
                        <input class="form-control" id="search-content" placeholder="站内搜索" type="text">
                        <span class="input-group-btn">
                            <button class="btn btn-default" id="searching" type="button">
                                <span class="glyphicon glyphicon-search" ></span>
                            </button>
                        </span>
                    </div>
                </section>

                <section class="visitor card">
                    <div class="top">
                        <div class="user-avatar">
                            <a href="javascript:;" class="avatar avatar-50">
                                <img alt="" src="<?=Url::base().'/images/BTNAvatar.jpg'?>">
                            </a>
                        </div>
                        <h4 class="name">Gkanon</h4>
                        <a href="javascript:;">才一级的MK？要多练级。</a>
                    </div>
                </section>
                <section class="card">
                    <h4>分类</h4>
                    <ul>
                        <?php foreach ($categroy as $cid=>$i) {
                            $url = '';
                            if($cid == 0){
                                $url = Url::base(true);
                            }else{
                                if($i['pid'] == 0){
                                    $url = 'javascript:void(0)';
                                }else{
                                    $url = Url::to(['index','cid'=>$cid]);
                                }
                            }
                            ?>
                            <li>
                                <a href="<?=$url?>" > <?=$i['labelname']?> </a>
                            </li>
                        <?php }  ?>

                    </ul>
                </section>

                <section class="card">
                    <h4>标签</h4>
                    <div class="" style="link{text-decoration:none;}">
                        <?php foreach ($tags as $tag){ ?>
                        <span style="display: inline-block;background-color: #eeeeee;margin: 4px;"><a href="javascript:void(0)" style="text-decoration:none;"><?= $tag['tagname']?></a></span>
                        <? } ?>
                        <!--<a href="javascript:void(0)"  style='text-decoration:none;' class="mya glyphicon glyphicon-tag">123</a>
                        <a href="javascript:void(0)"  style='text-decoration:none;' class="mya">123</a>
                        <a href="javascript:void(0)" style='text-decoration:none;'> <span class="label label-default glyphicon glyphicon-tag">读书笔记</span></a>&nbsp;
                        <a href="javascript:void(0)" class="btn btn-default btn-xs" style='text-decoration:none;'> <span class="glyphicon glyphicon-tag">读书笔记</span></a>&nbsp;
                        <a href="javascript:void(0)" class="btn btn-default btn-xs" style="padding-top: 4px">读书笔记(IT)</a>&nbsp;
                        <span class="glyphicon  glyphicon-tag" style="margin-top: 4px;" aria-hidden="true">源码阅读</span>&nbsp;
                        <span class="glyphicon  glyphicon-tag btn-default btn-xs" style="margin-top: 4px" aria-hidden="true">源码阅读</span>&nbsp;
                        <button type="button" class="btn btn-default btn-xs" style="margin-top: 4px" aria-label="Left Align">
                            <span class="glyphicon glyphicon-tag" aria-hidden="true">源码阅读</span>
                        </button>&nbsp;-->
                    </div>
                </section>

                <ul class="unstyled inline blog-tags">
                    <li>
                        <i class="icon-tags"></i>
                        <a href="#">Technology</a>
                        <a href="#">Education</a>
                        <a href="#">Internet</a>
                    </li>
                </ul>

                <section class="card">
                    <h4>热门文章</h4>
                    <ul>
                        <?php foreach ($hotArticle as $item) {  ?>
                        <li style="overflow:hidden;white-space: nowrap;text-overflow: ellipsis;">
                            <a href="<?=Url::to(['article','id'=>$item['id']]) ?>"><?=$item['title']?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </section>
            </aside>
        </div>
    </div>
</div>
<script type="text/javascript">
    var globalSearchUrl = '<?=Url::to(['site/search'])?>';   //js里的php
    $("#searching").click(function(){
        search($(this).parent().siblings("input").val());
    });

    $("#search-content").keyup(function(e){
        if(e.keyCode == 13){
            search($(this).val());
        }
    });

    function search(search){
        search = $.trim(search);
        if(search == ""){
            alert("请输入搜索的内容");
            return false;
        }

        if(search.length > 255){
            alert("输入搜索的内容过长");
            return false;
        }

        var searchUrl = '';
        if(globalSearchUrl.indexOf("?") == -1){
            searchUrl = globalSearchUrl + '?&search=' + search;
        }else{
            searchUrl = globalSearchUrl + '&search=' + search;
        }

        window.location.href = searchUrl;

    }
</script>
