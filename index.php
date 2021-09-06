<?php

include 'connect.php';

session_start();

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);

	$insert = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
	$succsess = mysqli_query($connection, $insert);
	
	if ($succsess -> num_rows > 0){
		$value = mysqli_fetch_assoc($succsess);
		$_SESSION['username'] = $value['username']; 
		header ("location: site.php");
	} 
	else{
		echo "<script>alert('Wrong Email Or Password!')</script>";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Login</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="pass" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>