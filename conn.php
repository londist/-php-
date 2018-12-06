<?php
$username = "root";
$password = "root";
$host = "localhost";

$db_name = "canteen";

$db = mysql_connect($host, $username,$password);
if (!$db)
    die ('Could not connect: ' . mysql_error());
mysql_select_db($db_name,$db);


?>
