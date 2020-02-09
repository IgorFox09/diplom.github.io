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
	<title>Личный кабинет</title>
</head>
<body>
<div id="lk" >
<div class="popup_window__title">Личный кабинет</div>
	<?php if(isset($_COOKIE['user_login'])): ?>
		<form action="auth.php" method="POST">
			<center>
			<table>
				<tr>
					<td>Логин:</td>
					<td><?php echo /*$_SESSION['login']*/ $_COOKIE['user_login']; ?></td>
				</tr>
				<tr>
					<td>Имя:</td>
					<td><?php echo $_COOKIE['name']; ?></td>
				</tr>
				<tr>
					<td>Фамилия:</td>
					<td><?php echo $_COOKIE['lastname']; ?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?php echo $_COOKIE['email']; ?></td>
				</tr>
				<tr>
					<td>Дата Регистрации:</td>
					<td><?php echo $_COOKIE['reg_date']; ?></td>
				</tr>
				<tr>
					<td>Страна:</td>
					<td><?php echo $_COOKIE['country']; ?></td>
				</tr>
				<tr>
					<td>Пол:</td>
					<td><?php echo $_COOKIE['sex']; ?></td>
				</tr>
				<tr>
					<td>Номер телефона:</td>
					<td><?php echo $_COOKIE['number']; ?></td>
				</tr>
			</table>
			<center><input  type="submit" name="user_logout" class="btn" value="Выйти"></center>
			<input  type="submit" name= "naz" class="btn" value="назад"></center>
			</center>
		</form>
	<?php else: ?>
		<?php include ("price.php"); ?>
		<p> Информация недоступна,Войдите под своей учетной записью!</p>
		<center><a href='#'' rel='login2' class='price' style="font-size: 20px;">Вход</a></center>	
	<?php endif;?>
</div>
</body>
</html>