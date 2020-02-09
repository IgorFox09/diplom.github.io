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
	<title>Изменения</title>
</head>
<body>
	<?php if(isset($_SESSION['login'])): ?>
		<?php
		include_once('include/include/header.php')
		?>
		<table class="edit">
			<tr>
				<td>
					<a href="about.php">
						<img src="img/about.png" alt="" width="100" height="100">
						<p style="height: 20px;">О Компании</p>
					</a>
				</td>
				<td>
					<a href="contact.php">
						<img src="img/contact.png" alt="" width="100" height="100">
						<p style="height: 20px;">Контакты</p>
					</a>
				</td>
				<td>
					<a href="admin.php">
						<img src="img/price.png" alt="" width="100" height="100">
						<p style="height: 20px;">Цены</p>
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="vac.php">
						<img src="img/vacans.png" alt="" width="100" height="100">
						<p style="height: 20px;">Вакансии</p>
					</a>
				</td>
				<td>
					<a href="add.php">
						<img src="img/house.png" alt="" width="100" height="100">
						<p style="height: 20px;">Коттеджи или Дачи</p>
					</a>
				</td>
				<td>
					<a href="edittov.php">
						<img src="img/tovar.png" alt="" width="100" height="100">
						<p style="height: 20px;">Товары</p>
					</a>
				</td>
			</tr>
		</table>
		<?php include ("include/footer.php"); ?>
	<?php else: ?>
		<center><p style="margin: 0 auto;">Информация недоступна,Войдите под своей учетной записью!</p>
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
