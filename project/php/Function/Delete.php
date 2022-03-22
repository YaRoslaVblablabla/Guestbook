<?php
	
	require 'BDconnection.php';
	session_start();
	
	$comId = $_GET['id'];
	$user = mysqli_fetch_assoc(mysqli_query($MySql, "SELECT * FROM gb WHERE id = '$comId'"));
	
	if ($user['user_id'] == $_SESSION['user_id']) 
	{
		mysqli_query($MySql, "DELETE FROM `gb` WHERE `gb`.`id` = '$comId'");
	header('location: ../Guestbook.php');
	}
	else header('location: ../Guestbook.php');

?>