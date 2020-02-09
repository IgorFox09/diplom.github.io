<?php include ("include/session.php"); ?>
<?php //include ("include/functions.php"); ?>
<?php if(isset($_GET['id'])): ?>
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
		<?php
		include ("db.php");
		$id = $_GET['id'];
		$query = "SELECT * FROM `stroit` WHERE `id` = ".$id." ";
		$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
		while ($row=mysql_fetch_array($result)){
			$id = $row[0];
			$group=$row[1];
			$name1=$row[2];
			$area=$row[3];
			$living=$row[4];
			$floor=$row[5];
			$time=$row[6];
			$size=$row[7];
			$price=$row[8];
			$img1=$row[9];
			$img2=$row[10];
			$img3=$row[11];
			$img4=$row[12];
		}
		mysql_free_result($result);
		mysql_close($db);
		?>
		<div id="content">
			<div class="uslugi">
				<a name="uslugi">-<?php echo $name1; ?>-</a>
			</div>
			<div style="width: 960px; min-height: 500px;">
				<div class="block">
					<div style=" height: 418px; width: 528px; border: solid 1px #bfbfbf; ">
						<div style="height: 300px; width: 530px;">
							<a rel='nofollow' target='_blank' href="<?php echo $img1; ?>">
								<img src="<?php echo $img1; ?>" width='530' height='300'>
							</a>
						</div>
						<div class="blockimg" style="margin-left: 8px;">
							<a rel='nofollow' target='_blank' href="<?php echo $img1; ?>">
								<img src="<?php echo $img1; ?>" width='120' height='90'>
							</a>
						</div>
						<div class="blockimg">
							<a rel='nofollow' target='_blank' href="<?php echo $img2; ?>">
								<img src="<?php echo $img2; ?>" width='120' height='90'>
							</a>
						</div>
						<div class="blockimg">
							<a rel='nofollow' target='_blank' href="<?php echo $img3; ?>">
								<img src="<?php echo $img3; ?>" width='120' height='90'>
							</a>
						</div>
						<div class="blockimg">
							<a rel='nofollow' target='_blank' href="<?php echo $img4; ?>">
								<img src="<?php echo $img4; ?>" width='120' height='90'>
							</a>
						</div>
					</div>
				</div>
				<div class="block" style="height: 420px;width: 380px;margin-left: 50px;">
					<div class="blocktext" style="margin: 20px auto;">
						<p>Цена</p><p>строительства: от <?php echo $price; ?> руб</p>
					</div>
					<div style="min-height: 120px; padding-left: 10px; padding-top: 10px;background: #b5b3b3">
						<div style="width: 185px; float: left;">
							<p>Общая площадь:</p>
							<p><?php echo $area; ?> м2</p>
						</div>
						<div style="width: 185px; float: left;">
							<p>Жилая площадь:</p>
							<p><?php echo $living; ?> м2</p>
						</div>
						<div style="width: 185px; float: left;">
							<p>Размеры:</p>
							<p><?php echo $size; ?></p>
						</div>
						<div style="width: 185px; float: left;">
							<p>Этажность:</p>
							<p><?php echo $floor; ?></p>
						</div>
						<div style="width: 185px; float: left;">
							<p>Скроки строительства:</p>
							<p><?php echo $time; ?></p>
						</div>
					</div>
					<div style="height: 150px; background: white; margin-top: 10px;">
						<p style="text-align: center;">Заказывая у нас вы получаете:</p>
						<div class="blockicon">
							<div style="height: 70px;">
								<img src="/img/hto_warran.png" alt="">
							</div>
							<p>5 лет гарантии</p>
						</div>
						<div class="blockicon">
							<div style="height: 70px;">
								<img src="/img/hto_time.png" alt="">
							</div>
							<p>Качественно и в срок</p>
						</div>
						<div class="blockicon">
							<div style="height: 70px;">
								<img src="/img/hto_money.png" alt="">
							</div>
							<p>Выгодные условия оплаты</p>
						</div>
					</div>
					<?php if(isset($_SESSION['login']) || isset($_SESSION['user_login'])): ?>
						<a href='#'' rel='calc' class='price' ><input type='submit' class='btn' value='Заказать расчет'></a>
					<?php else: ?>
						<a href='#'' rel='login' class='price' ><input type='submit' class='btn' value='Заказать расчет'></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div id="about">
			<div class="blocktext" style="margin-top: 26px; min-height: 50px;">
				<span style="color: red; font-size: 40px; float: left;">&#10008;</span>
				<p>Обращаем ваше внимание, что в стоимость дома в базовой комплектации не входит стоимость отделочных работ. Также стоимость зависит от выбранного типа фундамента.</p>	
			</div>
			<div class="blocktext" style="margin-top: 26px; font-size: 30px;">
				<p>В базувую комплектацию входит:</p>	
			</div>
			<div style="height: 700px; width: 100%;  margin-top: 26px;">
				<div style="height: 220px;">
					<div class="foto">
						<p>Проектная документация</p>
						<img src="/img/project.jpg">
					</div>
					<div class="foto">
						<p>Стеновый комплект</p>
						<img src="/img/stena_brus.jpg">
					</div>
					<div class="foto">
						<p>Кровля - под рубеноид</p>
						<img src="/img/krovlya_brus.jpg">
					</div>
				</div>
				<div class="foto">
					<ul>
						<li>Титульный лист</li>
						<li>Общие данные</li>
						<li>Фасады, разрезы, 3D виды</li>
						<li>План фундамента</li>
						<li>План свайного поля</li>
						<li>План этажей</li>
						<li>План развертки скатов кровли</li>
						<li>План раскладки балок 1 этаж</li>
						<li>План раскладки балок 2 этаж</li>
						<li>План раскладки стропильной системы</li>
						<li>Спецификация проемов</li>
						<li>Узлы, детали</li>
					</ul>
				</div>
				<div class="foto">
					<ul>
						<li>Стены, перегородки, фронтоны &nbsp;– профилированного бруса (сосна-ель) из Кирова согласно проекту, высота этажа 2,9м</li>
						<li>Зарезка чашек</li>
						<li>Утепление стен и перегородок - льноватин или джутовое полотно</li>
						<li>Установка лаг перекрытия брус 100*200мм</li>
						<li>Монтаж стен из бревнана на сухие деревянные нагеля</li>
						<li>Установка компенсаторов (винтовая опора) на столбах</li>
						<li>Антисептирование деревянной части строения при плюсовой температуре</li>
						<li>Установка и разборка лесов</li>
						<li>Все расходные и сопутствующие материалы необходимые для сборки стенового комплекта</li>
					</ul>
				</div>
				<div class="foto">
					<ul>
						<li>Стропильная конструкция из доски 50х200 мм</li>
						<li>Система обрешетки 150*20мм, 100*20мм</li>
						<li>Установка стропильной конструкции на скользящих опорах</li>
						<li>Устройство временной кровли из рубероида с прижимными рейками</li>
						<li>Антисептирование</li>
						<li>Все расходные и сопутствующие материалы необходимые для кровли</li>
					</ul>
				</div>
			</div>
		</div>
		<?php include ("include/footer.php"); ?>
		<?php include ("price.php"); ?>
	<?php else: ?>
		<?php echo "<script>location.href='index.php';</script>"; ?>
	<?php endif; ?>
</body>
<?php 
	if($_GET){
    if(isset($_GET['calc'])){
        $calc = calc();
        echo("<script>alert($calc)</script");
    }
}
 ?>
</html>