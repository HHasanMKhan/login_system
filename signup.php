<?php
require "header.php";
?>

<main>
	<h1>Sign Up</h1>
	<form action="includes/signup.inc.php" method="post">
		<input type="text" name="username" placeholder="Username" autocomplete="off">
		<input type="text" name="email" placeholder="Email Address" autocomplete="off">
		<input type="password" name="password" placeholder="Password" autocomplete="off">
		<input type="password" name="password-repeat" placeholder="Re-type Password" autocomplete="off">
		<button type="submit" name="signup-submit">Sign Up</button>


	</form>
</main>

<?php
require "footer.php";
?>