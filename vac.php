<?php
session_start();
?>
<?php
include_once('include/functions.php')
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
				$query = 'SELECT * FROM `vacans`';
				$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
				// Выводим результаты в html
				echo "<table style='text-align:center'>\n";
				echo "<tr><td>Ид</td><td>Название</td><td>Информация</td><td>Картинка</td></tr>";
				while ($row=mysql_fetch_array($result)){
					$id=$row[0];
					$name=$row[1];
					$info=$row[2];
					$url=$row[3];
					echo "<tr>
					<td>$id</td>
					<td>$name</td>
					<td>$info</td>
					<td><img src='$url' alt='' width='150' height='120'></td>
				</tr>";
			}
			echo "</table>";
			mysql_free_result($result);
			mysql_close($db);
			?>	
		</div>
		<div style="padding-top: 20px; width: 100%;" class="zayavki">
			<form enctype="multipart/form-data" method="post" action="">
				<table style="text-align: center;" class="vxod1">
					<tr>
						<td></td>
						<td style="font-size: 20px;">Добавление новых вакансий!</td>
						<td></td>
					</tr>
					<tr>
						<td>Название</td>
						<td>Информация</td>
						<td>Картинка</td>
					</tr>
					<tr>
						<td><input type="text" name="nazvanie" value=""></td>
						<td><textarea rows="3" cols="45" name="infotext" value=""></textarea></td>
						<td><p><input type="file" id="fileinput" name="file" ></p></td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" value="Отправить" name="download" class="btn"></td>
					</tr>
					<tr>
						<td></td>
						<td style="font-size: 20px;">Удаление вакансий!</td>
						<td></td>
					</tr>
					<tr>
						<td>Введите ид вакансии для ее удаления!</td>
						<td><center><input type="text" name="del" ></center></td>
						<td><input type="submit" value="Удалить" name="delet" class="btn"></td>
					</tr>
				</table>
			</form>
			<?php
			    // если была произведена отправка формы
			if(isset($_POST['download'])){
				if(isset($_FILES['file'])) {
			      // проверяем, можно ли загружать изображение
					$check = can_upload($_FILES['file']);

					if($check === true){
			        // загружаем изображение на сервер
						$ch = make_upload($_FILES['file']);
						echo $ch;

					}
					else{
			        // выводим сообщение об ошибке
						echo "<strong>$check</strong>";  
					}
				}
			}
			if (isset($_POST['delet'])) {
				if (preg_match("/[^0-9]/", $_POST['del'])) {
					echo "Вводить можно лишь числа!";
				}else {
					$del = make_delete($_POST['del']);
					echo $del;
				}
			}
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
if ($_GET['vxod']!=0){
	session_destroy();
	echo "<script>location.href='index.php';</script>";
}
?>
