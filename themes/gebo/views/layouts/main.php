<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        <?php $baseUrl = Yii::app()->theme->baseUrl; ?>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" type="text/css" />
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/bootstrap/css/bootstrap-responsive.min.css" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/lib/qtip2/jquery.qtip.min.css" />
        <!-- notifications -->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/lib/sticky/sticky.css" />
        <!-- notifications -->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/img/splashy/splashy.css" />
	<!-- colorbox -->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/lib/colorbox/colorbox.css" />
        <!-- CLEditor -->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/lib/CLEditor/jquery.cleditor.css" />

        <!-- gebo color theme-->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/css/eastern_blue.css" id="link_theme" />
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/css/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	
        <!-- Favicon -->
            <link rel="shortcut icon" href="<?php echo $baseUrl; ?>/favicon.ico" />
		
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/css/ie.css" />
            <script src="<?php echo $baseUrl; ?>/js/ie/html5.js"></script>
			<script src="<?php echo $baseUrl; ?>/js/ie/respond.min.js"></script>
        <![endif]-->
		
		<script>
			//* hide all elements & show preloader
			document.documentElement.className += 'js';
		</script>
    </head>
    <body class="ptrn_c">
		<div id="loading_layer" style="display:none"><img src="<?php echo $baseUrl; ?>/img/ajax_loader.gif" alt="" /></div>
				
		<div id="maincontainer" class="clearfix">
			<!-- HEADER -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <?php echo CHtml::link('<i class="icon-home icon-white"></i> ' . Yii::app()->name, array('/'), array('class' => 'brand')); ?>
                            <ul class="nav user_menu pull-right">
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-user icon-white"></span> <?php echo ucwords(strtolower(Yii::app()->user->name)); ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><?php echo CHtml::link('<span class="icon-edit"></span> Profile', array('/pengaturan/profile')); ?></li>
                                        <li class="divider"></li>
                                        <li><?php echo CHtml::link('<span class="icon-off"></span> Log Out', array('/site/logout')); ?></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER -->
            
            <!-- MAIN CONTENT -->
            <div id="contentwrapper">
                <div class="main_content">
                    
                    <!-- BREADCRUMBS -->
                    <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-home"></i></a>
                                </li>
                                <?php
                                $this->widget('zii.widgets.CBreadcrumbs', array(
                                    'homeLink' => false,
                                    'separator' => '',
                                    'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                                    'inactiveLinkTemplate' => '<li>{label}</span></li>',
                                    'links' => $this->breadcrumbs,
                                ));
                                ?>
                            </ul>
                        </div>
                    </nav>
                    <!-- END BREADCRUMBS -->
                    
                    <!-- CONTENT -->
                        <?php echo $content; ?>
                    <!-- END CONTENT -->
                </div>
            </div>
            
			<!-- SIDEBAR -->
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <div class="sidebar">
                <div class="antiScroll">
                    <div class="antiscroll-inner">
                        <div class="antiscroll-content">

                            <div class="sidebar_inner">
                                <form action="search_page.html" class="input-append" method="post" >
                                    <input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>
                                </form>
                                <div id="side_accordion" class="accordion">

                                    <?php
                                    if (isset($this->module)) {
                                        $getModule = $this->module->getName();
                                    } else {
                                        $getModule = null;
                                    }
                                    ?>
                                    <?php 
                                        if(!WebUser::isGuest())
                                        {
                                    ?>
                                    
                                    <!-- role super admin -->
                                    <?php
                                        if(WebUser::isRoot())
                                        {
                                    ?>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class=" icon-home"></i> Dashboard
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseOne">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rencana Telaah / SPT', array('/rencanaPD/rencanaTelaah')); ?></li>
                                                        <li><?php echo CHtml::link('Penugasan', array('/rencanaPD/penugasan')); ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-folder-open"></i> Divisi
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseTwo">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rencana SPPD', array('/terbitkanSPT/SPPD')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-tags"></i> Perusahaan
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseThree">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rincian', array('/uangMuka/index')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseFive" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-tasks"></i> Survey
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseFive">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rincian', array('/uangMuka/index')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseSix" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-wrench"></i> Pengaturan
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse <?php echo ($getModule==="pengaturan")?"in":"";?>" id="collapseSix">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li class="nav-header">Manajemen User</li>
                                                        <li class="<?php echo ($this->ID==="user")?"active":"";?>"><?php echo CHtml::link('Akun User', array('/pengaturan/user')); ?></li>
                                                        <li class="nav-header">System</li>
                                                        <li><?php echo CHtml::link('Backup Database', array('/pengaturan/backup')); ?></li>
                                                        <li><?php echo CHtml::link('Website', array('/pengaturan/website')); ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                
                                    <!-- role admin perusahaan -->
                                    <?php
                                        if(WebUser::isAdmin())
                                        {
                                    ?>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-folder-open"></i> Divisi
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseOne">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rencana SPPD', array('/terbitkanSPT/SPPD')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-user"></i> User
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseTwo">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rincian', array('/uangMuka/index')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-tasks"></i> Survey
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseThree">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rincian', array('/uangMuka/index')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-cog"></i> Grafik
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseFour">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rincian', array('/uangMuka/index')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseFive" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-comment"></i> Interaksi
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseFive">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rincian', array('/uangMuka/index')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                            
                                    <!-- role surveyor -->
                                    <?php
                                        if(WebUser::isSurveyor())
                                        {
                                    ?>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-folder-open"></i> Divisi
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseOne">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rencana SPPD', array('/terbitkanSPT/SPPD')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-tasks"></i> Survey
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseTwo">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rincian', array('/uangMuka/index')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-comment"></i> Interaksi
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseThree">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rincian', array('/uangMuka/index')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                        
                                    <!-- role client user -->
                                    <?php
                                        if(WebUser::isClient())
                                        {
                                    ?>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-folder-open"></i> Divisi
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseOne">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rencana SPPD', array('/terbitkanSPT/SPPD')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-barcode"></i> Lihat Survey
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseTwo">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rincian', array('/uangMuka/index')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                    <i class="icon-signal"></i> Lihat Grafik
                                                </a>
                                            </div>
                                            <div class="accordion-body collapse" id="collapseThree">
                                                <div class="accordion-inner">
                                                    <ul class="nav nav-list">
                                                        <li><?php echo CHtml::link('Rincian', array('/uangMuka/index')); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                                <div class="push"></div>
                            </div>

                            <div class="sidebar_info">
                                <ul class="unstyled">
                                    <li>
                                        <span class="act act-warning">65</span>
                                        <strong>New comments</strong>
                                    </li>
                                    <li>
                                        <span class="act act-success">10</span>
                                        <strong>New articles</strong>
                                    </li>
                                    <li>
                                        <span class="act act-danger">85</span>
                                        <strong>New registrations</strong>
                                    </li>
                                </ul>
                            </div> 

                        </div>
                    </div>
                </div>

            </div>
            <!-- END SIDEBAR -->
            
            <script src="<?php echo $baseUrl; ?>/js/jquery.min.js"></script>
            <script src="<?php echo $baseUrl; ?>/js/jquery-migrate.min.js"></script>
            <!-- smart resize event -->
            <script src="<?php echo $baseUrl; ?>/js/jquery.debouncedresize.min.js"></script>
            <!-- hidden elements width/height -->
            <script src="<?php echo $baseUrl; ?>/js/jquery.actual.min.js"></script>
            <!-- js cookie plugin -->
            <script src="<?php echo $baseUrl; ?>/js/jquery_cookie.min.js"></script>
            <!-- main bootstrap js -->
            <script src="<?php echo $baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
            <!-- bootstrap plugins -->
            <script src="<?php echo $baseUrl; ?>/js/bootstrap.plugins.min.js"></script>
            <!-- tooltips -->
            <script src="<?php echo $baseUrl; ?>/lib/qtip2/jquery.qtip.min.js"></script>
            <!-- jBreadcrumbs -->
            <script src="<?php echo $baseUrl; ?>/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
            <!-- lightbox -->
            <script src="<?php echo $baseUrl; ?>/lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- fix for ios orientation change -->
            <script src="<?php echo $baseUrl; ?>/js/ios-orientationchange-fix.js"></script>
            <!-- scrollbar -->
            <script src="<?php echo $baseUrl; ?>/lib/antiscroll/antiscroll.js"></script>
            <script src="<?php echo $baseUrl; ?>/lib/antiscroll/jquery-mousewheel.js"></script>
            <!-- to top -->
            <script src="<?php echo $baseUrl; ?>/lib/UItoTop/jquery.ui.totop.min.js"></script>
            <!-- mobile nav -->
            <script src="<?php echo $baseUrl; ?>/js/selectNav.js"></script>
            <!-- common functions -->
            <script src="<?php echo $baseUrl; ?>/js/gebo_common.js"></script>

            <script src="<?php echo $baseUrl; ?>/lib/jquery-ui/jquery-ui-1.10.0.custom.min.js"></script>
            <!-- touch events for jquery ui-->
            <script src="<?php echo $baseUrl; ?>/js/forms/jquery.ui.touch-punch.min.js"></script>
            <!-- multi-column layout -->
            <script src="<?php echo $baseUrl; ?>/js/jquery.imagesloaded.min.js"></script>
            <script src="<?php echo $baseUrl; ?>/js/jquery.wookmark.js"></script>
            <!-- responsive table -->
            <script src="<?php echo $baseUrl; ?>/js/jquery.mediaTable.min.js"></script>
            <!-- small charts -->
            <script src="<?php echo $baseUrl; ?>/js/jquery.peity.min.js"></script>
            <!-- calendar -->
            <script src="<?php echo $baseUrl; ?>/lib/fullcalendar/fullcalendar.min.js"></script>
            <!-- sortable/filterable list -->
            <script src="<?php echo $baseUrl; ?>/lib/list_js/list.min.js"></script>
            <script src="<?php echo $baseUrl; ?>/lib/list_js/plugins/paging/list.paging.js"></script>

            <!-- colorbox -->
            <script src="<?php echo $baseUrl; ?>/lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- datatable -->
            <script src="<?php echo $baseUrl; ?>/lib/datatables/jquery.dataTables.min.js"></script>
            <!-- additional sorting for datatables -->
            <script src="<?php echo $baseUrl; ?>/lib/datatables/jquery.dataTables.sorting.js"></script>
            <!-- datatables bootstrap integration -->
            <script src="<?php echo $baseUrl; ?>/lib/datatables/jquery.dataTables.bootstrap.min.js"></script>
            <!-- tables functions -->
            <script src="<?php echo $baseUrl; ?>/js/gebo_tables.js"></script>

            <!-- CLEditor -->
            <script src="<?php echo $baseUrl; ?>/lib/CLEditor/jquery.cleditor.js"></script>
            <script src="<?php echo $baseUrl; ?>/lib/CLEditor/jquery.cleditor.icon.min.js"></script>
            <!-- date library -->
            <script src="<?php echo $baseUrl; ?>/lib/moment_js/moment.min.js"></script>
            <!-- chat functions -->
            <script src="<?php echo $baseUrl; ?>/js/gebo_chat.js"></script>

            <!-- enhanced select (chosen) -->
            <script src="<?php echo $baseUrl; ?>/lib/chosen/chosen.jquery.min.js"></script>
            <!-- form functions -->
            <script src="<?php echo $baseUrl; ?>/js/gebo_choosen.js"></script>

	
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
		
		</div>
	</body>
</html>