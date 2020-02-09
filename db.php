<?php $db = mysql_connect('localhost', 'MrExtrim09', 'admin96')
or die('Не удалось соединиться: ' . mysql_error());
mysql_select_db('diplom') or die('Не удалось выбрать базу данных');
mysql_query("SET CHARACTER SET utf8",$db);
mysql_query("SET NAMES 'utf8';",$db);
mysql_query("SET character_set_client='utf8',character_set_connection='utf8',charter_set_database='utf8',charcetr_set_server='utf8';",$db);
?>