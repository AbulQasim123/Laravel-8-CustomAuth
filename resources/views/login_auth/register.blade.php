@extends('login_layouts.layout')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
</head>
<body>
@section('content')
<div class="register-form">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card my-3">
					<div class="card-header"><h3>Register</h3></div>
					<div class="card-body">
						<form action="{{ route('register.post') }}" method="POST">
							@csrf
							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
								<div class="col-md-6">
									<input type="text" id="name" class="form-control" name="name" />
									@if($errors->has('name'))
										<span class="text-danger">{{ $errors->first('name') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="email_address" class="col-md-4 col-form-label text-md-right">Email Address</label>
								<div class="col-md-6">
									<input type="text" id="email_address" class="form-control" name="email" />
									@if($errors->has('email'))
										<span class="text-danger">{{ $errors->first('name') }}</span>
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
								<button type="submit" class="btn btn-primary btn-sm">Register</button>
							</div>
						</form>
						<a class="float-right" href="{{ route('login') }}">Already have an account.</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
</body>
</html>