<!DOCTYPE html>
<html lang="id_ID.utf8">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="CMS">
        <meta name="author" content="Muhammad Adjiassalmi">
        <title>CMS</title>
		<!-- Favion -->
		<!-- <link rel="icon" type="image/png" sizes="16x16" href="#"> -->
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.css') }}">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.css') }}">
		<!-- Ionicons -->
		<link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.css') }}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.css') }}">
		<!-- Pace style -->
		<link rel="stylesheet" href="{{ asset('adminlte/plugins/pace/pace.css') }}">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bree+Serif">
	</head>

	<body class="hold-transition login-page">
		<section class="main-section">
			@yield('content')
		</section>
	</body>

	<!-- jQuery 3 -->
	<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.js') }}"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="{{ asset('adminlte/bower_components/jquery-ui/jquery-ui.js') }}"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.js') }}"></script>
	<!-- PACE -->
	<script src="{{ asset('adminlte/plugins/pace/pace.js') }}"></script>

	<script type="text/javascript">
		$(document).ajaxStart(function() { 
			Pace.restart(); 
		});
	</script>

	<script type="text/javascript">
		$("#alert").fadeTo(2000, 500).slideUp(500, function(){
			$("#alert").slideUp(500);
		});
    </script>
</html>
