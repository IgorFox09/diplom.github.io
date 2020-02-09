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
	<title>Вакансии</title>
</head>
<body>
	<?php include ("include/header.php"); ?>
	<div id="content">
		<div class="vra">
			<a name="vac">-Вакансии-</a>
		</div>
		<div class="usl">
			<table>
				<?php
				include ("db.php");
				$table = "vacans";
				$query = "SELECT * FROM ".$table." ";
				$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
				while ($row=mysql_fetch_array($result)){
					$info=$row[2];
					$url=$row[3];
					echo "<tr>";
					echo "<td><img style='width: 320px; height: 213px;' src='".$url."'></td>";
					echo "<td>".$info."</td>";
					if (isset($_SESSION['user_login']) || isset($_SESSION['login'])) {
						echo "<td><a href='#'' rel='sobesed' class='price' ><input type='submit' class='btn' value='Собеседование''></a></td>";
					}else {
						echo "<td><a href='#'' rel='login' class='price' ><input type='submit' class='btn' value='Собеседование''></a></td>";
					}
					echo "</tr>";				}
					mysql_free_result($result);
					mysql_close($db);
					?>
				</table>
				<?php include ("price.php"); ?>
			</div>
		</div>
		<?php include ("include/footer.php"); ?>
	</body>