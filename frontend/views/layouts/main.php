<?php
use yii\helpers\Url;
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?=$this->params['keyword']?>" />
    <meta name="description" content="<?=$this->params['description']?> " />
    <title><?=$this->params['name']?></title>
    <script src="<?=Url::base(true)?>/js/jquery.js"></script>
</head>
<body>
<div class="wrap">
    <nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=Url::base(true)?>"><?=$this->params['name']?></a>
            </div>
            <div id="w0-collapse" class="collapse navbar-collapse">
                <ul id="w1" class="navbar-nav navbar-right nav">
                   <!-- <form class="form-group pull-left" onsubmit="return false;" >
                        <input name="search" value="" id="search-content" type="text" class="form-control" placeholder="站内搜索">
                        <a href="javascript:void(0)" id="searching"><i class="glyphicon glyphicon-search icon-white"></i></a>
                    </form>-->
                   <!-- <li class="active"><a href="<?/*=Url::base(true)*/?>">首页</a></li>-->
                   <!-- <a class="navbar-brand" href="<?/*=Url::base(true)*/?>">撸码文章</a>
                    <a class="navbar-brand" href="<?/*=Url::base(true)*/?>">闲书笔记</a>-->
                    <a class="navbar-brand" href="<?=Url::to(['site/aboutme'])?>">关于我</a>
                </ul>
    </nav>
    <?=$content?>
</div>

<footer class="footer" style="height:auto;min-height:60px;background-color:#373737;">
    <div class="container">
        <p class="pull-left"><?=$this->params['copyright']?></p>
    </div>
</footer>
<link href="<?=Url::base(true)?>/bootstrap/css/bootstrap.css" rel="stylesheet" />
<link href="<?=Url::base(true)?>/css/site.css" rel="stylesheet" />
<link href="<?=Url::base(true)?>/css/style.css" rel="stylesheet" />
<script src="<?=Url::base(true)?>/bootstrap/js/bootstrap.js"></script>
</body>
</html>
