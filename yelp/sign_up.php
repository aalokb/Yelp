<?php
	include('server.php')
?>

<!DOCTYPE html>
<html>
<head>
<script src="server.js"></script>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<p>Get Started</p>
	<form action="sign_up.php" method="post">
		E-mail: <input type="text" name="email"><br>
	 	Username: <input type="text" name="username"><br>
	 	Password: <input type="password" name="password"><br>
		<input type="submit" name="sign_up_submit" value="Sign Up">
	</form>
</body>
</html>
