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
	<title>Редактирование информации блока «Контакты»</title>
</head>
<body>
	<?php if(isset($_SESSION['login'])): ?>
		<?php
		include_once('include/include/header.php')
		?>
		<div style="min-height: 300px; width: 100%; font-weight: bold; padding-top: 30px;">
			<div class="zayavki">
				<form action="" method="POST">
				<div>
					<textarea name="editor3"><?php echo $text ?></textarea>
					<script>
						CKEDITOR.replace( 'editor3' );
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
	if(empty($_POST['editor3'])) {
		echo '<center><br><font color="red">Введите текст!</font></center>';
	}
	else {
		$text = $_POST['editor3'];
		$query = "UPDATE `reda` SET `text1`= '$text1' where id=2";
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
