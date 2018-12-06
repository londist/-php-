<?php
$username = "londist";
$password = "2012";
$host = "localhost";

$db_name = "php";

$db = mysql_connect($host, $username,$password) or die("连接数据库失败".mysql_error());
mysql_select_db($db_name,$db);


?>
