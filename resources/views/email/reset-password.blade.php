<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  	{{-- Bootstrap-5 --}}
		<link rel="stylesheet" href="{{asset('bootstrap-5/bootstrap.min.css')}}">

  <title>Reset Password</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; font-size:16px;">

  <p>Hello, {{$formData['user']->name}}</p>

  <h2>You have requested to change password:</h2>

  <p>Please click the link given below to reset password.</p>


<a href="{{route('front.resetPassword',$formData['token'])}}">Click Here</a>

<p>Thanks</p>


</body>
</html>




