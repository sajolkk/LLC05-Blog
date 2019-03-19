<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	Dear {{ $data['name'] }}
	<br>
	<p>Your account created has been successfully. Please click this link for activate your account.</p>
	<a href="{{ route('user.verified',$data['email_verification_token']) }}" class="btn btn-sm btn-primary">Confirm Activate</a>
	<br>
	Thank you
</body>
</html>