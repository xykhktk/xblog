<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/10
 * Time: 20:2
 */

use frontend\assets\AppAsset;

AppAsset::register($this);
//$this->registerJsFile('/xblog/backend/web/statics/js/bootstrap.js',[ 'depends'=> 'backend\assets\AppAsset']);
//$this->registerCssFile('/xblog/backend/web/statics/css/media/login.css');
//$this->registerCssFile('/xblog/frontend/web/statics/css/bootstrap-responsive.min.css');
$this->registerCssFile('/xblog/frontend/web/statics/css/bootstrap.min.css');
$this->registerCssFile('/xblog/frontend/web/statics/css/bootstrap-responsive.min.css');
$this->registerCssFile('/xblog/frontend/web/statics/css/font-awesome.css');
$this->registerCssFile('/xblog/frontend/web/statics/css/style-metro.css');
$this->registerCssFile('/xblog/frontend/web/statics/css/style.css');
$this->registerCssFile('/xblog/frontend/web/statics/css/style-responsive.css');
$this->registerCssFile('/xblog/frontend/web/statics/css/default.css');
$this->registerCssFile('/xblog/frontend/web/statics/css/uniform.default.css');
$this->registerCssFile('/xblog/frontend/web/statics/css/jquery.fancybox.css');
$this->registerCssFile('/xblog/frontend/web/statics/css/blog.css');

?>
<!-- BEGIN CONTAINER -->
<div style="background-color:#ffffee">
<div style="padding-top:5%;padding-bottom:10%;padding-left:10%;padding-right: 10%;">

    <div class="container-fluid">

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid">

            <div class="span12 blog-page">

                <div class="row-fluid">

                    <div class="span9 article-block">

                        <h1>Latest Blog</h1>

                        <div class="row-fluid">

                            <div class="span4 blog-img blog-tag-data">

                                <img src="media/image/image4.jpg" alt="">

                                <ul class="unstyled inline">

                                    <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>

                                    <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>

                                </ul>

                                <ul class="unstyled inline blog-tags">

                                    <li>

                                        <i class="icon-tags"></i>

                                        <a href="#">Technology</a>

                                        <a href="#">Education</a>

                                        <a href="#">Internet</a>

                                    </li>

                                </ul>

                            </div>

                            <div class="span8 blog-article">

                                <h2><a href="page_blog_item.html">Hello here will be some recent news..</a></h2>

                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>

                                <a class="btn blue" href="page_blog_item.html">

                                    Read more

                                    <i class="m-icon-swapright m-icon-white"></i>

                                </a>

                            </div>

                        </div>

                        <hr>

                        <div class="row-fluid">

                            <div class="span4 blog-img blog-tag-data">

                                <img src="media/image/image3.jpg" alt="">

                                <ul class="unstyled inline">

                                    <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>

                                    <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>

                                </ul>

                                <ul class="unstyled inline blog-tags">

                                    <li>

                                        <i class="icon-tags"></i>

                                        <a href="#">Technology</a>

                                        <a href="#">Education</a>

                                        <a href="#">Internet</a>

                                    </li>

                                </ul>

                            </div>

                            <div class="span8 blog-article">

                                <h2><a href="page_blog_item.html">Hello here will be some recent news..</a></h2>

                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>

                                <a class="btn blue" href="page_blog_item.html">

                                    Read more

                                    <i class="m-icon-swapright m-icon-white"></i>

                                </a>

                            </div>

                        </div>

                        <hr>

                        <div class="row-fluid">

                            <div class="span4 blog-img blog-tag-data">

                                <img src="media/image/image4.jpg" alt="">

                                <ul class="unstyled inline">

                                    <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>

                                    <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>

                                </ul>

                                <ul class="unstyled inline blog-tags">

                                    <li>

                                        <i class="icon-tags"></i>

                                        <a href="#">Technology</a>

                                        <a href="#">Education</a>

                                        <a href="#">Internet</a>

                                    </li>

                                </ul>

                            </div>

                            <div class="span8 blog-article">

                                <h2><a href="page_blog_item.html">Hello here will be some recent news..</a></h2>

                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>

                                <a class="btn blue" href="page_blog_item.html">

                                    Read more

                                    <i class="m-icon-swapright m-icon-white"></i>

                                </a>

                            </div>

                        </div>

                        <hr>

                        <div class="row-fluid">

                            <div class="span4 blog-img blog-tag-data">

                                <img src="media/image/image3.jpg" alt="">

                                <ul class="unstyled inline">

                                    <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>

                                    <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>

                                </ul>

                                <ul class="unstyled inline blog-tags">

                                    <li>

                                        <i class="icon-tags"></i>

                                        <a href="#">Technology</a>

                                        <a href="#">Education</a>

                                        <a href="#">Internet</a>

                                    </li>

                                </ul>

                            </div>

                            <div class="span8 blog-article">

                                <h2><a href="page_blog_item.html">Hello here will be some recent news..</a></h2>

                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>

                                <a class="btn blue" href="page_blog_item.html">

                                    Read more

                                    <i class="m-icon-swapright m-icon-white"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                    <!--end span9-->

                    <div class="span3 blog-sidebar">

                        <h2>Top Entiries</h2>

                        <div class="top-news">

                            <a href="#" class="btn red">

                                <span>Metronic News</span>

                                <em>Posted on: April 16, 2013</em>

                                <em>

                                    <i class="icon-tags"></i>

                                    Money, Business, Google

                                </em>

                                <i class="icon-briefcase top-news-icon"></i>

                            </a>

                            <a href="#" class="btn green">

                                <span>Top Week</span>

                                <em>Posted on: April 15, 2013</em>

                                <em>

                                    <i class="icon-tags"></i>

                                    Internet, Music, People

                                </em>

                                <i class="icon-music top-news-icon"></i>

                            </a>

                            <a href="#" class="btn blue">

                                <span>Gold Price Falls</span>

                                <em>Posted on: April 14, 2013</em>

                                <em>

                                    <i class="icon-tags"></i>

                                    USA, Business, Apple

                                </em>

                                <i class="icon-globe top-news-icon"></i>

                            </a>

                            <a href="#" class="btn yellow">

                                <span>Study Abroad</span>

                                <em>Posted on: April 13, 2013</em>

                                <em>

                                    <i class="icon-tags"></i>

                                    Education, Students, Canada

                                </em>

                                <i class="icon-book top-news-icon"></i>

                            </a>

                            <a href="#" class="btn purple">

                                <span>Top Destinations</span>

                                <em>Posted on: April 12, 2013</em>

                                <em>

                                    <i class="icon-tags"></i>

                                    Places, Internet, Google Map

                                </em>

                                <i class="icon-bolt top-news-icon"></i>

                            </a>

                        </div>

                        <div class="space20"></div>

                        <div class="space20"></div>

                        <h2>Recent Twitts</h2>

                        <div class="blog-twitter">

                            <div class="blog-twitter-block">

                                <a href="">@keenthemes</a>

                                <p>At vero eos et accusamus et iusto odio.</p>

                                <a href="#"><em>http://t.co/sBav7dm</em></a>

                                <span>2 hours ago</span>

                            </div>

                            <div class="blog-twitter-block">

                                <a href="">@keenthemes</a>

                                <p>At vero eos et accusamus et iusto odio.</p>

                                <a href="#"><em>http://t.co/sBav7dm</em></a>

                                <span>5 hours ago</span>

                            </div>

                            <div class="blog-twitter-block">

                                <a href="">@keenthemes</a>

                                <p>At vero eos et accusamus et iusto odio.</p>

                                <a href="#"><em>http://t.co/sBav7dm</em></a>

                                <span>7 hours ago</span>

                            </div>

                        </div>

                    </div>

                    <!--end span3-->

                </div>

                <div class="pagination pagination-right">

                    <ul>

                        <li><a href="#">Prev</a></li>

                        <li><a href="#">1</a></li>

                        <li><a href="#">2</a></li>

                        <li class="active"><a href="#">3</a></li>

                        <li><a href="#">4</a></li>

                        <li><a href="#">5</a></li>

                        <li><a href="#">Next</a></li>

                    </ul>

                </div>

            </div>

        </div>

        <!-- END PAGE CONTENT-->

    </div>
</div>
</div>

<!--<script src="http://stats.g.doubleclick.net/dc.js" async="" type="text/javascript"></script>-->
