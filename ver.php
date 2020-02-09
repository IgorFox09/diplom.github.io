<?php
include_once("db.php");
if (isset($_POST['rega'])){
	if(empty($_POST['login'])) {
		echo '<center><br><font color="red">Введите логин!</font></center>';
	}
	elseif (!preg_match("/^\w{3,}$/", $_POST['login'])) {
		echo '<center><br><font color="red">В поле "Логин" введены недопустимые символы! Только буквы, цифры и подчеркивание!</font></center></center>';
	}
	elseif(empty($_POST['pass'])) {
		echo '<center><br><font color="red">Введите пароль!</font></center>';
	}
	elseif (!preg_match("/\A(\w){6,20}\Z/", $_POST['pass'])) {
		echo '<center><br><font color="red">Пароль слишком короткий! Пароль должен быть не менее 6 символов! </font></center>';
	}
	elseif(empty($_POST['password2'])) {
		echo '<center><br><font color="red">Введите подтверждение пароля!</font></center>';
	}
	elseif($_POST['pass'] != $_POST['password2']) {
		echo '<center><br><font color="red">Введенные пароли не совпадают!</font></center>';
	}
	elseif(empty($_POST['email'])) {
		echo '<center><br><font color="red">Введите E-mail! </font></center>';
	}
	elseif (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-
		]+\.)+[a-zA-Z]{2,6}$/", $_POST['email'])) {
		echo '<center><br><font color="red">E-mail имеет недопустимий формат! Например, name@gmail.com! </font></center>';
	}
	elseif (!preg_match("/^[0-9]{10,10}+$/", $_POST['num'])) {
		echo '<center><br><font color="red">Телефон задан в неверном формате</font></center>';
}
else{
	$salt = "admin96";
	$login = $_POST['login'];
	$mdPassword = md5($salt.$_POST['pass']);
	$email = $_POST['email'];
	$rdate = date("d-m-Y в H:i");
	$name = $_POST['name'];
	$number = $_POST['num'];
	$country = $_POST['country_m'];
	if (isset($_POST['radiobutton']))
	{
		if ($_POST['radiobutton']==="rad1") $pol = "Men";
		if ($_POST['radiobutton']==="rad2") $pol = "Women";
	}
	$lastname = $_POST['lastname'];
	$query = ("SELECT id FROM users WHERE login='$login'");
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql) > 0) {
		echo '<center><font color="red">Пользователь с таким логином зарегистрирован!</font></center>';
	}
	else {
		$query2 = ("SELECT id FROM users WHERE email='$email'");
		$sql = mysql_query($query2) or die(mysql_error());
		if (mysql_num_rows($sql) > 0){
			echo '<center><font color="red">Пользователь с таким e-mail уже
			зарегистрирован!</font></center>';
		}
		else{
			$query = "INSERT INTO users (login, pass, email, reg_date,
			name_user, lastname, pol, country, num)
			VALUES ('$login', '$mdPassword', '$email', '$rdate', '$name',
			'$lastname','$pol', '$country', '$number' )";
			$result = mysql_query($query) or die(mysql_error());
					/*setcookie("user_login",$login,time()+3600);
					setcookie("user_check",$salt,time()+3600);
					setcookie("lastname",$lastname,time()+3600);
					setcookie("name",$name,time()+3600);
					setcookie("reg_date",$rdate,time()+3600);
					setcookie("country",$country,time()+3600);
					setcookie("sex",$pol,time()+3600);
					setcookie("number",$number,time()+3600);*/
					echo '<center><font color="green">Вы успешно зарегистрировались!</font><br><a href="index.php">На главную</a></center>';
				}
			}
		}
	}
	?>