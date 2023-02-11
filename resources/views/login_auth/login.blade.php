@extends('login_layouts.layout')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
@section('content')
<div class="login-form">
  	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card my-3">
					<div class="card-header"><h3>Login</h3></div>
					<div class="card-body">
						@if(Session::has('fail'))
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								{{ Session::get('fail') }}
							</div>
						@endif
						@if(Session::has('success'))
							<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								{{ Session::get('success') }}
							</div>
						@endif
						<form action="{{ route('login.post') }}" method="POST">
							@csrf
							<div class="form-group row">
								<label for="email_address" class="col-md-4 col-form-label text-md-right">Email Address</label>
								<div class="col-md-6">
									<input type="text" id="email_address" class="form-control" name="email" value="{{ old('email') }}" />
									@if($errors->has('email'))
										<span class="text-danger">{{ $errors->first('email') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
								<div class="col-md-6">
									<input type="password" id="password" class="form-control" name="password" />
									@if($errors->has('password'))
										<span class="text-danger">{{ $errors->first('password') }}</span>
									@endif
								</div>
							</div>
							
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary btn-sm">
									Login
								</button>
                          	</div>
						</form>
						<a class="float-right" href="{{ route('register') }}">Register an account.</a>
					</div>
				</div>
			</div>
		</div>
  	</div>
</div>
@endsection
</body>
</html>