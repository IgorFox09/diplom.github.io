<?php
	session_start();
	$salt1 = md5("AdminTheBest"); //Секретный ключ
	if(isset($_COOKIE['user_login']) && $_COOKIE['user_check'] == $salt) {
		$_SESSION['user_login'] = $_COOKIE['user_login'];
	}else {
		session_destroy();
	}

 ?>