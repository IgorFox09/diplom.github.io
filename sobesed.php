<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Play:700,400&amp;subset=cyrillic" rel="stylesheet">
	<title>Собеседования</title>
</head>
<body>
	<?php if(isset($_SESSION['login'])): ?>
		<?php
		include_once('include/include/header.php')
		?>
		<div style="min-height: 500px; width: 100%; font-weight: bold;">
			<div class="zayavki">
				<?php
				include ("db.php");
				$query = 'SELECT * FROM `sobesed`';
				$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
				// Выводим результаты в html
				echo "<table style='text-align:center; margin: 0 auto;'>\n";
				echo "<tr><td>id</td><td>Имя</td><td>Фамилия</td><td>Номер</td><td>Дата</td><td>Вакансия</td></tr>";
				while ($row=mysql_fetch_array($result)){
					$id=$row[0];
					$name=$row[1];
					$lastname=$row[2];
					$num=$row[3];
					$data=$row[4];
					$vacans=$row[5];
					echo "<tr>
					<td>$id</td>
					<td>$name</td>
					<td>$lastname</td>
					<td>$num</td>
					<td>$data</td>
					<td>$vacans</td>
					<td>
						<div class=knop>
							<a href='?sobesed=$id'>Удалить</a>
						</div>
					</td>
					</tr>";
				}
				echo "</table>";
				mysql_free_result($result);
				mysql_close($db);
				?>	
			</div>
		</div>
		<?php include ("include/footer.php"); ?>
	<?php else: ?>
		<center><p style="margin: 0 auto;"> Информация недоступна,Войдите под своей учетной записью!</p>
			<a href="index.php" style="font-size: 20px;">Вход</a></center>
		<?php endif;?>	
	</body>
	</html>
	<?php
	if (isset($_GET['sobesed'])){
		include ("db.php");
		$table = "sobesed";
		$id=$_GET['sobesed'];
		$query="DELETE FROM $table WHERE id=$id";
		$result2 = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
		//mysql_free_result($result2);
		mysql_close($db);
		echo "<script>location.href='sobesed.php';</script>";
	}
	if ($_GET['vxod']!=0){
		session_destroy();
		echo "<script>location.href='index.php';</script>";
	}
	?>