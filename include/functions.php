<?php
function can_upload($file){
	// если имя пустое, значит файл не выбран
	if($file['name'] == '')
		return 'Вы не выбрали файл.';
	
	/* если размер файла 0, значит его не пропустили настройки 
	сервера из-за того, что он слишком большой */
	if($file['size'] == 0)
		return 'Файл слишком большой.';
	
	// разбиваем имя файла по точке и получаем массив
	$getMime = explode('.', $file['name']);
	// нас интересует последний элемент массива - расширение
	$mime = strtolower(end($getMime));
	// объявим массив допустимых расширений
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
	
	// если расширение не входит в список допустимых - return
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';
	
	return true;
}

function make_upload($file){	
	// формируем уникальное имя картинки: случайное число и name
	//echo "upload/$name";
	if (empty($_POST['nazvanie'])) {
		return '<center><br><font color="red">Введите название!</font></center>';
	}elseif (empty($_POST['infotext'])) {
		return '<center><br><font color="red">Введите текст в поле Информация!</font></center>';
	}else{
		include ("db.php");
		$name = mt_rand(0, 10000) . $file['name'];
		$nazvanie = $_POST['nazvanie'];
		$infotext = $_POST['infotext'];
		$query = "INSERT INTO vacans (`name`, info, url)
		VALUES ('$nazvanie', '$infotext', 'upload/$name')";
		$result = mysql_query($query) or die(mysql_error());
		mysql_free_result($result);
		mysql_close($db);
		copy($file['tmp_name'], 'upload/' . $name);
		return "<center>Информация успешно загружена!</center>";
	}
}
function make_delete($id) {
	if ($id != '') {
		include ("db.php");
		$query = "SELECT * FROM `vacans` WHERE `id` = ".$id." ";
		$result = mysql_query($query);
		$num_row = mysql_num_rows($result);
		if($num_row > 0){
			if($row =mysql_fetch_assoc($result)){
				unlink($row['url']);
			}
			$query = "DELETE FROM `vacans` WHERE id =".$id." ";
			$result = mysql_query($query) or die(mysql_error());
			mysql_close($db);
			return "<center>Информация успешно удалена!</center>";	
		}else{
			return "<center>Данной вакансии не найдено в базе данных!</center>";
		}
	}else {
		return "<center>Введите число в соответствующее поле!</center>";
	}
}
function make_add($file1,$file2,$file3,$file4){	
	include ("db.php");
	$name1 = mt_rand(0, 10000) . $file1['name'];
	$name2 = mt_rand(0, 10000) . $file2['name'];
	$name3 = mt_rand(0, 10000) . $file3['name'];
	$name4 = mt_rand(0, 10000) . $file4['name'];
	$grop = $_POST['groop'];
	$names = $_POST['names'];
	if ($grop=='Дача') {
		$grop = 'dach';
	}else{
		$grop = 'kot';
	}
	$area = $_POST['area'];
	$living = $_POST['living'];
	$floor = $_POST['floor'];
	$time = $_POST['time1'];
	$price = $_POST['price'];
	$size = $_POST['size'];
	$query = "INSERT INTO stroit (`group`, name, area, living, floor, `time`, size, price, img1, img2, img3, img4)
	VALUES ('$grop', '$names', '$area', '$living', '$floor', '$time', '$size', '$price', 'upload/$name1', 'upload/$name2', 'upload/$name3', 'upload/$name4')";
	$result = mysql_query($query) or die(mysql_error());
	mysql_close($db);
	copy($file1['tmp_name'], 'upload/' . $name1);
	copy($file2['tmp_name'], 'upload/' . $name2);
	copy($file3['tmp_name'], 'upload/' . $name3);
	copy($file4['tmp_name'], 'upload/' . $name4);
	return "<center>Информация успешно загружена!</center>";
}
function make_del ($id){
	if ($id != '') {
		include ("db.php");
		$query = "SELECT * FROM `stroit` WHERE `id` = ".$id." ";
		$result = mysql_query($query);
		$num_row = mysql_num_rows($result);
		if($num_row > 0){
			if($row =mysql_fetch_assoc($result)){
				unlink($row['img1']);
				unlink($row['img2']);
				unlink($row['img3']);
				unlink($row['img4']);
			}
			$query = "DELETE FROM `stroit` WHERE id =".$id." ";
			$result = mysql_query($query) or die(mysql_error());
			mysql_close($db);
			return "<center>Информация успешно удалена!</center>";	
		}else{
			return "<center>Данной строки не найдено в базе данных!</center>";
		}
	}else {
		return "<center>Введите число в соответствующее поле!</center>";
	}
}
function make_addtov($file1){	
	include ("db.php");
	$name = mt_rand(0, 10000) . $file1['name'];
	$grop = $_POST['groop'];
	$names = $_POST['names'];
	if ($grop=='Блок') {
		$table = 'block';
	}else{
		$table = 'poduchki';
	}
	$sizel = $_POST['sizel'];
	$sizeb = $_POST['sizeb'];
	$sizeh = $_POST['sizeh'];
	$mass = $_POST['mass'];
	$price = $_POST['price'];
	$query = "INSERT INTO $table (name, sizel, sizeb, sizeh, mass, price, img)
	VALUES ('$names', '$sizel', '$sizeb', '$sizeh', '$mass', '$price', 'upload/$name')";
	$result = mysql_query($query) or die(mysql_error());
	mysql_close($db);
	copy($file1['tmp_name'], 'upload/' . $name);
	return "<center>Информация успешно загружена!</center>";
}
if (isset($_POST['table'])) {
	if ($_POST['table'] == 1) {
		$tab = 'block';
	}else {
		$tab = 'poduchki';
	}
	include ("../db.php");
	$query = "SELECT * FROM $tab ";
	$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
	$sf = "<tr><td>ИД</td><td>Название</td><td>Цена</td></tr>";
	while ($row=mysql_fetch_array($result)){
		$id = $row[0];
		$name=$row[1];
		$price=$row[6];
		$sf .= "<tr><td>$id</td><td>$name</td><td>$price</td></tr>";
	}
	echo $sf;
}
function delet_usl($id){
	if ($id != '') {
		$tab = 'block';
		if ($_POST['groop'] == 2) {
			$tab = 'poduchki';
		}
		include ("db.php");
		$query = "SELECT * FROM $tab WHERE `id` = ".$id." ";
		$result = mysql_query($query);
		$num_row = mysql_num_rows($result);
		if($num_row > 0){
			if($row =mysql_fetch_assoc($result)){
				unlink($row['img']);
			}
			$query = "DELETE FROM $tab WHERE id =".$id." ";
			$result = mysql_query($query) or die(mysql_error());
			mysql_close($db);
			return "<center>Информация успешно удалена!</center>";	
		}else{
			return "<center>Данной строки не найдено в базе данных!</center>";
		}
	}else {
		return "<center>Введите число в соответствующее поле!</center>";
	}
}
function addbeton(){
	include ("db.php");
	$names = $_POST['names1'];
	$class1 = $_POST['class1'];
	$pod = $_POST['pod'];
	$moroz = $_POST['moroz'];
	$water = $_POST['water'];
	$mass1 = $_POST['mass1'];
	$price = $_POST['price1'];
	$query = "INSERT INTO beton (name, class, pod, moroz, water, mass, price)
	VALUES ('$names', '$class1', '$pod', '$moroz', '$water', '$mass1', 'price')";
	$result = mysql_query($query) or die(mysql_error());
	mysql_close($db);
	return "<center>Информация успешно загружена!</center>";
}
function betdel($id) {
	if ($id != '') {
		include ("db.php");
		$query = "SELECT * FROM beton WHERE `id` = ".$id." ";
		$result = mysql_query($query);
		$num_row = mysql_num_rows($result);
		if($num_row > 0){
			if($row =mysql_fetch_assoc($result)){
				$query = "DELETE FROM beton WHERE id =".$id." ";
				$result = mysql_query($query) or die(mysql_error());
				mysql_close($db);
				return "<center>Информация успешно удалена!</center>";	
			}
		}else{
			return "<center>Данной строки не найдено в базе данных!</center>";
		}
	}else {
		return "<center>Введите число в соответствующее поле!</center>";
	}
}
/*function calc () {
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
		$lastname = $_COOKIE['lastname'];
		$num = $_COOKIE['number'];
		$kolvo = 1;
		if (isset($name) && isset($lastname) && isset($num)) {
			$query = "INSERT INTO zakaz (`group`, naz, kolvo, name, lastname, num)
			VALUES ('$group', '$naz', '$kolvo', '$name', '$lastname', '$num')";
			$result = mysql_query($query) or die(mysql_error());
			//echo "<script>location.href='product.php?id=".$id."';</script>";
			if (mail($_COOKIE['email'],
				"Заявка с сайта «OOO ВЫТЕГРА»", 
				"Выполнен заказ на расчет:".$naz." Кем: ".$name." ".$lastname." ",
				"From: 	zakaz@fadeev.balplanet.ru \r\n")){ 
				return "Сообщение успешно отправлено"; 
			} else { 
				return "При отправке сообщения возникли ошибки";
			}
		}
		else{
			echo "<script>location.href='product.php';</script>";
		}
		mysql_close($db);
	}
}*/

?>
