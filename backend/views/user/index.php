<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/20
 * Time: 21:51
 */
use backend\assets\AppAsset;

AppAsset::register($this);
$this->registerCssFile('/xblog/backend/web/statics/css/media/select2_metro.css');
$this->registerCssFile('/xblog/backend/web/statics/css/media/DT_bootstrap.css');
$this->registerJsFile('/xblog/backend/web/statics/js/table-editable.js',[ 'depends'=> 'backend\assets\AppAsset']);
$this->registerJsFile('/xblog/backend/web/statics/js/select2.min.js',[ 'depends'=> 'backend\assets\AppAsset']);
$this->registerJsFile('/xblog/backend/web/statics/js/jquery.dataTables.js',[ 'depends'=> 'backend\assets\AppAsset']);
$this->registerJsFile('/xblog/backend/web/statics/js/DT_bootstrap.js',[ 'depends'=> 'backend\assets\AppAsset']);
?>

<div class="container-fluid">

    <!-- BEGIN PAGE CONTENT-->

    <div class="row-fluid">

        <div class="span12">

            <!-- BEGIN EXAMPLE TABLE PORTLET-->

            <div class="portlet box blue">

                <div class="portlet-title">

                    <div class="caption"><i class="icon-edit"></i>注册用户</div>

                    <div class="tools">

                        <a href="javascript:;" class="collapse"></a>

                        <a href="#portlet-config" data-toggle="modal" class="config"></a>

                        <a href="javascript:;" class="reload"></a>

                        <a href="javascript:;" class="remove"></a>

                    </div>

                </div>

                <div class="portlet-body">

                    <div class="clearfix">

                        <div class="btn-group">

                            <button id="sample_editable_1_new" class="btn green">

                                Add New <i class="icon-plus"></i>

                            </button>

                        </div>

                        <div class="btn-group pull-right">

                            <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>

                            </button>

                            <ul class="dropdown-menu pull-right">

                                <li><a href="#">Print</a></li>

                                <li><a href="#">Save as PDF</a></li>

                                <li><a href="#">Export to Excel</a></li>

                            </ul>

                        </div>

                    </div>

                    <div id="sample_editable_1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row-fluid"><div class="span6"><div class="dataTables_length" id="sample_editable_1_length"><label><div id="s2id_autogen1" class="select2-container m-wrap small"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span>5</span><abbr class="select2-search-choice-close" style="display:none;"></abbr>   <div><b></b></div></a><input id="s2id_autogen2" class="select2-focusser select2-offscreen" type="text"><div class="select2-drop select2-with-searchbox" style="display:none">   <div class="select2-search">       <input autocomplete="off" class="select2-input" type="text">   </div>   <ul class="select2-results">   </ul></div></div><select tabindex="-1" class="m-wrap small select2-offscreen" aria-controls="sample_editable_1" size="1" name="sample_editable_1_length"><option selected="selected" value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records per page</label></div></div><div class="span6"><div id="sample_editable_1_filter" class="dataTables_filter"><label>Search: <input class="m-wrap medium" aria-controls="sample_editable_1" type="text"></label></div></div></div><table aria-describedby="sample_editable_1_info" class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1">

                            <thead>

                            <tr role="row"><th aria-label="Username" style="width: 223.2px;" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled">Username</th><th aria-label="Full Name: activate to sort column descending" aria-sort="ascending" style="width: 285.2px;" colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0" role="columnheader" class="sorting_asc">Full Name</th><th aria-label="Points: activate to sort column ascending" style="width: 155.2px;" colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0" role="columnheader" class="sorting">Points</th><th aria-label="Notes: activate to sort column ascending" style="width: 201.2px;" colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0" role="columnheader" class="sorting">Notes</th><th aria-label="Edit: activate to sort column ascending" style="width: 113.2px;" colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0" role="columnheader" class="sorting">Edit</th><th aria-label="Delete: activate to sort column ascending" style="width: 152.2px;" colspan="1" rowspan="1" aria-controls="sample_editable_1" tabindex="0" role="columnheader" class="sorting">Delete</th></tr>

                            </thead>



                            <tbody aria-relevant="all" aria-live="polite" role="alert"><tr class="odd">

                                <td class="">alex</td>

                                <td class="  sorting_1">Alex Nilson</td>

                                <td class=" ">1234</td>

                                <td class="center ">power user</td>

                                <td class=" "><a class="edit" href="javascript:;">Edit</a></td>

                                <td class=" "><a class="delete" href="javascript:;">Delete</a></td>

                            </tr><tr class="even">

                                <td class="">webriver</td>

                                <td class="  sorting_1">Antonio Sanches</td>

                                <td class=" ">462</td>

                                <td class="center ">new user</td>

                                <td class=" "><a class="edit" href="javascript:;">Edit</a></td>

                                <td class=" "><a class="delete" href="javascript:;">Delete</a></td>

                            </tr><tr class="odd">

                                <td class="">lisa</td>

                                <td class="  sorting_1">Lisa Wong</td>

                                <td class=" ">434</td>

                                <td class="center ">new user</td>

                                <td class=" "><a class="edit" href="javascript:;">Edit</a></td>

                                <td class=" "><a class="delete" href="javascript:;">Delete</a></td>

                            </tr><tr class="even">

                                <td class="">gist124</td>

                                <td class="  sorting_1">Nick Roberts</td>

                                <td class=" ">62</td>

                                <td class="center ">new user</td>

                                <td class=" "><a class="edit" href="javascript:;">Edit</a></td>

                                <td class=" "><a class="delete" href="javascript:;">Delete</a></td>

                            </tr><tr class="odd">

                                <td class="">nick12</td>

                                <td class="  sorting_1">Nick Roberts</td>

                                <td class=" ">232</td>

                                <td class="center ">power user</td>

                                <td class=" "><a class="edit" href="javascript:;">Edit</a></td>

                                <td class=" "><a class="delete" href="javascript:;">Delete</a></td>

                            </tr></tbody></table><div class="row-fluid"><div class="span6"><div id="sample_editable_1_info" class="dataTables_info">Showing 1 to 5 of 6 entries</div></div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><li class="prev disabled"><a href="#">← <span class="hidden-480">Prev</span></a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li class="next"><a href="#"><span class="hidden-480">Next</span> → </a></li></ul></div></div></div></div>

                </div>

            </div>

            <!-- END EXAMPLE TABLE PORTLET-->

        </div>

    </div>

    <!-- END PAGE CONTENT -->

</div>

<!-- END PAGE LEVEL PLUGINS -->