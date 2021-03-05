<?php

if (isset($_POST['login-submit'])) {

	require 'db.inc.php';

	$mailuid = $_POST['mail-uid'];
	$password = $_POST['password'];

	if (empty($mailuid || empty($password))) {
		header("Location: ../index.php?error=emptyfields?mailuid=" . $mailuid);
	}
	else{
		$sql = "SELECT * FROM users WHERE username=? OR email=?";
		$stmt = mysqli_stmt_init($connection);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$passwordCheck = password_verify($password, $row['password']);
				if ($passwordCheck == false) {
					header("Location: ../index.php?error=incorrectpassword");
					exit();
				}
				else if ($passwordCheck == true) {
					session_start();
					$_SESSION['userId'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					header("Location: ../index.php?success");
					exit();
				}
				else{
					header("Location: ../index.php?error=incorrectpassword");
					exit();
				}
			}
			else{
				header("Location: ../index.php?error=nouser2");
				exit();
			}
		}
	}
}
else{
	header("Location: ../index.php");
	exit();
}