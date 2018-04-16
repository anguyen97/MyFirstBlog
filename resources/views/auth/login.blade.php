<!DOCTYPE html>
<html lang="en">
<head>
	<title>Anh - Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('login_assets/images/icons/favicon.ico') }}"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login_assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/animate/animate.css') }}">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/css-hamburgers/hamburgers.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/animsition/css/animsition.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/select2/select2.min.css') }}">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/daterangepicker/daterangepicker.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login_assets/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login_assets/css/main.css') }}">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('login_assets/images/bg-01.jpg');">
			<div class="wrap-login100">
				<div class="card-header">{{ __('Login') }}</div>
				<div class="card-body"> 
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

								@if ($errors->has('email'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

								@if ($errors->has('password'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 offset-md-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
									</label>
								</div>
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Login') }}
								</button>

								<a class="btn btn-link" href="{{ route('password.request') }}">
									{{ __('Forgot Your Password?') }}
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<!--===============================================================================================-->
	<script src="{{ asset('login_assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('login_assets/vendor/animsition/js/animsition.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('login_assets/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('login_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('login_assets/vendor/select2/select2.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('login_assets/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('login_assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('login_assets/vendor/countdowntime/countdowntime.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('login_assets/js/main.js') }}"></script>

</body>
</html>