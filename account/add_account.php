<?php

include '../db_conn.php';
include '../util.php';
handle_login();
utf8();

if (empty($_POST['username']) or empty($_POST['password']) or empty($_POST['proi'])) {
    die('添加帐号，用户名，密码，用户权限都不能为空!');
}

$us = $_POST['username'];
$pw = $_POST['password'];
$pr = $_POST['proi'];

if ('1' != $pr and '2' != $pr) {
    die('添加帐号，分配的权限出错!');
}

$us = remove_unsafe_char($us);
$pw = md5(remove_unsafe_char($pw));
$pr = intval(remove_unsafe_char($pr));

$sql_exist = "select * from account where username='$us'";
if (0 != mysql_num_rows(mysql_query($sql_exist))) {
    die('用户名 '.$us."已被占用。请试用另一个用户名!<br/><a href='m-account.php'>返回</a>");
}

$sql = "insert into account (username,password,proi) values ('$us','$pw',$pr) ";
$result = mysql_query($sql, $db);
if (! $result) {
    die('添加帐号失败! '.mysql_error());
}

echo "<script>alert('成功添加帐号');location='./m-account.php'</script>";
mysql_close($db);
