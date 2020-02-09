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
	<title>ООО «СТРОИТЕЛЬНАЯ КОМПАНИЯ ВЫТЕГРА»</title>
</head>
<body>
	<?php include ("include/header.php"); ?>
	<div style="width: 100%; font-weight:bold;">
		<div class="uslugi">
			<a name="uslugi">-Дачи-</a>
		</div>
	</div>
	<div class="kart">
		<?php
		include ("db.php");
		$table = "stroit";
		$query = "SELECT * FROM ".$table." ";
		$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
		while ($row=mysql_fetch_array($result)){
			$id=$row[0];
			$group=$row[1];
			$name=$row[2];
			$area=$row[3];
			$size=$row[7];
			$price=$row[8];
			$img1=$row[9];
			if ($group == "dach") {
				echo "<li>  \n";
				echo "<div style='height: 280px;''> \n";
				echo "<a rel='nofollow' target='_blank' href=".$img1.">";
				echo "<img src=".$img1." width='230' height='165'> \n";	
				echo "</a>";
				echo "<p style='height: 40px;'>".$name."</p> \n";
				echo "<p>Размер: ".$size."</p> \n";
				echo "<p>Площадь: ".$area." м2</p> \n";	
				echo "<br>  \n
				<p>Цена: ".$price." руб</p> \n";
				echo "</div> \n";
				if (isset($_SESSION['login']) || isset($_SESSION['user_login'])) {
					echo "<div class='knop'> \n";
					echo "<a href='product.php?id=".$id."'>Подробнее</a> \n";
					echo "</div> \n";
				}else {
					echo "<div class='knop'>  \n";
					echo "<a href='#'' rel='login' class='price' >Подробнее</a> \n";
					echo "</div>  \n";
				}
				echo "</li> \n";
			}
		}
		mysql_free_result($result);
		mysql_close($db);
		?>
	</div>
	<?php include ("include/footer.php"); ?>
	<?php include ("price.php"); ?>
</body>