<?php
session_start();
?>
<?php
include_once('include/functions.php')
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Play:700,400&amp;subset=cyrillic" rel="stylesheet">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<title>Добавить/Удалить коттедж или дачу</title>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.spoiler_links').click(function(){
				$(this).parent().children('div.spoiler_body').toggle('normal');
				return false;
			});
		});
	</script>
</head>
<body>
	<?php if(isset($_SESSION['login'])): ?>
		<?php
		include_once('include/include/header.php') ?>
		<div style="min-height: 500px; width: 100%; font-weight: bold;">	
			<?php
			if (isset($_POST['add'])) {
				$err = 0;
				if (empty($_POST['names'])) {
					$names = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}
				if (empty($_POST['area'])) {
					$area = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}elseif (preg_match("/[^0-9]/", $_POST['area'])) {
					$area = '<center><font size="2" color="red">Только числа!</font></center>';
					$err++;
				}
				if (empty($_POST['living'])) {
					$living = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}elseif (preg_match("/[^0-9]/", $_POST['living'])) {
					$living = '<center><font size="2" color="red">Только числа!</font></center>';
					$err++;
				}
				if (empty($_POST['floor'])) {
					$floor = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}elseif (preg_match("/[^0-9]/", $_POST['floor'])) {
					$floor = '<center><font size="2" color="red">Только числа!</font></center>';
					$err++;
				}
				if (empty($_POST['time1'])) {
					$time1 = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}
				if (empty($_POST['price'])) {
					$price = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}elseif (preg_match("/[^0-9]/", $_POST['price'])) {
					$price = '<center><font size="2" color="red">Только числа!</font></center>';
					$err++;
				}
				if (empty($_POST['size'])) {
					$size = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}
				if(isset($_FILES['img1']))  {
					$check1 = can_upload($_FILES['img1']);
					if ($check1===true) {
						$check1 ='<font size="2" color="green">ok</font>';
					}else {
						$err++;
					}
				}
				if(isset($_FILES['img2']))  {
					$check2 = can_upload($_FILES['img2']);
					if ($check2===true) {
						$check2 ='<font size="2" color="green">ok</font>';
					}else {
						$err++;
					}
				}
				if(isset($_FILES['img3']))  {
					$check3 = can_upload($_FILES['img3']);
					if ($check3===true) {
						$check3 ='<font size="2" color="green">ok</font>';
					}else {
						$err++;
					}
				}
				if(isset($_FILES['img4']))  {
					$check4 = can_upload($_FILES['img4']);
					if ($check4===true) {
						$check4 ='<font size="2" color="green">ok</font>';
					}else {
						$err++;
					}
				}
				if ($err == 0) { 
					$ch = make_add($_FILES['img1'],$_FILES['img2'],$_FILES['img3'],$_FILES['img4']); 
					$err=0;
				}
			}
			?>
			<div class="spoiler">
				<a href="" class="spoiler_links">Добавить</a>
				<div class="spoiler_body">
					<form action="" enctype="multipart/form-data" method="post">
						<table class="add">
							<tr>
								<td>Выбор группы:</td>
								<td><select name="groop" size="1" class="select"><option>Дача</option><option>Коттедж</option></select></td>
								<td></td>
							</tr>
							<tr>
								<td>Название:</td>
								<td><input type="text" name="names"></td>
								<td><?php echo $names; ?></td>
							</tr>
							<tr>
								<td>Общая Площадь:</td>
								<td><input type="text" name="area" size="1"></td>
								<td><?php echo $area; ?></td>
							</tr>
							<tr>
								<td>Жилая площадь:</td>
								<td><input type="text" name="living" size="1"></td>
								<td><?php echo $living; ?></td>
							</tr>
							<tr>
								<td>Кол-во этажей:</td>
								<td><input type="text" name="floor" size="1"></td>
								<td><?php echo $floor; ?></td>
							</tr>
							<tr>
								<td>Время строительства:</td>
								<td><input type="text" name="time1"></td>
								<td><?php echo $time1; ?></td>
							</tr>
							<tr>
								<td>Цена:</td>
								<td><input type="text" size="7" name="price"></td>
								<td><?php echo $price; ?></td>
							</tr>
							<tr>
								<td>Размеры:</td>
								<td><input type="text" name="size"></td>
								<td><?php echo $size; ?></td>
							</tr>
							<tr>
								<td>Картинка 1:</td>
								<td><input type="file" id="fileinput" name="img1" ></td>
								<td><?php echo $check1; ?></td>
							</tr>
							<tr>
								<td>Картинка 2:</td>
								<td><input type="file" id="fileinput" name="img2" ></td>
								<td><?php echo $check2; ?></td>
							</tr>
							<tr>
								<td>Картинка 3:</td>
								<td><input type="file" id="fileinput" name="img3" ></td>
								<td><?php echo $check3; ?></td>
							</tr>
							<tr>
								<td>Картинка 4:</td>
								<td><input type="file" id="fileinput" name="img4" ></td>
								<td><?php echo $check4; ?></td>
							</tr>
							<tr>
								<td><input type="submit" value="Отправить" name="add" class="btn"></td>
								<td><input type="reset" value="Очистить" class="btn"></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td><?php echo $ch; ?></td>
								<td></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<div class="spoiler">
				<a href="" class="spoiler_links">Удалить</a>
				<div class="spoiler_body">
					<form action="" method="post">
						<?php
						if (isset($_POST['del1'])) {
							$er=0;
							if (preg_match("/[^0-9]/", $_POST['delet'])) {
								$delet = '<center><font size="2" color="red">Только числа!</font></center>';
								$er++;
							}
							if ($er == 0) {
								$delet = make_del($_POST['delet']);
							}
						}
						?>
						<table class="add">
							<tr>
								<td>ИД</td>
								<td>Группа</td>
								<td>Название</td>
							</tr>
							<?php
							include ("db.php");
							$query = "SELECT * FROM `stroit`";
							$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
							while ($row=mysql_fetch_array($result)){
								$id = $row[0];
								$group=$row[1];
								if($group=="kot"){
									$group="Коттедж";
								}else{
									$group="Дача";
								}
								$naz=$row[2];
								echo "<tr>";
								echo "<td>$id</td>";
								echo "<td>$group</td>";
								echo "<td>$naz</td>";
								echo "</tr>";
							}
							?>
							<tr>
								<td>Введите ид:</td>
								<td><input type="text" name="delet"></td>
								<td><input type="submit" name="del1" value="Удалить" class="btn"></td>
							</tr>
							<tr>
								<td></td>
								<td><?php echo $delet; ?></td>
								<td></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<?php include ("include/footer.php"); ?>
	<?php else: ?>
		<center><p style="margin: 0 auto;">Информация недоступна,Войдите под своей учетной записью!</p>
			<a href="index.php" style="font-size: 20px;">Вход</a></center>
		<?php endif;?>
		<?php
		if ($_GET['vxod']!= 0){
			session_destroy();
			echo "<script>location.href='index.php';</script>";
		}
		?>	
	</body>
	</html>
