<?php

include '../db_conn.php';
include '../util.php';
handle_login();
utf8();

if (empty($_GET['id'])) {
    echo "<script type='text/javascript'>alert('要删除账户，请先输入账户的编号！');</script>";
    header('refresh:0;url=../account/m-account.php');
    die();
}

$id = $_GET['id'];
if (! is_numeric($id)) {
    echo "<script type='text/javascript'>alert('帐号的编号一定要是数字！');</script>";
    header('refresh:0.4;url=../account/m-account.php');
    die();
}

$id = remove_unsafe_char($id);
$sql = "delete from account where id=$id";
$result = mysql_query($sql, $db);
if (! $result) {
    die('删除帐号失败! '.mysql_error());
}

echo "<script>alert('删除帐号成功！');location='./m-account.php'</script>";
mysql_close($db);
