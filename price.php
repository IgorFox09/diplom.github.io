			<!--feedback-->
			<div class="popup_bg"></div>
			<div class="popup_window" id="admin">
				<div class="popup_window__title">Вход в админ панель</div>
				<div class="popup_window__content">
					<form action="auth.php" method="post">
						<table class="vxod">
							<tr>
								<td>Логин</td>
								<td><input type="text" name="login"></td>
							</tr>
							<tr>
								<td>Пароль</td>
								<td><input type="password" name="pass"></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="vxod" class="btn" value="Вход"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<!--endfeedback-->
			<!--feedback-->
			<div class="popup_bg"></div>
			<div class="popup_window" id="login2">
				<div class="popup_window__title">Вход</div>
				<div class="popup_window__content">
					<form action="auth.php" method="post">
						<table class="vxod">
							<tr>
								<td>Логин</td>
								<td><input type="text" name="login"></td>
							</tr>
							<tr>
								<td>Пароль</td>
								<td><input type="password" name="pass"></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="login1" class="btn" value="Вход"></td>
							</tr>						
						</table>
						<a href="rega.php" style="text-decoration: none; padding-left: 205px;">Регистрация</a>
					</form>
				</div>
			</div>
			<!--endfeedback-->
			<!--feedback-->
			<div class="popup_bg"></div>
			<div class="popup_window" id="sobesed">
				<div class="popup_window__title">Запись на собеседование</div>
				<div class="popup_window__content">
					<form action="auth.php" method="post">
						<table class="vxod">
							<tr>
								<td>Вакансия:</td>
								<td><select class="select" name=vacans size=1 >
									<?php
									include ("db.php");
									$table = "vacans";
									$int = 0;
									$query = "SELECT * FROM ".$table." ";
									$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
									while ($row=mysql_fetch_array($result)){
										//$id = $row[0];
										$name = $row[1];
										if ($int == 0) {
											echo "<option value=".$name." selected>".$name."</option>";
										}else {
											echo "<option value=".$name.">".$name."</option>";
										}
										$int++;
									}
									mysql_free_result($result);
									mysql_close($db);
									?>
								</select> 
							</td>
						</tr>
						<tr>
							<td>Дата</td>
							<td><input type="date" name="data" min="<?php echo date('Y-m-d');?>"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="sobesed" class="btn" id="sobesed" value="Отправить" onclick="alert('Ваша заявка поступила на обработку ожидайте звонка!')"></td>
						</tr>						
					</table>
				</form>
			</div>
		</div>
		<!--endfeedback-->
		<!--feedback-->
		<div class="popup_bg"></div>
		<div class="popup_window" id="login">
			<div class="popup_window__title">Запрещено</div>
			<div class="popup_window__content">
				<form action="" method="post">
					<table class="vxod">
						<tr>
							<td>Необходимо войти под своей учетной записью</td>
							<td></td>
						</tr>						
					</table>
				</form>
			</div>
		</div>
		<!--endfeedback-->
		<!--feedback-->
		<div class="popup_bg"></div>
		<div class="popup_window" id="block">
			<div class="popup_window__title">Заказ</div>
			<div class="popup_window__content">
				<form action="auth.php" method="post">
					<table class="vxod">
						<tr>
							<td>Заказ:</td>
							<td><select class="select" name=naz1 size=1 >
								<?php
								include ("db.php");
								$table = "block";
								$int = 0;
								$query = "SELECT * FROM ".$table." ";
								$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
								while ($row=mysql_fetch_array($result)){
									$name = $row[1];
									if ($int == 0) {
										echo "<option value=".$name." selected>".$name."</option>";
									}else {
										echo "<option value=".$name.">".$name."</option>";
									}
									$int++;
								}
								mysql_free_result($result);
								mysql_close($db);
								?>
							</select> 
						</td>
					</tr>
					<tr>
						<td>Количество</td>
						<td><input type="number" name="kolvo" min="1" value="1"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="block" class="btn" value="Отправить" onclick="alert('Ваша заявка поступила на обработку ожидайте звонка!')"></td>
					</tr>						
				</table>
			</form>
		</div>
	</div>
	<!--endfeedback-->
	<!--feedback-->
	<div class="popup_bg"></div>
	<div class="popup_window" id="poduchki">
		<div class="popup_window__title">Заказ</div>
		<div class="popup_window__content">
			<form action="auth.php" method="post">
				<table class="vxod">
					<tr>
						<td>Заказ:</td>
						<td><select class="select" name=naz1 size=1 >
							<?php
							include ("db.php");
							$table = "poduchki";
							$int = 0;
							$query = "SELECT * FROM ".$table." ";
							$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
							while ($row=mysql_fetch_array($result)){
								$name = $row[1];
								if ($int == 0) {
									echo "<option value=".$name." selected>".$name."</option>";
								}else {
									echo "<option value=".$name.">".$name."</option>";
								}
								$int++;
							}
							mysql_free_result($result);
							mysql_close($db);
							?>
						</select> 
					</td>
				</tr>
				<tr>
					<td>Количество</td>
					<td><input type="number" name="kolvo" min="1" value="1"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="poduchki" class="btn" value="Отправить" onclick="alert('Ваша заявка поступила на обработку ожидайте звонка!')"></td>
				</tr>						
			</table>
		</form>
	</div>
</div>
<!--endfeedback-->
<!--feedback-->
<div class="popup_bg"></div>
<div class="popup_window" id="beton">
	<div class="popup_window__title">Заказ</div>
	<div class="popup_window__content">
		<form action="auth.php" method="post">
			<table class="vxod">
				<tr>
					<td>Заказ:</td>
					<td><select class="select" name=naz1 size=1 >
						<?php
						include ("db.php");
						$table = "beton";
						$int = 0;
						$query = "SELECT * FROM ".$table." ";
						$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
						while ($row=mysql_fetch_array($result)){
							$name = $row[1];
							if ($int == 0) {
								echo "<option value=".$name." selected>".$name."</option>";
							}else {
								echo "<option value=".$name.">".$name."</option>";
							}
							$int++;
						}
						mysql_free_result($result);
						mysql_close($db);
						?>
					</select> 
				</td>
			</tr>
			<tr>
				<td>Количество</td>
				<td><input type="number" name="kolvo" min="1" value="1"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="beton" class="btn" value="Отправить" onclick="alert('Ваша заявка поступила на обработку ожидайте звонка!')"></td>
			</tr>						
		</table>
	</form>
</div>
</div>
<!--endfeedback-->
<!--feedback-->
<div class="popup_bg"></div>
<div class="popup_window" id="calc">
	<div class="popup_window__title">Заказать расчет</div>
	<div class="popup_window__content">
		<?php //$id = $_GET['id'];
		echo "<form action='auth.php?id=".$id."' method='post'>"; ?>
		<?php
			/*include ("db.php");
			$query = "SELECT * FROM `stroit` WHERE `id` = ".$id." ";
			$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
			while ($row=mysql_fetch_array($result)){
				$name=$row[2];
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
			mysql_close($db);*/
			?>
			<table class="vxod">
				<tr>
					<td colspan="2" style="font-size: 15px;">Оставьте заявку, и наш менеджер свяжется с Вами в течение часа (если сегодня рабочий день, а на часах с 8:30 до 17.00). Если Ваша заявка поступила позже 18.00, ждите звонка утром в первый рабочий день.</td>
				</tr>
				<tr>
					<td colspan="2"><?php echo $name1; ?></td>
				</tr>
				<tr>
					<td>Общая площадь: <?php echo $area; ?> м2</td>
				</tr>
				<tr>
					<td>Жилая площадь: <?php echo $living; ?> м2</td>
				</tr>
				<tr>
					<td>Размеры: <?php echo $size; ?></td>
				</tr>
				<tr>
					<td>Этажность: <?php echo $floor; ?></td>
				</tr>
				<tr>
					<td>Скроки строительства: <?php echo $time; ?></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="calc" class="btn" value="Заказать" onclick="alert('Ваша заявка поступила на обработку ожидайте звонка!')"></td>
				</tr>						
			</table>
		</form>
	</div>
</div>
<!--endfeedback-->
