<?php
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(E_ALL);
	$MySql = mysqli_connect("localhost", "tester", "P@ssw0rd123","test");
	if(mysqli_connect_errno()){
		echo "Ошибка в пдключениии к базе ( ".mysqli_connect_errno()." ): ". mysqli_connect_error();
		exit();
	}
	mysqli_query($MySql, "SET NAMES 'utf8'");
?>