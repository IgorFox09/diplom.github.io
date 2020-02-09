<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Play:700,400&amp;subset=cyrillic" rel="stylesheet">
	<title>Заказы</title>
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
				$query = 'SELECT * FROM `zakaz`';
				$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
				// Выводим результаты в html
				echo "<table style='text-align:center'>\n";
				echo "<tr><td>id</td><td>Группа</td><td>Название</td><td>Количе-ство</td><td>Имя</td><td>Фамилия</td><td>Номер</td></tr>";
				while ($row=mysql_fetch_array($result)){
					$id=$row[0];
					$grup=$row[1];
					$naz=$row[2];
					$kol=$row[3];
					$name=$row[4];
					$lastname=$row[5];
					$phone=$row[6];
					echo "<tr>
						<td>$id</td>
						<td>$grup</td>
						<td>$naz</td>
						<td>$kol</td>
						<td>$name</td>
						<td>$lastname</td>
						<td>$phone</td>
						<td>
							<div class=knop>
								<a href='?zay=$id'>Удалить</a>
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
	if (isset($_GET['zay'])){
		include ("db.php");
		$table = "zakaz";
		$id=$_GET['zay'];
		$query="DELETE FROM $table WHERE id=$id";
		$result2 = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
		//mysql_free_result($result2);
		mysql_close($db);
		echo "<script>location.href='zayavki.php';</script>";
	}
	if ($_GET['vxod']!=0){
		session_destroy();
		echo "<script>location.href='index.php';</script>";
	}
	?>