<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/13
 * Time: 1:22
 */
use yii\helpers\Url;

?>
<div class="container">

        <link rel="stylesheet" href="<?=Url::base(true)?>/css/bluebox.css" />

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- 内容 -->
                    <div class="content">
                        <div class="card thread-card ps-parent">
                            <header class="page-header with-author">
                                <h2 style="padding-right:30px;">title</h2>
                                <div class="thread-meta">
                                    <span class="article-info">gengxin shijian </span>
                                </div>
                            </header>
                            <div class="inner markdown-body">
                                <!-- 内容-->
                                内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
                                <!-- 内容-->
                            </div>
                        </div>
                    </div>
                    <!-- 评论 -->
                    <div class="card">
                        <div class="comments">
                            <div id="ds-thread" class="ds-thread">
                                <div id="ds-reset">
                                    <!-- 评论回复框 -->
                                    <div class="ds-replybox">
                                        <a class="ds-avatar" href="javascript:void(0);">
                                            <img src="./images/recomment.jpg" alt="smister">
                                        </a>
                                        <form method="post" class="comment-form">
                                            <div class="ds-post-options ds-gradient-bg" style="margin-bottom:10px;">
                                                <input type="text" value="" placeholder="留言标题" id="name" class="ds-name" />
                                            </div>
                                            <div class="ds-post-options ds-gradient-bg" style="margin-bottom:10px;">
                                                <input type="text" value="" placeholder="联系方式" id="name" class="ds-name" />
                                            </div>
                                            <div class="ds-textarea-wrapper ds-rounded-top">
                                                <textarea id="commentcontent" placeholder="留言内容"></textarea>
                                                <pre class="ds-hidden-text"></pre>
                                            </div>
                                            <div class="ds-post-toolbar">
                                                <div class="ds-post-options ds-gradient-bg"><span class="ds-sync"></span></div>
                                                <button class="ds-post-button" type="button" id="submit-recomment">给我留言</button>
                                                <div class="ds-toolbar-buttons">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="cmpage" class="ds-paginator">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 评论 -->
                </div>
            </div>
        </div>
    </div>
<link rel="stylesheet" href="./css/article_detail.css" />