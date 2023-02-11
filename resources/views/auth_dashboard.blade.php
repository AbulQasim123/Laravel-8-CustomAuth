@extends('login_layouts.layout')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
</head>
<body>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-3">
                <div class="card-header"><h4>{{ __('My Tutor Blog - Dashboard') }}</h4></div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @if(Session::has('user'))
                    <h1>Welcome</h1> <b>{{Session::get('user')['email']}}</b>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
