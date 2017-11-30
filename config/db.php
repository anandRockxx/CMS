<?php 


$server_name = "localhost";
$user_name = "root";
$users_password = "root_user";
$db_name = "cms";


$con = mysqli_connect($server_name, $user_name, $users_password, $db_name );

if (!$con) {
	die("connection failed" . mysqli_error($con));
}

 ?>