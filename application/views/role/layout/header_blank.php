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
    