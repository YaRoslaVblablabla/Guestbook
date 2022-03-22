<?php
	
	require 'Function/BDconnection.php';
	
	date_default_timezone_set('Europe/Moscow');
	$txt = $_POST['txt'];
	$date = date('Y-m-d H:i:s');
	
	session_start();

	$userid = $_SESSION['user_id'];

	$query1 = "SELECT * FROM users WHERE id = '$userid'";
	$authUser = mysqli_fetch_assoc(mysqli_query($MySql, $query1));
	$userName = $authUser['name'];

	if (isset($_REQUEST['submit'])) 
	{
		$query = "INSERT INTO gb (user_id, name, mess, datee) VALUES ('$userid', '$userName', '$txt', '$date')";
		mysqli_query($MySql, $query);
		header("Location: {$_SERVER['PHP_SELF']}");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>

<div class="container gb">
	<h2>Добавьте комментарий</h2>
	<form action='' method="post">
		<h3>
			<?php echo 'Имя пользователя - '.$userName; ?>
		</h3>
		<h3>введите сообщение<br>
			<label for="text" placeholder='Введите соощение'></label>
			<textarea name='txt'></textarea>
		</h3>
		<button name="submit" class="btn btn-success">Написать</button>
	</form>
</div>
	<hr>

</body>
</html>

<?php
	
	$query1 = "SELECT * FROM gb";
	$result = mysqli_query($MySql, $query1) or die(mysqli_error($MySql));
	for ($data = []; $row =  mysqli_fetch_assoc($result); $data[] = $row);
	$result = '';
	
	foreach ($data as $elem) : ?>

		<div class="container gb">
			<h3>Имя: <?= $elem['name'];  ?><br> Дата: <?= $elem['datee']; 
			session_start(); 
			$_SESSION['auth_com'] = $elem['user_id'];
			?></h3><br>
			<div class="asd">
				<p> <?= $elem['mess'];  ?> </p>
			</div>
			<div class="del-upd">
				<p><a class="upd" href="Function/Update.php?id=<?= $elem['id'] ?>">Update</a></p>
				<p><a class="del" href="Function/Delete.php?id=<?= $elem['id'] ?>">Delete</a></p>
			</div>
		</div>

	<?php endforeach; 
?>


