<?php 
include ("db.php");
$query = "SELECT * FROM reda where id=1";
$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
$num_row = mysql_num_rows($result);
if($num_row > 0){
	if($row =mysql_fetch_assoc($result)){
		$id=$row['id'];
		$zag1=$row['zag1'];
		$text1=$row['text1'];
		$zag2=$row['zag2'];
		$text2=$row['text2'];
	}
}
$query = "SELECT * FROM reda where id=2";
$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
$num_row = mysql_num_rows($result);
if($num_row > 0){
	if($row =mysql_fetch_assoc($result)){
		$id=$row['id'];
		$text=$row['text1'];
	}
}
mysql_free_result($result);
mysql_close($db);
?>