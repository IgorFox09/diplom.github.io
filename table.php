<?php
// Соединяемся, выбираем базу данных
$db = mysql_connect('localhost', 'MrExtrim09', 'admin96')
    or die('Не удалось соединиться: ' . mysql_error());
echo 'Соединение успешно установлено';
mysql_select_db('st') or die('Не удалось выбрать базу данных');
mysql_query("SET CHARACTER SET utf8",$db);
mysql_query("SET NAMES 'utf8';",$db);
mysql_query("SET character_set_client='utf8',character_set_connection='utf8',charter_set_database='utf8',charcetr_set_server='utf8';",$db);
// Выполняем SQL-запрос
$query = 'SELECT * FROM plomb';
$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());

// Выводим результаты в html
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
mysql_free_result($result);
mysql_close($db);
?>