<?php

include 'connect.php';

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = md5($_POST['password']);
	
	$insert = "SELECT * FROM users WHERE email = '$email'";
	$succsess = mysqli_query($connection, $insert);
	
	if ($succsess -> num_rows > 0){
		echo "<script>alert('You have entered an existing email.')</script>";
	}
	else{	
		$insert = "INSERT INTO users (username, email, pass)
				   VALUES ('$username','$email','$pass')";
		$succsess = mysqli_query($connection, $insert);
		
		if (!$succsess) {
			echo "<script>alert('Whoops Error')</script>";
		} else {
			echo "<script>alert('Registration successfull')</script>";
			$username = "";
			$email = "";
			$_POST['password'] = "";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Register</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>