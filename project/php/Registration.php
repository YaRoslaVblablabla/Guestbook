<?php

	require 'Function/BDconnection.php';

	mysqli_query($MySql, "SET NAMES 'utf8'");

$log 	= trim(htmlspecialchars($_POST['log']));
$pass 	= trim(htmlspecialchars($_POST['pass']));
$hash 	= password_hash($_POST['pass'], PASSWORD_DEFAULT);
$sur	= trim(htmlspecialchars($_POST['sur']));
$name 	= trim(htmlspecialchars($_POST['name']));
$pat 	= trim(htmlspecialchars($_POST['pat']));

$user_log = mysqli_fetch_assoc(mysqli_query($MySql, "SELECT * FROM users WHERE log = '$log'"));

if (mb_strlen($log)<4 or mb_strlen($log)>15) 
	{ 
		echo 'Некоректный логин'; 
		exit();
	}
else if (mb_strlen($pass)<5 or mb_strlen($pass)>12) 
	{ 
		echo 'Некоректный пароль'; 
		exit();
	}
else
	{
		if (isset($_REQUEST['submit']) and empty($user_log)) 
			{
				$query = "INSERT INTO users (log, pass, hash, sur, name, pat) VALUES ('$log', '$pass', '$hash', '$sur', '$name', '$pat')";
				mysqli_query($MySql, $query);

				header('Location: ../html/autorisation.html' );
			}
		else echo "Такой логин уже занят";
	}

?>