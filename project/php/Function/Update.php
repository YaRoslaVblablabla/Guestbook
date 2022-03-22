<?php
	require 'BDconnection.php';

	$comId = $_GET['id'];
	$user = mysqli_fetch_assoc(mysqli_query($MySql, "SELECT * FROM gb WHERE id = '$comId'"));

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>

<div class="container">
	<h2>Измените комментарий</h2>
	<form action='' method="post">
		<p>
			<label for="text">Текст:</label>
			<textarea name='mess'></textarea>
		</p>
		<button name="submit" class="btn btn-success">Написать</button>
	</form>
</div>
	<hr>

</body>
</html>

<?php

		echo  $user['user_id'];

	$mess = $_POST['mess'];

if ( isset($_REQUEST['submit'])) 
{
	mysqli_query($MySql, "UPDATE gb SET `mess` = '$mess' WHERE `gb`.`id` = '$comId'");
	header("location: ../Guestbook.php");
}

?>