<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Donatetogo Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">

        <!-- C3 charts css -->
        <link href="<?php echo base_url(); ?>plugins/c3/c3.min.css" rel="stylesheet" type="text/css"  />
		
		<!-- Toastr css -->
        <link href="<?php echo base_url(); ?>plugins/jquery-toastr/jquery.toast.min.css" rel="stylesheet" />
		
		<!-- DataTables -->
        <link href="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>plugins/magnific-popup/css/magnific-popup.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <!--<a href="index.html" class="logo"><span>Code<span>Fox</span></span><i class="mdi mdi-layers"></i></a>-->
                    <!-- Image logo -->
                    <a href="<?php echo base_url(); ?>" class="logo">
                        <span>
                            <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" height="25">
                        </span>
                        <i>
                            <img src="<?php echo base_url(); ?>assets/images/logo_sm.png" alt="" height="28">
                        </i>
                    </a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left nav-menu-left">
                            <li>
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden-xs">
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                            <li>
                                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="dripicons-bell"></i>
                                    <span class="badge badge-pink">4</span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right dropdown-lg user-list notify-list">
                                    <li class="list-group notification-list m-b-0">
                                        <div class="slimscroll">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="media-left p-r-10">
                                                    <em class="fa fa-diamond bg-primary"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading text-primary">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        There are new settings available
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="media-left p-r-10">
                                                    <em class="fa fa-cog bg-warning"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading text-warning">New settings</h5>
                                                    <p class="m-0">
                                                        There are new settings available
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="media-left p-r-10">
                                                    <em class="fa fa-bell-o bg-custom"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading text-custom">Updates</h5>
                                                    <p class="m-0">
                                                        There are <span class="text-primary font-600">2</span> new updates available
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="media-left p-r-10">
                                                    <em class="fa fa-user-plus bg-danger"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading text-danger">New user registered</h5>
                                                    <p class="m-0">
                                                        You have 10 unread messages
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                            <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="media-left p-r-10">
                                                    <em class="fa fa-diamond bg-primary"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading text-primary">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        There are new settings available
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="media-left p-r-10">
                                                    <em class="fa fa-cog bg-warning"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading text-warning">New settings</h5>
                                                    <p class="m-0">
                                                        There are new settings available
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                       </div>
                                    </li>
                                    <!-- end notification list -->
                                </ul>
                            </li>

                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li><a href="<?php echo base_url(); ?>admin/profile">Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url(); ?>admin/logout">Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metisMenu nav" id="side-menu">
                            <li class="menu-title">Navigation</li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin" aria-expanded="true"><i class="fi-air-play"></i><span class="badge badge-success pull-right">2</span> <span> Dashboard </span></a>
                            </li>
							
							<li>
                                <a href="<?php echo base_url(); ?>admin/users" aria-expanded="true"><i class="fa fa-user"></i> <span> Users </span> </a>
                            </li>
							
							<li>
                                <a href="<?php echo base_url(); ?>admin/payment/profiles" aria-expanded="true"><i class="fa fa-credit-card"></i> <span> Payment Profiles </span> </a>
                            </li>
							
							<li>
                                <a href="<?php echo base_url(); ?>admin/donation/receipts" aria-expanded="true"><i class="fa fa-book"></i> <span> Donations </span> </a>
                            </li>
							
							<li>
                                <a href="<?php echo base_url(); ?>admin/settings" aria-expanded="true"><i class="fa fa-gear"></i> <span> Settings </span> </a>
                            </li>

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        
						<?php $this->load->view($content); ?>

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2017 © Adminox. - Coderthemes.com
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
		
		<!-- MODAL -->
		<div id="dialog" class="modal-block mfp-hide">
			<section class="panel panel-info panel-color">
				<header class="panel-heading">
					<h2 class="panel-title">Are you sure?</h2>
				</header>
				<div class="panel-body">
					<div class="modal-wrapper">
						<div class="modal-text">
							<p>Are you sure that you want to delete this row?</p>
						</div>
					</div>

					<div class="row m-t-20">
						<div class="col-md-12 text-right">
							<button id="dialogConfirm" class="btn btn-primary waves-effect waves-light">Confirm</button>
							<button id="dialogCancel" class="btn btn-default waves-effect">Cancel</button>
						</div>
					</div>
				</div>

			</section>
		</div>
		<!-- end Modal -->



        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
		
		<script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.colVis.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.fixedColumns.min.js"></script>
		
		<script src="<?php echo base_url(); ?>plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
		
		 <!-- Toastr js -->
        <script src="<?php echo base_url(); ?>plugins/jquery-toastr/jquery.toast.min.js" type="text/javascript"></script>

        <!-- Counter js  -->
        <script src="<?php echo base_url(); ?>plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/counterup/jquery.counterup.min.js"></script>

        <!--C3 Chart-->
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/d3/d3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/c3/c3.min.js"></script>

        <!--Echart Chart-->
		<script src="<?php echo base_url(); ?>plugins/echart/echarts-all.js"></script>

        <!-- Dashboard init -->
        <script src="<?php echo base_url(); ?>assets/pages/jquery.dashboard.js"></script>
		
		<script src="<?php echo base_url(); ?>assets/pages/jquery.toastr.js" type="text/javascript"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>
		
		<script>
		var base_url = '<?php echo base_url(); ?>';
		</script>

    </body>
</html>