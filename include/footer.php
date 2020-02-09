<div id="footer">
	<div class="menufo">
			<li><a href="index.php">Главная</a></li>
			<li><a href="vacans.php">Вакансии</a></li>
			<li><a href="index.php#about">О компании</a></li>
			<li><a href="index.php#contact">Контакты</a></li>
	</div>
	<div class="foo">
		<p>©COPYRIGHT 2018 Все права защищены.</p>
		<?php if(isset($_SESSION['login'])): ?>
			<a href="editor.php">Админ панель</a>
		<?php else: ?>
		<a href="#" rel="admin" class="price">Вход</a>
		<?php endif;?>
	</div>
</div>