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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
			if (isset($_POST['addtov'])) {
				$err = 0;
				if (empty($_POST['names'])) {
					$names = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}
				if (empty($_POST['sizel'])) {
					$sizel = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}elseif (preg_match("/[^0-9]/", $_POST['sizel'])) {
					$sizel = '<center><font size="2" color="red">Только числа!</font></center>';
					$err++;
				}
				if (empty($_POST['sizeb'])) {
					$sizeb = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}elseif (preg_match("/[^0-9]/", $_POST['sizeb'])) {
					$sizeb = '<center><font size="2" color="red">Только числа!</font></center>';
					$err++;
				}
				if (empty($_POST['sizeh'])) {
					$sizeh = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}elseif (preg_match("/[^0-9]/", $_POST['sizeh'])) {
					$sizeh = '<center><font size="2" color="red">Только числа!</font></center>';
					$err++;
				}
				if (empty($_POST['mass'])) {
					$mass = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}elseif (preg_match("/[^0-9]/", $_POST['mass'])) {
					$mass = '<center><font size="2" color="red">Только числа!</font></center>';
					$err++;
				}
				if (empty($_POST['price'])) {
					$price = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}elseif (preg_match("/[^0-9]/", $_POST['price'])) {
					$price = '<center><font size="2" color="red">Только числа!</font></center>';
					$err++;
				}
				if(isset($_FILES['img1']))  {
					$check1 = can_upload($_FILES['img']);
					if ($check1===true) {
						$check1 ='<font size="2" color="green">ok</font>';
					}else {
						$err++;
					}
				}
				if ($err == 0) { 
					$ch = make_addtov($_FILES['img']); 
					$err=0;
				}
			}
			if (isset($_POST['addtov1'])) {
				$err = 0;
				if (empty($_POST['names1'])) {
					$names1 = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}
				if (empty($_POST['price1'])) {
					$price1 = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}elseif (preg_match("/[^0-9]/", $_POST['price1'])) {
					$price1 = '<center><font size="2" color="red">Только числа!</font></center>';
					$err++;
				}
				if (empty($_POST['class1'])) {
					$class1 = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}
				if (empty($_POST['pod'])) {
					$pod = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}
				if (empty($_POST['moroz'])) {
					$moroz = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}
				if (empty($_POST['water'])) {
					$water = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}
				if (empty($_POST['mass1'])) {
					$mass1 = '<center><font size="2" color="red">Поле пустое!</font></center>';
					$err++;
				}elseif (preg_match("/[^0-9]/", $_POST['mass1'])) {
					$mass1 = '<center><font size="2" color="red">Только числа!</font></center>';
					$err++;
				}
				if ($err == 0) {
					$ch1 = addbeton(); 
					$err=0;
				}

			}
			?>
			<div class="spoiler">
				<a href="" class="spoiler_links">Добавить фундаментные блоки или подушки</a>
				<div class="spoiler_body">
					<form action="" enctype="multipart/form-data" method="post">
						<table class="add">
							<tr>
								<td>Выбор группы:</td>
								<td><select name="groop" size="1" class="select"><option>Блок</option><option>Подушка</option></select></td>
								<td></td>
							</tr>
							<tr>
								<td>Название:</td>
								<td><input type="text" name="names"></td>
								<td><?php echo $names; ?></td>
							</tr>
							<tr>
								<td>Длинна:</td>
								<td><input type="text" name="sizel" size="1"></td>
								<td><?php echo $sizel; ?></td>
							</tr>
							<tr>
								<td>Ширина:</td>
								<td><input type="text" name="sizeb" size="1"></td>
								<td><?php echo $sizeb; ?></td>
							</tr>
							<tr>
								<td>Высота:</td>
								<td><input type="text" name="sizeh" size="1"></td>
								<td><?php echo $sizeh; ?></td>
							</tr>
							<tr>
								<td>Масса:</td>
								<td><input type="text" name="mass"></td>
								<td><?php echo $mass; ?></td>
							</tr>
							<tr>
								<td>Цена оптовая:</td>
								<td><input type="text" size="7" name="price"></td>
								<td><?php echo $price; ?></td>
							</tr>
							<tr>
								<td>Картинка:</td>
								<td><input type="file" id="fileinput" name="img" ></td>
								<td><?php echo $check1; ?></td>
							</tr>
							<tr>
								<td><input type="submit" value="Отправить" name="addtov" class="btn"></td>
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
				<a href="" class="spoiler_links">Удалить фундаментные блоки или подушки</a>
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
								$delet = delet_usl($_POST['delet']);
							}
						}
						?>
						<table class="add" style="margin: 0 auto;">
							<tr>
								<td colspan="3"><select name="groop" id="groop" size="1" class="select"><option value="1">Блок</option><option value="2">Подушка</option></select></td>
							</tr>
						</table>
						<table class="add" id="tov" style="margin: 0 auto;">
							<?php
							echo "<tr><td>ИД</td><td>Название</td><td>Цена</td></tr>";
							include ("db.php");
							$query = "SELECT * FROM `block`";
							$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
							while ($row=mysql_fetch_array($result)){
								$id = $row[0];
								$name=$row[1];
								$price=$row[6];
								echo "<tr>";
								echo "<td>$id</td>";
								echo "<td>$name</td>";
								echo "<td>$price</td>";
								echo "</tr>";
							}
							?>
							<script>  
								$(document).ready(function(){  
									$('#groop').change(function(){  
										var id = $(this).val();  
										$.ajax({  
											url:"include/functions.php",  
											method:"POST",  
											data:{table:id},  
											success:function(data){  
												$('#tov').html(data);  
											}  
										});  
									});  
								});
							</script>
						</table>
						<table class="add" style="margin: 0 auto;">
							<tr>
								<td>Введите ид:</td>
								<td><input type="text" name="delet"></td>
								<td><input type="submit" name="del1" value="Удалить" class="btn" id="dl"></td>
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
			<div class="spoiler">
				<a href="" class="spoiler_links">Добавить бетон товарный</a>
				<div class="spoiler_body">
					<form action="" enctype="multipart/form-data" method="post">
						<table class="add">
							<tr>
								<td>Название:</td>
								<td><input type="text" name="names1"></td>
								<td><?php echo $names1; ?></td>
							</tr>
							<tr>
								<td>Класс бетона:</td>
								<td><input type="text" name="class1" size="1"></td>
								<td><?php echo $class1; ?></td>
							</tr>
							<tr>
								<td>Подвижность:</td>
								<td><input type="text" name="pod" size="1"></td>
								<td><?php echo $pod; ?></td>
							</tr>
							<tr>
								<td>Морозостойкость:</td>
								<td><input type="text" name="moroz" size="1"></td>
								<td><?php echo $moroz; ?></td>
							</tr>
							<tr>
								<td>Водонепроницаемость:</td>
								<td><input type="text" name="water"></td>
								<td><?php echo $water; ?></td>
							</tr>
							<tr>
								<td>Масса:</td>
								<td><input type="text" size="7" name="mass1"></td>
								<td><?php echo $mass1; ?></td>
							</tr>
							<tr>
								<td>Цена:</td>
								<td><input type="text" size="7" name="price1"></td>
								<td><?php echo $price1; ?></td>
							</tr>
							<tr>
								<td><input type="submit" value="Отправить" name="addtov1" class="btn"></td>
								<td><input type="reset" value="Очистить" class="btn"></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td><?php echo $ch1; ?></td>
								<td></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<div class="spoiler">
				<a href="" class="spoiler_links">Удалить товарный бетон</a>
				<div class="spoiler_body">
					<form action="" method="post">
						<?php
						if (isset($_POST['delbeton'])) {
							$er=0;
							if (preg_match("/[^0-9]/", $_POST['betondel'])) {
								$betondel = '<center><font size="2" color="red">Только числа!</font></center>';
								$er++;
							}
							if ($er == 0) {
								$betondel = betdel($_POST['betondel']);
							}
						}
						?>
						<table class="add" id="tov" style="margin: 0 auto;">
							<?php
							echo "<tr><td>ИД</td><td>Название</td><td>Цена</td></tr>";
							include ("db.php");
							$query = "SELECT * FROM `beton`";
							$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
							while ($row=mysql_fetch_array($result)){
								$id = $row[0];
								$name=$row[1];
								$price=$row[7];
								echo "<tr>";
								echo "<td>$id</td>";
								echo "<td>$name</td>";
								echo "<td>$price</td>";
								echo "</tr>";
							}
							?>
						</table>
						<table class="add" style="margin: 0 auto;">
							<tr>
								<td>Введите ид:</td>
								<td><input type="text" name="betondel"></td>
								<td><input type="submit" name="delbeton" value="Удалить" class="btn" id="dl"></td>
							</tr>
							<tr>
								<td></td>
								<td><?php echo $betondel; ?></td>
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