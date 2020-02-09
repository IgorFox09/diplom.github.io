<?php
session_start();
?>
<?php
include_once('include/content.php')
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Play:700,400&amp;subset=cyrillic" rel="stylesheet">
	<title>Редактирование информации блока «О КОМПАНИИ»</title>
</head>
<body>
	<?php if(isset($_SESSION['login'])): ?>
		<?php
		include_once('include/include/header.php')
		?>
		<div style="min-height: 500px; width: 100%; font-weight: bold;">
			<div class="zayavki">
				<form action="" method="POST">
					<div style="margin: 0 auto; padding-top: 25px; padding-bottom: 25px;
					font-family: 'Play', sans-serif;
					font-size: 20px;
					font-weight: bold;
					text-align: center;">
					<label for="uname">Введите первый заголовок: </label>
					<input type="text" name="zag1" value="<?php echo $zag1 ?>" size="50">
				</div>
				<div>
					<textarea name="editor1"><?php echo $text1 ?></textarea>
					<script>
						CKEDITOR.replace( 'editor1' );
					</script>
				</div>
				<div style="margin: 0 auto; padding-top: 25px; padding-bottom: 25px;
				font-family: 'Play', sans-serif;
				font-size: 20px;
				font-weight: bold;
				text-align: center;">
				<label for="uname">Введите второй заголовок: </label>
				<input type="text" name="zag2" value="<?php echo $zag2 ?>" size="50">
			</div>
			<div>
				<textarea name="editor2"><?php echo $text2 ?></textarea>
				<script>
					CKEDITOR.replace( 'editor2' );
				</script>
			</div>
			<div style="padding-top: 20px;">
				<input type="submit" name="reda" class="btn">
			</div>
		</form>
	</div>
</div>
<?php
if(isset($_POST['reda'])){
	include ("db.php");
	if(empty($_POST['zag1'])) {
		echo '<center><br><font color="red">Введите первый заголовок!</font></center>';
	}
	elseif(empty($_POST['zag2'])) {
		echo '<center><br><font color="red">Введите второй заголовок!</font></center>';
	}
	elseif(empty($_POST['editor1'])) {
		echo '<center><br><font color="red">Введите первый текст!</font></center>';
	}
	elseif(empty($_POST['editor2'])) {
		echo '<center><br><font color="red">Введите второй текст!</font></center>';
	}
	else {
		$zag1 = $_POST['zag1'];
		$zag2 = $_POST['zag2'];
		$text1 = $_POST['editor1'];
		$text2 = $_POST['editor2'];
		$query = "UPDATE `reda` SET `zag1`= '$zag1',`text1`= '$text1',`zag2`='$zag2',`text2`='$text2' where id=1";
		mysql_query($query) or die('Запрос не удался: ' . mysql_error());
		echo "<p><center>Данные обновлены!</center></p>";
	}
	mysql_close($db);
}
?>
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
