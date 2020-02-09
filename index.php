<?php include ("include/session.php"); ?>
<?php include ("include/content.php"); ?>
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
	<title>ООО «СТРОИТЕЛЬНАЯ КОМПАНИЯ ВЫТЕГРА»</title>
</head>
<body>
	<?php include ("include/header.php"); ?>
	<div id="content">
		<div class="uslugi">
			<a name="uslugi">-Каталог-</a>
		</div>
		<div class="usl">
			<div class="usll">
				<a style="color: #fb1c51;" href="kot.php"><img src="/img/kot.png" alt="" style="float: left; margin-right: 10px; margin-left: 110px;">
					<p style="text-align: center; margin-top: 255px; font-size: 25px;">Коттеджи</p></a>
				</div>		
				<div class="uslr">
					<a style="color: #fb1c51;" href="dach.php"><img src="/img/dacha.png" alt="" style="float: right; margin-left: 10px;margin-right: 110px;">
						<p style="text-align: center; margin-top: 255px; font-size: 25px;">Дачи</p></a>	
					</div>
					<div class="usll">
						<a style="color: #fb1c51;" href="uslugi.php"><img src="/img/usl.png" alt="" width="250" height="250" style="float: left; margin-right: 10px; margin-left: 110px;">
							<p style="text-align: center; margin-top: 255px; font-size: 25px;">Услуги</p></a>
						</div>		
						<div class="uslr">
							<a style="color: #fb1c51;" href="tovar.php"><img src="/img/tov.png" width="250" height="250" alt="" style="float: right; margin-left: 10px;margin-right: 110px;">
								<p style="text-align: center; margin-top: 255px; font-size: 25px;">Товары</p></a>	
							</div>		
						</div>
					</div>
					<div id="about">
						<div class="vra">
							<a name="about1">-О компании-</a>
						</div>
						<div class="vrach" style="margin-top: 30px;">
							<div class="photo">
								<img style="margin-top: 120px;" src="/img/logo.png" alt="">
							</div>
							<div class="text-vrach">
								<br>
								<br>
								<p style="font-size: 24px;font-weight:lighter;color: #f0b91a;"><?php echo $zag1 ?></p>
								<hr style="background: #f0b91a; height: 3px; border: none;margin: 5px 0;padding: 0;">
								<span style="font-size: 16px;font-weight:lighter; text-transform: none;">
									<?php echo $text1 ?>
								</span>
								<hr style="background: #f0b91a; height: 3px; border: none;margin:10px 0; padding: 0;">
								<p style="color: #f0b91a;"><?php echo $zag2 ?></p>
								<span style="font-size: 16px;font-weight: lighter;text-transform: none;">
									<?php echo $text2 ?>
								</span>

							</div>
						</div>
					</div>
					<div id="contact">
						<div class="vra">
							<a name="contact">-Контакты-</a>
						</div>
						<div class="cont">
							<?php echo $text ?>
						</div>
						<div class="map">
							<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac372a37446e91830cff53f2fd16102596f30ce01a3b244f89a316bce5b7e1832&amp;width=100%25&amp;height=305&amp;lang=ru_RU&amp;scroll=true"></script>
						</div>
					</div>
					<?php include ("include/footer.php"); ?>	
					<?php include ("price.php"); ?>
					<?php
					if (isset($_POST['form1'])) {
						$phone;
						$name;
						if (empty($_POST['phone'])) {
							echo "<script>location.href='index.php#form';</script>";
						}else
						{
							$phone = $_POST['phone'];
						}
						if (empty($_POST['name'])) {
							echo "<script>location.href='index.php#form';</script>";
						}else{
							$name = $_POST['name'];
						}
						$status = "Не просмотрено";
						include ("db.php");
						$query = "INSERT INTO `zayavki`(`name`, `phone`, `status`) VALUES ('$name','$phone','$status')";
						$result = mysql_query($query) or die(mysql_error());
						mysql_free_result($result);
						mysql_close($db);
						echo "<script>location.href='form.php';</script>";
					}
					?>
				</body>
				</html>