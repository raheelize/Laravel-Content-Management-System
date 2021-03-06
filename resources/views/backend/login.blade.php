<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN DASHBOARD | WEBSITE NAME</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/adminstyle.css">	
</head>
<body>

	<div class="logo text-center">
		<a href="https://www.aemagazine.pk"><img src="images/logo-02.png" width="50%"></a>
	</div>
	<div class="login-box">
		<form action="/login" method="post"> 
			<div class="form-group">
				<label>Username or Email Address</label>
				<input type="text" class="form-control" name="username" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" required>
			</div>
			<div class="form-group">
				<label for="remember"><input type="checkbox" name="remember" id="remember"> <span class="remember">Remember Me</span></label>
				<input type="submit" class="btn btn-info pull-right" value="Log In">
			</div>
		</form>
	</div>

	<div class="more-links">
		<p>
			<a href="#">Lost your password?</a> 
			<a href="#" class="pull-right">← Back to Site</a>
		</p>
	</div>

<style>

	
</style>

</body>
</html>	