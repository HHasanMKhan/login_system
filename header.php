<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<header>

		<?php
		if (isset($_SESSION['username'])) {
			echo '<a href="signup.php">Register</a>
			<form action="includes/logout.inc.php" method="post">
			<button type="submit" name="logout-submit">Logout</button>
			</form>';
		}
		else{
			echo '<form action="includes/login.inc.php" method="post">
			<input type="text" name="mail-uid" placeholder="Username/Email">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" name="login-submit">Login</button>
			</form>';
		}
		?>

	</header>