<?php

	require 'Function/BDconnection.php';

	mysqli_query($MySql, "SET NAMES 'utf8'");
	$log = $_POST['log'];
	$user = mysqli_fetch_assoc(mysqli_query($MySql, "SELECT * FROM users WHERE log = '$log'"));

	session_start();

if (isset($_REQUEST['submit'])) 
{
	if (!empty($user)) 
	{	
		$_SESSION['auth'] = true;
		if (password_verify($_POST['pass'], $user['hash'])) 
			{ 	
				$_SESSION['user_id'] = $user['id'];
				header('Location: Guestbook.php' );
			}
		else echo 'Пароль не подходит';
	}
	else {	echo "Пользователя с таким Логином нет"; }
}

?>