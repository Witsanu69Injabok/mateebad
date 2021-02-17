<!DOCTYPE html>
<html>
<?php date_default_timezone_set('Asia/Bangkok');  ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NaNa Mart</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/static/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo BASE_URL; ?>static/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo BASE_URL; ?>static/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



    <!-- jQuery -->
    <script src="<?php echo BASE_URL; ?>/static/plugins/jquery/jquery.min.js"></script>


  <!-- FANCY BOX -->

  <script type="text/javascript" src="<?php echo BASE_URL; ?>/static/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>/static/fancybox/jquery.fancybox.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/static/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

    <!-- DATE TIME Picker -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/static/components/jquery.datetimepicker.css" />
    <!--    date picker-->
    <script src="<?php echo BASE_URL; ?>/static/components/jquery.datetimepicker.full.js"></script>


    <script type="text/javascript" src="<?php echo BASE_URL; ?>/static/components/jquery.ui.timepicker.js?v=0.3.3"></script>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/static/components/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />




    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

    <style>
    @import url('https://fonts.googleapis.com/css?family=Bai+Jamjuree&display=swap');
    </style>
    <style>
    body {
        font-family: 'Bai Jamjuree', sans-serif;
        font-size: 16px;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {

        font-family: 'Bai Jamjuree', sans-serif;

    }

    div {
        font-family: 'Bai Jamjuree', sans-serif;
        font-size: 16px;
    }
    </style>
 <script type="text/javascript">
        $(document).ready(function() {


            $('a[id^="pop6060"]').fancybox({
                maxWidth: 600,
                maxHeight: 600,
                fitToView: false,
                width: 600,
                height: 600,
                'padding': 0,
                closeBtn: true,
                'autoScale': true,
                'transitionIn': 'none',
                'transitionOut': 'none',

                'type': 'iframe',

                afterClose: function() {
                    parent.location.href = parent.location.href;
                },

            });
            $('a[id^="popSearch"]').fancybox({
                maxWidth: 600,
                maxHeight: 600,
                fitToView: false,
                width: '70%',
                height: '70%',
                'padding': 0,
                closeBtn: true,
                'autoScale': true,
                'transitionIn': 'none',
                'transitionOut': 'none',

                'type': 'iframe',

                afterClose: function() {
                    //     parent.location.href = parent.location.href;
                },

            });

            $('a[id^="popView"]').fancybox({
                maxWidth: 1000,
                maxHeight: 600,
                fitToView: false,
                width: '90%',
                height: '90%',
                'padding': 0,
                closeBtn: true,
                'autoScale': true,
                'transitionIn': 'none',
                'transitionOut': 'none',

                'type': 'iframe',

                afterClose: function() {
                    //   parent.location.href = parent.location.href;
                },

            });


            $('a[id^="popSearch"]').fancybox({
                maxWidth: 1000,
                maxHeight: 600,
                fitToView: false,
                width: '70%',
                height: '70%',
                'padding': 0,
                closeBtn: true,
                'autoScale': true,
                'transitionIn': 'none',
                'transitionOut': 'none',

                'type': 'iframe',

                afterClose: function() {
                    parent.location.href = parent.location.href;
                },

            });


            $('a[id^="pop1000x600"]').fancybox({
                maxWidth: '98%',
                maxHeight: '98%',
                fitToView: false,
                width: '98%',
                height: '98%',
                'padding': 0,
                closeBtn: true,
                'autoScale': true,
                'transitionIn': 'none',
                'transitionOut': 'none',

                'type': 'iframe',

                afterClose: function() {
                    parent.location.href = parent.location.href;
                },

            });


            $('a[id^="ViewOnly1x6"]').fancybox({
                maxWidth: '98%',
                maxHeight: '98%',
                fitToView: false,
                width: '98%',
                height: '98%',
                'padding': 0,
                closeBtn: true,
                'autoScale': true,
                'transitionIn': 'none',
                'transitionOut': 'none',

                'type': 'iframe',

                afterClose: function() {
                    //  parent.location.href = parent.location.href;
                },

            });

            $('a[id^="ViewOnly300"]').fancybox({
                maxWidth: '98%',
                maxHeight: '98%',
                fitToView: false,
                 width: 640,
   height: 360,
                'padding': 0,
                closeBtn: true,
               // 'autoScale': true,
                'transitionIn': 'none',
                'transitionOut': 'none',

                'type': 'iframe',

                afterClose: function() {
                    //  parent.location.href = parent.location.href;
                },

            });
            $('a[id^="delete"]').fancybox({
                'width': '20%',
                'height': '20%',
                onStart: function() {
                    return window.confirm('Do you want to delete?');
                },
                onClosed: function() {
                    parent.location.reload(true);
                }
            });


            $('a[id^="popRefresh"]').fancybox({
                maxWidth: 1000,
                maxHeight: 600,
                fitToView: false,
                width: 1000,
                height: 600,
                'padding': 0,
                closeBtn: true,
                'autoScale': true,
                'transitionIn': 'none',
                'transitionOut': 'none',

                'type': 'iframe',

                afterClose: function() {
                    parent.location.href = parent.location.href;
                },

            });


            /*
             onStart		:	function() {
             return window.confirm('Continue?');
             },
             onCancel	:	function() {
             alert('Canceled!');
             },
             onComplete	:	function() {
             alert('Completed!');
             },
             onCleanup	:	function() {
             return window.confirm('Close?');
             },
             onClosed	:	function() {
             alert('Closed!');
             }
             */

        });
    </script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo BASE_URL; ?>dashboard" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <!-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a> -->
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <!-- <div class="media">
              <img src="<?php echo BASE_URL; ?>/static/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> -->
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="<?php echo BASE_URL; ?>/static/dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="<?php echo BASE_URL; ?>/static/dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <!-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a> -->
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-success elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?php echo BASE_URL; ?>/static/images/bad01.jpg" alt="FooDex V1.0"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">mateebad.com</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo BASE_URL; ?>/static/dist/img/user.png" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Urs. <?php echo @$_SESSION['user_name'] ; ?></a>
                        <a href="#" class="d-block">lv. <?php echo @$_SESSION['user_level'] ; ?></a>

                        <p>
                            <a href="<?php echo BASE_URL ?>login/logout">Logout</a>
                        </p>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>/static/index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>/static/index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>/static/index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  v3</p>
                </a>
              </li>
            </ul>
          </li>
           -->
<!-- -------------------------------------------------------------------------------------------------------------- -->
<?php if(@$_SESSION['user_level']  == -1 or @$_SESSION['user_level']  == 1) { ?>
                        <li class="nav-item has-treeview">
                            <?php if ($_SESSION["user_level"] < 3) { ?>
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>
                                    กำหนดค่าเริ่มต้น
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>


                            <?php } ?>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/shops" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ร้านค้า</p>
                                    </a>
                                </li>

                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/cards" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ลงทะเบียนบัตร</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/users" class="nav-link">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                        <p>ผู้ใช้งานระบบ</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/cardsvalue" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>เติมเงิน</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/percent" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>กำหนดเปอร์เซ็นต์</p>
                                    </a>
                                </li>

                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/membershare" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>อัตราค่าหุ้น</p>
                                    </a>
                                </li>

                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/shoptype" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ประเภทร้านค้า</p>
                                    </a>
                                </li>
                              
                            </ul>
                        </li>
<?php } ?>
<!-- -------------------------------------------------------------------------------------------------------------- -->
<?php if(@$_SESSION['user_level']  == -1 or @$_SESSION['user_level']  == 1  or @$_SESSION['user_level']  == 2) { ?>                    
        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-store-alt"></i>
                                <p>
                                    ร้านค้าสวัสดิการ
                                    <i class="fas fa-angle-left right"></i>
                                    <!-- <span class="badge badge-info right">6</span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/wh" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>คลังเก็บ</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">

                            <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/unit" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>หน่วยนับ</p>
                                    </a>
                            </li>
                                </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/membertype" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ประเภทสมาชิก</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/members" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>สมาชิก</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/saler" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ผู้ขาย/ร้านค้า</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/producttype" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ประเภทสินค้า</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/products" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>สินค้า</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/productreceive" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ข้อมูลรับสินค้าเข้า</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>receive/RcFindByBarcodeFrm" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ค้นหาการรับสินค้า</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/wd" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ข้อมูลเบิก-ขายสินค้า</p>
                                    </a>
                                </li>
                            </ul>


                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/shift" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ข้อมูลกะ</p>
                                    </a>
                                </li>
                            </ul>

                            <!-- <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/sales" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ข้อมูลบิลขาย</p>
                                    </a>
                                </li>
                            </ul> -->
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/saletransaction" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>รายละเอียดการเบิกสินค้า</p>
                                    </a>
                                </li>
                            </ul>


                        </li>
                        <li class="nav-item has-treeview">
                            <!-- <a href="#" class="nav-link">
                                <i class="fas fa-store"></i>
                                <p>
                                    ศูนย์อาหาร
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a> -->
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/menu" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>เมนูอาหาร</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/ordertransaction" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>รายการขาย</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>stock/chk" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>นับสต็อกทั้งหมด</p>
                                    </a>
                                </li>
                            </ul>


                            
                        </li>
 <?php } ?>                       
<!-- -------------------------------------------------------------------------------------------------------------- -->
<?php if(@$_SESSION['user_level']  == -1 or @$_SESSION['user_level']  == 1  or @$_SESSION['user_level']  == 2 or @$_SESSION['user_level']  == 3 or @$_SESSION['user_level']  == 4) { ?>                    

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>
                                    รายงานร้านสวัสดิการ
                                    <i class="fas fa-angle-left right"></i>
                                    <!-- <span class="badge badge-info right">6</span> -->
                                </p>
                            </a>



                            <ul class="nav nav-treeview">
                            <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>products" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>รายการสินค้าทั้งหมด</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>sendbalance" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ส่งยอด</p>
                                    </a>
                                </li>

                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>reports/rptProductEmp" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ฝากขาย</p>
                                    </a>
                                </li>

                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>reports/rptReceive" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>รายงานการรับเข้า</p>
                                    </a>
                                </li>

                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>reports/rptSaleDetail" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>รายงานการขาย</p>
                                    </a>
                                </li>

                               <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>reports/rptSale2Detail" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>รายงานการขาย(ฝากขาย)</p>
                                    </a>
                                </li>  



                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>reports/rptSale" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>รายงานการขายแบบละเอียด</p>
                                    </a>
                                </li>

                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>reports/rStockBalanceWH" class="nav-link">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                        <p>รายงานคงเหลือแยกคลังเก็บ</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>reports/rStockBalance" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>รายงานสต็อกสินค้าคงเหลือ</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>reports/rptTransferFrm" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>รายงานการโอนย้ายสินค้า</p>
                                    </a>
                                </li>
                              <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>reports/rptIsDelete" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ยกเลิกบิล</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>reports/rptIsComplete" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>ไม่ปิดการขาย</p>
                                    </a>
                                </li>
                                 <!--  <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/membershare" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>*******</p>
                                    </a>
                                </li>

                                <li class="nav-item" style="padding-left:10px;">
                                    <a href="<?php echo BASE_URL; ?>admin/index/shoptype" class="nav-link">
                                        <i class="fas fa-file-import"></i>
                                        <p>******</p>
                                    </a>
                                </li> -->

                            </ul>
                        </li>

 <?php }  ?>

<!-- -------------------------------------------------------------------------------------------------------------- -->




                       <!-- <li class="nav-item">
                            <a href="<?php echo BASE_URL; ?>cstock" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>นับสต็อก</p>
                            </a>
                        </li> -->
                       <!--   <li class="nav-item">
                            <a href="<?php echo BASE_URL; ?>admin/index/cardsvalue" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>เติมเงิน</p>
                            </a>
                        </li> -->

                        <!-- <li class="nav-item">
                            <a href="<?php echo BASE_URL; ?>admin/index/cardsvalue" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>เติมเงิน บัตรพนักงาน</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL; ?>cardvalue/frm1/1" class="nav-link">
                                <i class="fas fa-hand-holding-usd"></i>
                                <p>เติมเงินพนักงานประจำ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL; ?>cardvalue/frm1/2" class="nav-link">
                                <i class="fas fa-hand-holding-usd"></i>
                                <p>เติมเงินพนักงานชั่วคราว</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="<?php echo BASE_URL; ?>cardvalue/frm1/3" class="nav-link">
                            <i class="fas fa-hand-holding-usd"></i>
                                <p>เติมเงินบัตรศูนย์อาหาร</p>
                            </a>
                        </li> -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Main content -->
        <div calss="containner">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- Content Wrapper. Contains page content -->
                            <div class="content-wrapper">


                                <!-- Main content -->
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <br>