<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('/assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('/assets/css/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('/assets/css/demo.css') }}" rel="stylesheet" />

    <!-- Include Required Prerequisites
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />-->

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('/assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />

    <!--<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/assets/css/bootstrap-datetimepicker.min.css') }}">-->

    @yield('head')
</head>
<body>

<div class="wrapper">

    @yield('body')

</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{ asset('/assets/js/jquery-1.10.2.js ') }}" type="text/javascript"></script>
	<script src="{{ asset('/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ asset('/assets/js/bootstrap-checkbox-radio-switch.js') }}"></script>

	<!--  Charts Plugin -->
	<script src="{{ asset('/assets/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('/assets/js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0T9gQbX89EwR1v1ojSV6WNbwk6nvCVqU&libraries=places"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ asset('/assets/js/light-bootstrap-dashboard.js') }}"></script>

    <!--<script type="text/javascript" src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>-->

    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{ asset('/assets/js/demo.js') }}"></script>


<script type="text/javascript">

    $(function() {
        // $('#datetimepicker1').datetimepicker({
        //   language: 'pt-BR'
        //});
       // $('input[name="daterange"]').daterangepicker();
    });

</script>


    @yield('script')

</html>
