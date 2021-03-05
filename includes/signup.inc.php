<?php

if (isset($_POST['signup-submit'])) {

	require 'db.inc.php';

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordRepeat = $_POST['password-repeat'];

	// Check for empty fields
	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=emptyfields&username=" . $username . "&email=" . $email);
		exit();
	}
	// Check for invalid characters in the username and an invalid email
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username) && (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
		header("Location: ../signup.php?error=invalidusernameandemail");	
		exit();
	}
	// Check for an invalid email
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidemail&username=" . $username);	
		exit();
	}
	// Check for invalid characters in the username
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invalidusername&email=" . $email);	
		exit();
	}
	// Check for mismatched passwords
	elseif ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&username=" . $username . "&email=" . $email);
		exit();
	}
	//Check for a unique username that hasn't already been used by another user
	else {
		$sql = "SELECT username FROM users WHERE username=?";
		$stmt = mysqli_stmt_init($connection);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror&username=" . $username . "&email=" . $email);
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			if (mysqli_stmt_num_rows($stmt) > 0) {
				header("Location: ../signup.php?error=usernametaken&email=" . $email);
				exit();
			}
			else {
				$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($connection);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}
				else {
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
					mysqli_stmt_execute($stmt);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($connection);
}
else {
	header("Location: ../signup.php");
}