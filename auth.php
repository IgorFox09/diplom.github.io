<?php
session_start();
if(isset($_POST['login1'])){
	$login = $_POST['login'];
	$salt = "admin96";
	$pass = md5($salt.$_POST['pass']);
	include ("db.php");
	$query = "select * from users where login = '".$login."' and pass = '".$pass."'";
	$result = mysql_query($query);
	$num_row = mysql_num_rows($result);
	if($num_row > 0){
		if($row =mysql_fetch_assoc($result)){
			$_SESSION['user_login'] = $row['login'];
			//$_SESSION['pass'] = $row['pass'];
			setcookie("user_login",$row['login'],time()+3600);
			setcookie("user_check",$salt1,time()+3600);
			setcookie("email",$row['email'],time()+3600);
			setcookie("lastname",$row['lastname'],time()+3600);
			setcookie("name",$row['name_user'],time()+3600);
			setcookie("reg_date",$row['reg_date'],time()+3600);
			setcookie("country",$row['country'],time()+3600);
			setcookie("sex",$row['pol'],time()+3600);
			setcookie("number",$row['num'],time()+3600);
			echo "<script>location.href='index.php';</script>";
		}
	} else{
		echo "<script>location.href='index.php';</script>";
	}
}
if(isset($_POST['vxod'])){
	$login = $_POST['login'];
	$salt = "admin996";
	$pass = md5($salt.$_POST['pass']);
	include ("db.php");
	$query = "select * from users where login = '".$login."' and pass = '".$pass."'";
	$result = mysql_query($query);
	$num_row = mysql_num_rows($result);
	if($num_row > 0){
		if($row =mysql_fetch_assoc($result)){
			$_SESSION['login'] = $row['login'];
			setcookie("user_login",$row['login'],time()+3600);
			setcookie("user_check",$salt1,time()+3600);
			setcookie("lastname",$row['lastname'],time()+3600);
			setcookie("email",$row['email'],time()+3600);
			setcookie("name",$row['name_user'],time()+3600);
			setcookie("reg_date",$row['reg_date'],time()+3600);
			setcookie("country",$row['country'],time()+3600);
			setcookie("sex",$row['pol'],time()+3600);
			setcookie("number",$row['num'],time()+3600);
			echo "<script>location.href='editor.php';</script>";
		}
	} else{
		echo "<script>location.href='index.php';</script>";
	}
}
if(isset($_POST['user_logout'])){
	session_destroy();
	setcookie ("user_login", "", time() - 1);
	setcookie ("user_check", "", time() - 1);
	setcookie("lastname","",time()-1);
	setcookie("name","",time()-1);
	setcookie("reg_date","",time()-1);
	setcookie("country","",time()-1);
	setcookie("sex","",time()-1);
	setcookie("number","",time()-1);
	echo "<script>location.href='index.php';</script>";
}
if(isset($_POST['naz'])){
	echo "<script>location.href='index.php';</script>";
}
if(isset($_POST['sobesed'])){
	$name = $_COOKIE['name'];
	$lastname = $_COOKIE['lastname'];
	$num = $_COOKIE['number'];
	$data = $_POST['data'];
	$vac = $_POST['vacans'];
	if (isset($name) && isset($lastname) && isset($num)) {
		include ("db.php");
		$query = "INSERT INTO sobesed (name, lastname, num, data, vacans)
		VALUES ('$name', '$lastname', '$num', '$data', '$vac')";
		$result = mysql_query($query) or die(mysql_error());
		mail($mail,
				"Заявка с сайта «OOO ВЫТЕГРА»", 
				"Ваша заявка на вакнсию:".$vacans." находится на рассмотрении. \n Наш отдел кадров свяжется с вами в ближаешее время.",
				"From: 	zakaz@fadeev.balplanet.ru \r\n");
		echo "<script>location.href='vacans.php';</script>";
	}
	else{
		echo "<script>location.href='vacans.php#vac';</script>";
	}
}
if(isset($_POST['block'])){
	$name = $_COOKIE['name'];
	$lastname = $_COOKIE['lastname'];
	$group = 'ФУНДАМЕНТНЫЕ БЛОКИ';
	$num = $_COOKIE['number'];
	$naz = $_POST['naz1'];
	$kolvo = $_POST['kolvo'];
	if (isset($name) && isset($lastname) && isset($num)) {
		include ("db.php");
		$query = "INSERT INTO zakaz (`group`, naz, kolvo, name, lastname, num)
		VALUES ('$group', '$naz', '$kolvo', '$name', '$lastname', '$num')";
		$result = mysql_query($query) or die(mysql_error());
		mail($mail,
				"Заявка с сайта «OOO ВЫТЕГРА»", 
				"Ваша заявка на:".$naz." находится на рассмотрении. \n Наши менеджеры свяжутся с вами в ближаешее время.",
				"From: 	zakaz@fadeev.balplanet.ru \r\n");
		echo "<script>location.href='tovar.php';</script>";
	}
	else{
		echo "<script>location.href='tovar.php';</script>";
	}
}
if(isset($_POST['poduchki'])){
	$name = $_COOKIE['name'];
	$group = 'ФУНДАМЕНТНЫЕ ПОДУШКИ';
	$lastname = $_COOKIE['lastname'];
	$num = $_COOKIE['number'];
	$naz = $_POST['naz1'];
	$kolvo = $_POST['kolvo'];
	if (isset($name) && isset($lastname) && isset($num)) {
		include ("db.php");
		$query = "INSERT INTO zakaz (`group`, naz, kolvo, name, lastname, num)
		VALUES ('$group', '$naz', '$kolvo', '$name', '$lastname', '$num')";
		$result = mysql_query($query) or die(mysql_error());
		//mysql_free_result($result);
		mysql_close($db);
		mail($mail,
				"Заявка с сайта «OOO ВЫТЕГРА»", 
				"Ваша заявка на:".$naz." находится на рассмотрении. \n Наши менеджеры свяжутся с вами в ближаешее время.",
				"From: 	zakaz@fadeev.balplanet.ru \r\n");
		echo "<script>location.href='tovar.php';</script>";
	}
	else{
		echo "<script>location.href='tovar.php';</script>";
	}
}
if(isset($_POST['beton'])){
	$name = $_COOKIE['name'];
	$group = "БЕТОН ТОВАРНЫЙ";
	$lastname = $_COOKIE['lastname'];
	$num = $_COOKIE['number'];
	$naz = $_POST['naz1'];
	$kolvo = $_POST['kolvo'];
	if (isset($name) && isset($lastname) && isset($num)) {
		include ("db.php");
		$query = "INSERT INTO zakaz (`group`, naz, kolvo, name, lastname, num)
		VALUES ('$group', '$naz', '$kolvo', '$name', '$lastname', '$num')";
		$result = mysql_query($query) or die(mysql_error());
		mail($mail,
				"Заявка с сайта «OOO ВЫТЕГРА»", 
				"Ваша заявка на:".$naz." находится на рассмотрении. \n Наши менеджеры свяжутся с вами в ближаешее время.",
				"From: 	zakaz@fadeev.balplanet.ru \r\n");
		echo "<script>location.href='tovar.php';</script>";
	}
	else{
		echo "<script>location.href='tovar.php';</script>";
	}
}
if(isset($_POST['calc'])){
	$name = $_COOKIE['name'];
	include ("db.php");
	$id = $_GET['id'];
	$query = "SELECT * FROM `stroit` WHERE `id` = ".$id." ";
	$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
	while ($row=mysql_fetch_array($result)){
		$group=$row[1];
		$naz=$row[2];
		if($group=="kot"){
			$group="КОТТЕДЖ";
		}else{
			$group="Дача";
		}
	}
	$mail = $_COOKIE['email'];
	$lastname = $_COOKIE['lastname'];
	$num = $_COOKIE['number'];
	$kolvo = 1;
	if (isset($name) && isset($lastname) && isset($num)) {
		$query = "INSERT INTO zakaz (`group`, naz, kolvo, name, lastname, num)
		VALUES ('$group', '$naz', '$kolvo', '$name', '$lastname', '$num')";
		$result = mysql_query($query) or die(mysql_error());
		mail($mail,
				"Заявка с сайта «OOO ВЫТЕГРА»", 
				"Ваша заявка на:".$naz." находится на рассмотрении. \n Наши менеджеры свяжутся с вами в ближаешее время.",
				"From: 	zakaz@fadeev.balplanet.ru \r\n");
		echo "<script>location.href='product.php?id=".$id."';</script>";
	}
	else{
		echo "<script>location.href='product.php';</script>";
	}
	mysql_close($db);
}
if (isset($_POST['kott'])) {
	include ("db.php");
	$table = "stroit";
	$query = 'SELECT * FROM stroit';
	$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
	while ($row=mysql_fetch_array($result)){
		$id=$row[0];
		$grup=$row[1];
		$price = $_POST[$id];
		if ($grup =="kot") {
			$query="UPDATE $table SET price='$price' WHERE id=$id";
			$result2 = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
		}	
	}
	mysql_close($db);
	echo "<script>location.href='admin.php';</script>";
}
if (isset($_POST['dach1'])) {
	include ("db.php");
	$table = "stroit";
	$query = 'SELECT * FROM stroit';
	$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
	while ($row=mysql_fetch_array($result)){
		$id=$row[0];
		$grup=$row[1];
		$price = $_POST[$id];
		if ($grup =="dach") {
			$query="UPDATE $table SET price='$price' WHERE id=$id";
			$result2 = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
		}	
	}
	mysql_close($db);
	echo "<script>location.href='admin.php';</script>";
}
if(isset($_POST['block1'])){
	include ("db.php");
	$table = "block";
	$query = 'SELECT * FROM block';
	$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
	while ($row=mysql_fetch_array($result)){
		$id=$row[0];
		$price = $_POST[$id];
		$query="UPDATE $table SET price='$price' WHERE id=$id";
		$result2 = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
	}
	mysql_close($db);
	echo "<script>location.href='admin.php';</script>";
}
if(isset($_POST['poduchki1'])){
	include ("db.php");
	$table = "poduchki";
	$query = 'SELECT * FROM poduchki';
	$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
	while ($row=mysql_fetch_array($result)){
		$id=$row[0];
		$price = $_POST[$id];
		$query="UPDATE $table SET price='$price' WHERE id=$id";
		$result2 = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
	}
	mysql_close($db);
	echo "<script>location.href='admin.php';</script>";
}
if(isset($_POST['beton1'])){
	include ("db.php");
	$table = "beton";
	$query = 'SELECT * FROM beton';
	$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
	while ($row=mysql_fetch_array($result)){
		$id=$row[0];
		$price = $_POST[$id];
		$query="UPDATE $table SET price='$price' WHERE id=$id";
		$result2 = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
	}
	mysql_close($db);
	echo "<script>location.href='admin.php';</script>";
}
?>