<?php
require "header.php";
?>

<main>
	<h1>Sign Up</h1>

	<?php

	if (isset($_GET['error'])) {
		if ($_GET['error'] == "emptyfields") {
			echo "<p>Please fill in all the fields.</p>";
		}

		elseif ($_GET['error'] == "shortusername") {
			echo "<p>Username is too short.</p>";
		}

		elseif ($_GET['error'] == "shortpassword") {
			echo "<p>Password is too short.</p>";
		}

		elseif ($_GET['error'] == "invalidusernameandemail") {
			echo "<p>Please enter a valid username and email.</p>";
		}

		elseif ($_GET['error'] == "invalidemail") {
			echo "<p>Please enter a valid email address.</p>";
		}

		elseif ($_GET['error'] == "invalidusername") {
			echo "<p>Please enter a valid username.</p>";
		}

		elseif ($_GET['error'] == "passwordcheck") {
			echo "<p>Passwords do not match.</p>";
		}

		elseif ($_GET['error'] == "usernametaken") {
			echo "<p>This username is taken.</p>";
		}
	}
	if (isset($_GET['signup'])) {
		if ($_GET['signup'] == "success") {
			echo "<p>You have successfully signed up.";
		}
	}

	/*if (isset($_GET['username'])) {
		$username = $_GET['username'];
	}
	else {
		$username = "";
	}*/
	

	?>
	<form action="includes/signup.inc.php" method="post">
		<input type="text" name="username" placeholder="Username"<?php /* echo 'value="' . $username . '"';*/ ?> autocomplete="off">
		<input type="text" name="email" placeholder="Email Address" autocomplete="off">
		<input type="password" name="password" placeholder="Password" autocomplete="off">
		<input type="password" name="password-repeat" placeholder="Re-type Password" autocomplete="off">
		<button type="submit" name="signup-submit">Sign Up</button>
	</form>
</main>

<?php
require "footer.php";
?>