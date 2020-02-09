<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Play:700,400&amp;subset=cyrillic" rel="stylesheet">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<title>Админское меню</title>
</head>
<body>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.spoiler_links').click(function(){
				$(this).parent().children('div.spoiler_body').toggle('normal');
				return false;
			});
		});
	</script>
	<?php if(isset($_SESSION['login'])): ?>
		<?php
		include_once('include/include/header.php')
		?>
		<div style="min-height: 500px; width: 100%; font-weight: bold;">
			<div class="spoiler">
				<a href="" class="spoiler_links">Коттеджи</a>
				<div class="spoiler_body">
					<form action="auth.php" method="post">
						<?php
						include ("db.php");
						$query = 'SELECT * FROM `stroit`';
						$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
				// Выводим результаты в html
						echo "<table class='vxod'>\n";
						echo "<tr><td>id</td><td>Название</td><td>Цена</td></tr>";
						while ($row=mysql_fetch_array($result)){
							$id=$row[0];
							$group=$row[1];
							$name=$row[2];
							$price=$row[8];
							if ($group == "kot") {
								echo "<tr><td>$id</td><td>$name</td><td><input type='text' name='$id' value='$price'></td></tr>";
							}
						}
						echo "</table>";
						mysql_free_result($result);
						mysql_close($db);
						?>
						<center><input type='submit' name='kott' value='Обновить' class='btn'></center>
					</form>
				</div>
			</div>
			<div class="spoiler">
				<a href="" class="spoiler_links">Дачи</a>
				<div class="spoiler_body">
					<form action="auth.php" method="post">
						<?php
						include ("db.php");
						$query = 'SELECT * FROM `stroit`';
						$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
				// Выводим результаты в html
						echo "<table class='vxod'>\n";
						echo "<tr><td>id</td><td>Название</td><td>Цена</td></tr>";
						while ($row=mysql_fetch_array($result)){
							$id=$row[0];
							$group=$row[1];
							$name=$row[2];
							$price=$row[8];
							if ($group == "dach") {
								echo "<tr><td>$id</td><td>$name</td><td><input type='text' name='$id' value='$price'></td></tr>";
							}
						}
						echo "</table>";
						mysql_free_result($result);
						mysql_close($db);
						?>
						<center><input type='submit' name='dach1' value='Обновить' class='btn'></center>
					</form>
				</div>
			</div>
			<div class="spoiler">
				<a href="" class="spoiler_links">ФУНДАМЕНТНЫЕ БЛОКИ</a>
				<div class="spoiler_body">
					<form action="auth.php" method="post">
						<?php
						include ("db.php");
						$query = 'SELECT * FROM `block`';
						$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
				// Выводим результаты в html
						echo "<table class='vxod'>\n";
						echo "<tr><td>id</td><td>Название</td><td>Цена</td></tr>";
						while ($row=mysql_fetch_array($result)){
							$id=$row[0];
							$name=$row[1];
							$price=$row[6];
							echo "<tr><td>$id</td><td>$name</td><td><input type='text' name='$id' value='$price'></td></tr>";
							
						}
						echo "</table>";
						mysql_free_result($result);
						mysql_close($db);
						?>
						<center><input type='submit' name='block1' value='Обновить' class='btn'></center>
					</form>
				</div>
			</div>
			<div class="spoiler">
				<a href="" class="spoiler_links">ФУНДАМЕНТНЫЕ ПОДУШКИ</a>
				<div class="spoiler_body">
					<form action="auth.php" method="post">
						<?php
						include ("db.php");
						$query = 'SELECT * FROM `poduchki`';
						$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
				// Выводим результаты в html
						echo "<table class='vxod'>\n";
						echo "<tr><td>id</td><td>Название</td><td>Цена</td></tr>";
						while ($row=mysql_fetch_array($result)){
							$id=$row[0];
							$name=$row[1];
							$price=$row[6];
							echo "<tr><td>$id</td><td>$name</td><td><input type='text' name='$id' value='$price'></td></tr>";
							
						}
						echo "</table>";
						mysql_free_result($result);
						mysql_close($db);
						?>
						<center><input type='submit' name='poduchki1' value='Обновить' class='btn'></center>
					</form>
				</div>
			</div>
			<div class="spoiler">
				<a href="" class="spoiler_links">БЕТОН ТОВАРНЫЙ</a>
				<div class="spoiler_body">
					<form action="auth.php" method="post">
						<?php
						include ("db.php");
						$query = 'SELECT * FROM `beton`';
						$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
				// Выводим результаты в html
						echo "<table class='vxod'>\n";
						echo "<tr><td>id</td><td>Название</td><td>Цена</td></tr>";
						while ($row=mysql_fetch_array($result)){
							$id=$row[0];
							$name=$row[1];
							$price=$row[7];
							echo "<tr><td>$id</td><td>$name</td><td><input type='text' name='$id' value='$price'></td></tr>";
							
						}
						echo "</table>";
						mysql_free_result($result);
						mysql_close($db);
						?>
						<center><input type='submit' name='beton1' value='Обновить' class='btn'></center>
					</form>
				</div>
			</div>
		</div>
		<?php include ("include/footer.php"); ?>
	<?php else: ?>
		<center><p style="margin: 0 auto;"> Информация недоступна,Войдите под своей учетной записью!</p>
			<a href="index.php" style="font-size: 20px;">Вход</a></center>
		<?php endif;?>
		<?php
		if ($_GET['vxod']!= 0){
			session_destroy();
			echo "<script>location.href='index.php';</script>";
		}
		?>	
	</body>
	</html>