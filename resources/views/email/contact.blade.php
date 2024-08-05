<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  	{{-- Bootstrap-5 --}}
		<link rel="stylesheet" href="{{asset('bootstrap-5/bootstrap.min.css')}}">

  <title>Contact Email</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; font-size:16px;">

  <h2>You have received a contact email</h2>

  <p>Name: {{$mailData['name']}}</p>
  <p>Email: {{$mailData['email']}}</p>
  <p>Subject: {{$mailData['subject']}}</p>

  <p>Message:</p>
  <p>{{$mailData['subject']}}</p>




</body>
</html>




