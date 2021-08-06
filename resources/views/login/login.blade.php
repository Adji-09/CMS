@extends('login.base')

@section('content')
	<div class="row">
		@if(Session::get('alert'))
			<div class="alert alert-danger" id="alert">
				<div style="text-align: center;">{{Session::get('alert')}}</div>
			</div>
		@endif
		@if(Session::get('success'))
			<div class="alert alert-success" id="alert">
				<div style="text-align: center;">{{Session::get('success')}}</div>
			</div>
		@endif
		
		<div class="login-box">
			<!-- <div class="login-logo">
				<img src="http://149.129.244.198:8009/IRS/assets/images/irs_logo.png" style="height: 70px;">
			</div> -->
			<div class="login-box-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<form action="{{ url('/loginPost') }}" method="post">
					<input name="_token" type="hidden" value="{{ csrf_token() }}">
					<div class="form-group has-feedback">
						<input type="text" id="username" name="username" class="form-control" placeholder="Username" autofocus="autofocus" required="required">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="pull-right col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
						</div>
					</div>
				</form>
			</div>
			<div class="lockscreen-footer text-center">
				Copyright &copy; 2021 <b>CMS</b>
				<br> All rights reserved<br>
				<b>Version</b> 1.0.0
			</div>
		</div>
	</div>
@endsection
