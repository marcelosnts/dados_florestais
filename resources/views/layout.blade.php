<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Gestão Florestal</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for blank page layout" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo url('/'); ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo url('/'); ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo url('/'); ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo url('/'); ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo url('/'); ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo url('/'); ?>/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo url('/'); ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo url('/'); ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo url('/'); ?>/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo url('/'); ?>/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo url('/'); ?>/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper"> 
            <!-- INCLUDE HEADER -->
            @include('header')

            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                
                <!-- INCLUDE  SIDEBAR -->
                @include('sidebar')

                <!-- INCLUDE CONTENT -->
                <div class="page-content-wrapper">
                    @yield('content')
                </div>

            </div>
            <!-- END CONTAINER -->
            <!-- INCLUDE FOOTER -->
            @include('footer')
        </div>
        <!--[if lt IE 9]>
        <script src="./assets/global/plugins/respond.min.js"></script>
        <script src="./assets/global/plugins/excanvas.min.js"></script> 
        <script src="./assets/global/plugins/ie8.fix.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo url('/'); ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo url('/'); ?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo url('/'); ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo url('/'); ?>/assets/pages/scripts/form-input-mask.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo url('/'); ?>/assets/pages/scripts/components-date-time-pickers.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo url('/'); ?>/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <script src="<?php echo url('/') ?>/js/scriptPersonalizado.js"></script>

        <script type="text/javascript">
            var APP_URL = {!! json_encode(url('/')) !!}
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATKq1ZTyxnn6aQCeEc1FZi4VdzjtUPsXA&callback=initMap" async defer> </script>
    </body>
</html>