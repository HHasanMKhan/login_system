<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "login_system";

$connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$connection) {

die("Connection to the database failed.<br>" . mysqli_connect_error());

}

else{
	echo "Connection to the database is successful.";
}