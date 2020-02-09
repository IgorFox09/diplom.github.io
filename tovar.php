<?php include ("include/session.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.countdown.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="js/popup.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/css?family=Play:700,400&amp;subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<title>Товары</title>
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
	<?php include ("include/header.php"); ?>
	<div id="content">
		<div class="vra">
			<a name="vac">-Товары-</a>
		</div>
		<div class="usl">
			<div class="spoiler">
				<a href="" class="spoiler_links">Фундаментные блоки</a>
				<div class="spoiler_body">
					<table class="tov" border="1" cellpadding="5">
						<tr>
							<td rowspan="2">Картинка</td>
							<td rowspan="2">Изделие</td>
							<td colspan="3">Размеры (см)</td>
							<td rowspan="2">Масса (кг)</td>
							<td rowspan="2">Цена оптовая (руб.)</td>
						</tr>
						<tr>
							<td>L</td>
							<td>B</td>
							<td>H</td>
						</tr>
						<?php
						include ("db.php");
						$table = "block";
						$query = "SELECT * FROM ".$table." ";
						$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
						while ($row=mysql_fetch_array($result)){
							$id = $row[0];
							$name=$row[1];
							$sizel=$row[2];
							$sizeb=$row[3];
							$sizeh=$row[4];
							$mass=$row[5];
							$price=$row[6];
							$img=$row[7];
							echo "<tr>";
							echo "<td style='padding: 5px;'><img style='width: 160px; height: 106px;' src='".$img."'></td>";
							echo "<td>".$name."</td>";
							echo "<td>".$sizel."</td>";
							echo "<td>".$sizeb."</td>";
							echo "<td>".$sizeh."</td>";
							echo "<td>".$mass."</td>";
							echo "<td>".$price."</td>";
							echo "</tr>";
						}
						mysql_free_result($result);
						mysql_close($db);
						?>
					</table>
					<div style="padding-top: 20px;">
						<?php if(isset($_SESSION['user_login']) || isset($_SESSION['login'])): ?>	
							<a href='#'' rel='block' class='price' ><input type='submit' class='btn' value='Заказ'></a>
						<?php else: ?>
							<a href='#'' rel='login' class='price' ><input type='submit' class='btn' value='Заказ''></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="spoiler">
				<a href="" class="spoiler_links">Фундаментные подушки</a>
				<div class="spoiler_body">
					<table class="tov" border="1" cellpadding="5">
						<tr>
							<td rowspan="2">Картинка</td>
							<td rowspan="2">Изделие</td>
							<td colspan="3">Размеры (см)</td>
							<td rowspan="2">Масса (кг)</td>
							<td rowspan="2">Цена оптовая (руб.)</td>
						</tr>
						<tr>
							<td>L</td>
							<td>B</td>
							<td>H</td>
						</tr>
						<?php
						include ("db.php");
						$table = "poduchki";
						$query = "SELECT * FROM ".$table." ";
						$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
						while ($row=mysql_fetch_array($result)){
							$id = $row[0];
							$name=$row[1];
							$sizel=$row[2];
							$sizeb=$row[3];
							$sizeh=$row[4];
							$mass=$row[5];
							$price=$row[6];
							$img=$row[7];
							echo "<tr>";
							echo "<td style='padding: 5px;'><img style='width: 160px; height: 106px;' src='".$img."'></td>";
							echo "<td>".$name."</td>";
							echo "<td>".$sizel."</td>";
							echo "<td>".$sizeb."</td>";
							echo "<td>".$sizeh."</td>";
							echo "<td>".$mass."</td>";
							echo "<td>".$price."</td>";
							echo "</tr>";
						}
						mysql_free_result($result);
						mysql_close($db);
						?>
					</table>
					<div style="padding-top: 20px;">
						<?php if(isset($_SESSION['user_login']) || isset($_SESSION['login'])): ?>
							<a href='#'' rel='poduchki' class='price' ><input type='submit' class='btn' value='Заказ'></a>
						<?php else: ?>
							<a href='#'' rel='login' class='price' ><input type='submit' class='btn' value='Заказ''></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="spoiler">
				<a href="" class="spoiler_links">Бетон товарный</a>
				<div class="spoiler_body">
					<table class="tov" border="1" cellpadding="5">
						<tr>
							<td>Изделие</td>
							<td>Класс бетона</td>
							<td>Подвижность</td>
							<td>Морозо-стойкость</td>
							<td>Водоне-проница-емость</td>
							<td>Масса (кг)</td>
							<td>Цена оптовая (руб.)</td>
						</tr>
						<?php
						include ("db.php");
						$table = "beton";
						$query = "SELECT * FROM ".$table." ";
						$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
						while ($row=mysql_fetch_array($result)){
							$id = $row[0];
							$name=$row[1];
							$class=$row[2];
							$pod=$row[3];
							$moroz=$row[4];
							$water=$row[5];
							$mass=$row[6];
							$price=$row[7];
							echo "<tr>";
							echo "<td>".$name."</td>";
							echo "<td>".$class."</td>";
							echo "<td>".$pod."</td>";
							echo "<td>".$moroz."</td>";
							echo "<td>".$water."</td>";
							echo "<td>".$mass."</td>";
							echo "<td>".$price."</td>";
							echo "</tr>";
						}
						mysql_free_result($result);
						mysql_close($db);
						?>
					</table>
					<div style="padding-top: 20px;">
						<?php if(isset($_SESSION['user_login']) || isset($_SESSION['login'])): ?>
							<a href='#'' rel='beton' class='price' ><input type='submit' class='btn' value='Заказ'></a>
						<?php else: ?>
							<a href='#'' rel='login' class='price' ><input type='submit' class='btn' value='Заказ''></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php include ("price.php"); ?>
		</div>
	</div>
	<?php include ("include/footer.php"); ?>
</body>