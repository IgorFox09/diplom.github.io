<?php
$pa = 'admin123';
$salt = 'admin996';
$pass = md5($salt.$pa);
echo $pass;
?>
