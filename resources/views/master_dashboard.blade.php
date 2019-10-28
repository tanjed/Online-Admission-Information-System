<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('dashboard/plugins/images/favicon.png')}}">
    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('dashboard/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{URL::to('dashboard/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{URL::to('dashboard/plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{URL::to('dashboard/plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{URL::to('dashboard/plugins/bower_components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('dashboard/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- animation CSS -->
    <link href="{{URL::to('dashboard/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{URL::to('dashboard/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{URL::to('dashboard/css/colors/default.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header">

<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>


@yield('content')



<script src="{{ URL::to('dashboard/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{URL::to('dashboard/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{URL::to('dashboard/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
<!--slimscroll JavaScript -->
<script src="{{URL::to('dashboard/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{URL::to('dashboard/js/waves.js')}}"></script>
<!--Counter js -->
<script src="{{URL::to('dashboard/plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
<script src="{{URL::to('dashboard/plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>
<!-- chartist chart -->
<script src="{{URL::to('dashboard/plugins/bower_components/chartist-js/dist/chartist.min.js')}}"></script>
<script src="{{URL::to('dashboard/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
<!-- Sparkline chart JavaScript -->
<script src="{{URL::to('dashboard/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{URL::to('dashboard/js/custom.min.js')}}"></script>
<script src="{{URL::to('dashboard/js/dashboard1.js')}}"></script>
<script src="{{URL::to('dashboard/plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>
</body>

</html>
