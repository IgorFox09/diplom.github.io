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
	<title>Регистрация</title>
</head>
<body style="background: #211722;">
	<div id="reg">
		<div class="popup_window__title">Регистрация*</div>
		<form action="" method="post">
			<table class="vxod">
				<tr>
					<td>Логин</td>
					<td><input type="text" name="login"></td>
				</tr>
				<tr>
					<td>Пароль</td>
					<td><input type="password" name="pass"></td>
				</tr>
				<tr>
					<td>Подтверждения пароля</td>
					<td><input type="password" name="password2"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td>Имя</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>Фамилия</td>
					<td><input type="text" name="lastname"></td>
				</tr>
				<tr>
					<td>Пол</td>
					<td><input type="radio" size="20" name="radiobutton" value="rad1" checked>Мужской
						<input type="radio" size="20" name="radiobutton" value="rad2">Женский</td>
					</tr>
					<tr>
						<td>Страна:</td>
						<td><select name=country_m size=1 class="select">
							<option value="1" selected>Russia</option>
							<option value="2">USA</option>
							<option value="3">Germany</option>
							<option value="4">Ukraine</option>
							<option value="5">Polska</option>
							<option value="6">Litva</option>
							<option value="7">Belarus</option>
						</select> 
					</td>
				</tr>
				<tr>
					<td>Телефон:</td>
					<td><input type="text" size="20" name="num"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="rega" class="btn" value="Отправить"></td>	
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="naz" class="btn" value="Назад"></td>
				</tr>
			</table>
			<center><br>* Все поля обязательны для заполнения</center>
			<?php include ("ver.php"); ?>
		</form>
	</div>
</body>
</html>
<?php
if(isset($_POST['naz'])){
	echo "<script>location.href='index.php';</script>";
}
/*if(isset($_POST['submit'])){
	$login = $_POST["login"];
	$salt = "admin96";
	$pass = md5($salt.$_POST['pass']);
	$email = $_POST["email"];
	$name = $_POST["name"];
	$lastname = $_POST["lastname"];

	include ("db.php");
	echo "<script>location.href='index.php';</script>";
}*/
?>