<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Navbar</title>
	<link rel="stylesheet" href="\assets\css\bootstrap.css">
	<script type="text/javascript" src="\assets\js\jquery.js"></script>
	<script type="text/javascript" src="\assets\js\bootstrap.js"></script>
	<script type="text/javascript" src="\assets\js\mypopper.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="product">My Tutor Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
		@if(Session::has('user'))
			<li class="nav-item dropdown">
				<a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{ Session::get('user')['email'] }}
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="logout">Logout</a>
				</div>
			</li>
		@else
			<li class="nav-item active"><a class="nav-link" href="/login">Login</a></li>
			<li class="nav-item active"><a class="nav-link" href="register">Register</a></li>
		@endif
    </ul>
    
  </div>
</nav>
    @yield('content')
</body>
</html>

      	