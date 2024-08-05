<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Online Shop :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
		{{-- <link rel="stylesheet" href="{{asset('css/custom.css')}}"> --}}
		<link rel="stylesheet" href="{{asset('bootstrap-5/bootstrap.min.css')}}">

<style>
body{
    background-image: url("../img/login_background.jpg");
    background-size: cover;
    position: relative;
}


body:before{
    content: "";
    width: 100%;
    height: 100vh;
    background: rgba(73, 116, 130, 0.9);
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0.8;
}
h1{ 
    color:#fff;
    padding: 0 0 30px; 
}
a:hover{ text-decoration: none;}
.form-horizontal{
    padding: 60px 40px 55px 40px;
    margin-top: 40px;
    background: #fff;
    border-radius: 10px;
}
.form-horizontal:before{
    content: "\f007";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    width: 100px;
    height: 100px;
    line-height: 96px;
    border-radius: 50%;
    border: 4px solid #fff;
    background: #14a3aa;
    font-size: 40px;
    color: #fff;
    text-align: center;
    margin: 0 auto;
    position: absolute;
    top: -10px;
    left: 0;
    right: 0;
}
.form-horizontal .heading{
    display: block;
    font-size: 28px;
    color: #597886;
    text-transform: capitalize;
    text-align: center;
    margin-bottom: 20px;
}
.form-horizontal .form-group{
    margin: 0 0 30px 0;
    position: relative;
}
.form-horizontal .form-group:last-child{ margin: 0; }
.form-horizontal .form-control{
    height: 50px;
    border: 2px solid #cbe9ea;
    border-radius: 5px;
    box-shadow: none;
    padding: 0 20px 0 26%;
    font-size: 16px;
    font-weight: bold;
    color: #94abb6;
    position: relative;
    transition: all 0.3s ease 0s;
}
.form-horizontal .form-control:focus{
    box-shadow: none;
    outline: 0 none;
}
.form-horizontal .control-label{
    width: 25%;
    height: 46px;
    line-height: 46px;
    background: #f5ffff;
    padding: 0;
    font-size: 16px;
    font-weight: bold;
    color: #94abb6;
    text-transform: capitalize;
    text-align: center;
    border-right: 2px solid #cbe9ea;
    position: absolute;
    top: 2px;
    left: 2px;
    z-index: 1;
}
.form-horizontal .btn,
.form-horizontal .btn:focus{
    width: 100%;
    height: 50px;
    line-height: 50px;
    padding: 0 30px;
    background: #14a3aa;
    border: none;
    border-radius: 6px;
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    text-transform: uppercase;
    position: relative;
}
.form-horizontal .btn:hover{ background: #14a3aa; }
.form-horizontal .btn:before{
    content: "\f084";
    font-family: "Font Awesome 5 Free"; font-weight: 900;
    position: absolute;
    top: 0;
    left: 30px;
    font-size: 24px;
    color: #fff;
}
.form-horizontal .signup,
.form-horizontal .forgot-pass{
    display: inline-block;
    font-size: 17px;
    font-weight: bold;
    color: #14a3aa;
}
.form-horizontal .forgot-pass{
    float: right;
    color: #58aebc;
}
@media only screen and (max-width: 990px){
    .form-horizontal:before{ top: -50px; }
}
@media only screen and (max-width: 480px){
    .form-horizontal{ padding: 60px 20px 40px 20px; }
    .form-horizontal .control-label{ font-size: 12px; }
}
</style>
	</head>
	<body class="">
		<div class="login-form">
			<!-- /.login-logo -->
			<div class="container">
				<div class="row justify-content-center">
				
						<div class="col-md-offset-5 col-md-6" style="margin: 12rem 0">
								<form action="{{route('admin.auth')}}" method="post" class="form-horizontal">
									@csrf
										<span class="heading">Online Shop</span>
										<div class="form-group">
												<label class="control-label" for="exampleInputName2">your email</label>
												<input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1">
												@error('email')
												<span class="text-danger">
													{{$message}}
												</span>
												@enderror
										</div>
										<div class="form-group">
												<label class="control-label" for="exampleInputName2">password</label>
												<input name="password" type="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror">
												@error('password')
												<span class="text-danger">
													{{$message}}
												</span>
												@enderror
										</div>
										<div class="form-group">
												<button type="submit" class="btn btn-default">login</button>
										</div>
										<div class="form-group">
												<a href="#" class="forgot-pass">Forgot password?</a>
										</div>
								</form>
								<div class="row justify-content-center mt-2">
									<div class="col-md-12">
										@include('admin.alertMessage')
									</div>
									</div>
						</div>
						
				</div>
        
		</div>

			{{-- <div class="card card-outline card-primary">
			  	<div class="card-header text-center">
					<a href="#" class="h3">Administrative Panel</a>
			  	</div>
			  	<div class="card-body">
					<p class="login-box-msg">Sign in to start your session</p>
					<form action="{{route('admin.auth')}}" method="post">
						@csrf
				  		<div class="input-group mb-3">
							<input type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
									
					  			</div>
							</div>
						
				  		</div>
							@error('email')
							<span class="text-danger">
								{{$message}}
							</span>
							@enderror

				
				  		<div class="input-group mb-3">
							<input type="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-lock"></span>
									
					  			</div>
							</div>
					
				  		</div>
							@error('password')
							<span class="text-danger">
									{{$message}}
							</span>
								@enderror
				
				  		<div class="row">
							<!-- <div class="col-8">
					  			<div class="icheck-primary">
									<input type="checkbox" id="remember">
									<label for="remember">
						  				Remember Me
									</label>
					  			</div>
							</div> -->
							<!-- /.col -->
							<div class="col-4">
					  			<button type="submit" class="btn btn-primary btn-block">Login</button>
							</div>
							<!-- /.col -->
				  		</div>
					</form>
		  			<p class="mb-1 mt-3">
				  		<a href="forgot-password.html">I forgot my password</a>
					</p>					
			  	</div>
			  	<!-- /.card-body -->
			</div> --}}
			<!-- /.card -->
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('js/adminlte.min.js')}}"></script>
		<script src="{{asset('bootstrap-5/bootstrap.js')}}"></script>
		<script>
				setTimeout(() => {
				$("#alert-box").fadeOut('slow');
			}, 3000);

		</script>
		<!-- AdminLTE for demo purposes -->
		{{-- <script src="{{asset('js/demo.js')}}"></script> --}}
	</body>
</html>