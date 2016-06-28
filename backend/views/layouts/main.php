<?php
/* @var $this \yii\web\View */
/* @var $content string */
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
/*use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;*/

AppAsset::register($this);
$this->registerJs('jQuery(document).ready(function() {    
		   App.init();
		});',View::POS_END);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="page-header-fixed">
<?php $this->beginBody() ?>

<!-- BEGIN HEADER -->

<div class="header navbar navbar-inverse navbar-fixed-top">

    <!-- BEGIN TOP NAVIGATION BAR -->

    <div class="navbar-inner">

        <div class="container-fluid">

            <!-- BEGIN LOGO -->

            <a class="brand" href="<?=Url::home()?>">

               <!-- <img src="statics/image/logo.png" alt="logo">-->
                <img src="<?=(Url::home()).'/statics/image/logo.png'?>" alt="logo">

            </a>

            <!-- END LOGO -->

            <!-- BEGIN RESPONSIVE MENU TOGGLER -->

            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

                <img src="<?=Url::base().'/statics/image/menu-toggler.png'?>" alt="">

            </a>

            <!-- END RESPONSIVE MENU TOGGLER -->

            <!-- BEGIN TOP NAVIGATION MENU -->

            <ul class="nav pull-right">

                <!-- BEGIN NOTIFICATION DROPDOWN -->

                <li class="dropdown" id="header_notification_bar">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <i class="icon-warning-sign"></i>

                        <span class="badge">6</span>

                    </a>

                    <ul class="dropdown-menu extended notification">

                        <li>

                            <p>You have 14 new notifications</p>

                        </li>

                        <li>

                            <a href="#">

                                <span class="label label-success"><i class="icon-plus"></i></span>

                                New user registered.

                                <span class="time">Just now</span>

                            </a>

                        </li>

                        <!--<li>

                            <a href="#">

                                <span class="label label-important"><i class="icon-bolt"></i></span>

                                Server #12 overloaded.

                                <span class="time">15 mins</span>

                            </a>

                        </li>-->

                        <li class="external">

                            <a href="#">See all notifications <i class="m-icon-swapright"></i></a>

                        </li>

                    </ul>

                </li>

                <!-- END NOTIFICATION DROPDOWN -->

                <!-- BEGIN INBOX DROPDOWN -->

                <li class="dropdown" id="header_inbox_bar">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <i class="icon-envelope"></i>

                        <span class="badge">5</span>

                    </a>

                    <ul class="dropdown-menu extended inbox">

                        <li>

                            <p>You have 12 new messages</p>

                        </li>

                        <li>

                            <a href="inbox.html?a=view">

                                <span class="photo"><img src="<?=Url::base().'/statics/image/avatar2.jpg'?>" alt=""></span>

								<span class="subject">

								<span class="from">Lisa Wong</span>

								<span class="time">Just Now</span>

								</span>

								<span class="message">

								Vivamus sed auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>

                            </a>

                        </li>

                       <!-- <li>

                            <a href="inbox.html?a=view">

                                <span class="photo"><img src="statics/css/image/avatar3.jpg" alt=""></span>

								<span class="subject">

								<span class="from">Richard Doe</span>

								<span class="time">16 mins</span>

								</span>

								<span class="message">

								Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>

                            </a>

                        </li>-->

                        <li class="external">

                            <a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>

                        </li>

                    </ul>

                </li>

                <!-- END INBOX DROPDOWN -->

                <!-- BEGIN TODO DROPDOWN -->

                <li class="dropdown" id="header_task_bar">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <i class="icon-tasks"></i>

                        <span class="badge">5</span>

                    </a>

                    <ul class="dropdown-menu extended tasks">

                        <li>

                            <p>You have 12 pending tasks</p>

                        </li>

                        <li>

                            <a href="#">

								<span class="task">

								<span class="desc">New release v1.2</span>

								<span class="percent">30%</span>

								</span>

								<span class="progress progress-success ">

								<span style="width: 30%;" class="bar"></span>

								</span>

                            </a>

                        </li>

                     <!--   <li>

                            <a href="#">

								<span class="task">

								<span class="desc">Application deployment</span>

								<span class="percent">65%</span>

								</span>

								<span class="progress progress-danger progress-striped active">

								<span style="width: 65%;" class="bar"></span>

								</span>

                            </a>

                        </li>-->

                        <li class="external">

                            <a href="#">See all tasks <i class="m-icon-swapright"></i></a>

                        </li>

                    </ul>

                </li>

                <!-- END TODO DROPDOWN -->

                <!-- BEGIN USER LOGIN DROPDOWN -->

                <li class="dropdown user">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img alt="" src="<?=Url::base().'/statics/image/avatar1_small.jpg'?>">

                        <span class="username" user-id="<?=Yii::$app->user->identity->id ?>"> <?=Yii::$app->user->identity->username ?> </span>

                        <i class="icon-angle-down"></i>

                    </a>

                    <ul class="dropdown-menu">

                        <li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a></li>

                        <li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>

                        <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>

                        <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>

                        <li class="divider"></li>

                        <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>

                        <!--<li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>-->
                        <li><a href="<?=Url::to(['site/logout'])?>" data-method="post"><i class="icon-key"></i> Log Out</a></li>

                    </ul>

                </li>

                <!-- END USER LOGIN DROPDOWN -->

            </ul>

            <!-- END TOP NAVIGATION MENU -->

        </div>

    </div>

    <!-- END TOP NAVIGATION BAR -->

</div>

    <!-- END HEADER -->

    <!-- BEGIN CONTAINER -->

    <div class="page-container row-fluid">

    <!-- BEGIN SIDEBAR -->

    <div class="page-sidebar nav-collapse collapse">

        <!-- BEGIN SIDEBAR MENU -->

        <ul class="page-sidebar-menu">

            <li>

                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

                <div class="sidebar-toggler hidden-phone"></div>

                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

            </li>

            <li>

                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

                <form class="sidebar-search">

                    <div class="input-box">

                        <a href="javascript:;" class="remove"></a>

                        <input placeholder="Search..." type="text">

                        <input class="submit" value=" " type="button">

                    </div>

                </form>

                <!-- END RESPONSIVE QUICK SEARCH FORM -->

            </li>

            <li class="start ">

                <a href="<?=Url::base()?>">

                    <i class="icon-home"></i>

                    <span class="title">管理主页</span>

                </a>

            </li>

            <li class="">

                <a href="javascript:;">

                    <i class="icon-cogs"></i>

                    <span class="title">设置</span>

                    <span class="selected"></span>

                    <span class="arrow open"></span>

                </a>

                <ul class="sub-menu">

                    <li>

                        <a href="<?=Url::to(['authitem/index'])?>">

                            角色/权限管理</a>

                    </li>

                    <li>

                        <a href="<?=Url::to(['category/index'])?>">

                            文章分类管理</a>

                    </li>

                    <li>

                        <a href="layout_promo.html">

                            Promo Page</a>

                    </li>

                </ul>

            </li>

            <li class="last">

                <a href="javascript:;">

                    <i class="icon-bookmark-empty"></i>

                    <span class="title">系统用户</span>

                    <span class="arrow "></span>

                </a>

                <ul class="sub-menu">

                    <li>

                        <a href="<?=Url::to(['user/index'])?>" >

                           用户管理</a>

                    </li>

                    <li>

                        <a href="ui_buttons.html">

                            Buttons</a>

                    </li>

                    <li>

                        <a href="ui_modals.html">

                            Enhanced Modals</a>

                    </li>

                </ul>

            </li>

        </ul>

        <!-- END SIDEBAR MENU -->

    </div>

    <!-- END SIDEBAR -->

    <!-- BEGIN PAGE -->

    <div style="min-height:980px !important" class="page-content">

        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <div id="portlet-config" class="modal hide">

            <div class="modal-header">

                <button data-dismiss="modal" class="close" type="button"></button>

                <h3>portlet Settings</h3>

            </div>

            <div class="modal-body">

                <p>Here will be a configuration form</p>

            </div>

        </div>

        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <!-- BEGIN PAGE CONTAINER-->

        <div class="container-fluid">

            <!-- BEGIN PAGE HEADER-->

            <div class="row-fluid">

                <div class="span12">

                    <!-- BEGIN STYLE CUSTOMIZER -->

                    <!--<div class="color-panel hidden-phone">

                        <div class="color-mode-icons icon-color"></div>

                        <div class="color-mode-icons icon-color-close"></div>

                        <div class="color-mode">

                            <p>THEME COLOR</p>

                            <ul class="inline">

                                <li class="color-black current color-default" data-style="default"></li>

                                <li class="color-blue" data-style="blue"></li>

                                <li class="color-brown" data-style="brown"></li>

                                <li class="color-purple" data-style="purple"></li>

                                <li class="color-grey" data-style="grey"></li>

                                <li class="color-white color-light" data-style="light"></li>

                            </ul>

                            <label>

                                <span>Layout</span>

                                <select class="layout-option m-wrap small">

                                    <option value="fluid" selected="">Fluid</option>

                                    <option value="boxed">Boxed</option>

                                </select>

                            </label>

                            <label>

                                <span>Header</span>

                                <select class="header-option m-wrap small">

                                    <option value="fixed" selected="">Fixed</option>

                                    <option value="default">Default</option>

                                </select>

                            </label>

                            <label>

                                <span>Sidebar</span>

                                <select class="sidebar-option m-wrap small">

                                    <option value="fixed">Fixed</option>

                                    <option value="default" selected="">Default</option>

                                </select>

                            </label>

                            <label>

                                <span>Footer</span>

                                <select class="footer-option m-wrap small">

                                    <option value="fixed">Fixed</option>

                                    <option value="default" selected="">Default</option>

                                </select>

                            </label>

                        </div>

                    </div>-->

                    <!-- END BEGIN STYLE CUSTOMIZER -->

                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->

                    <!--<h3 class="page-title">

                        Blank Page <small>blank page</small>

                    </h3>

                    <ul class="breadcrumb">

                        <li>

                            <i class="icon-home"></i>

                            <a href="index.html">Home</a>

                            <i class="icon-angle-right"></i>

                        </li>

                        <li>

                            <a href="#">Layouts</a>

                            <i class="icon-angle-right"></i>

                        </li>

                        <li><a href="#">Blank Page</a></li>

                    </ul>-->

                    <!-- END PAGE TITLE & BREADCRUMB-->

                </div>

            </div>

            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT-->

            <div class="row-fluid">

                <!--<div class="span12">

                    Blank page content goes here

                </div>-->

                <?=$content?>

            </div>

            <!-- END PAGE CONTENT-->

        </div>

        <!-- END PAGE CONTAINER-->

    </div>

    <!-- END PAGE -->

</div>

    <!-- END CONTAINER -->

    <!-- BEGIN FOOTER -->

    <div class="footer">

    <div class="footer-inner">

        2013 © Metronic by keenthemes.

    </div>

    <div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

    </div>

</div>

    <!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
