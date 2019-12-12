<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<title>dashboard</title>

	<meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin_resources/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin_resources/css/themes.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin_resources/css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin_resources/css/plugins.css') }}">
	@yield('css')
	@yield('floara-styles')
    
	<script src="{{ asset('admin_resources/js/vendor/modernizr.min.js') }}"></script>
</head>
<body>
	@yield('content')

	<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <script src="{{ asset('admin_resources/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_resources/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_resources/js/plugins.js') }}"></script>
    <script src="{{ asset('admin_resources/js/app.js') }}"></script>
    <script type="text/javascript">
    	$.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>

    @yield('scripts')
    @yield('floara_scripts')

</body>
</html>