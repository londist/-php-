<?php

include '../db_conn.php';
include '../util.php';
handle_login();
utf8();

if (empty($_POST['name']) or empty($_POST['id'])) {
    echo '<script>alert("编辑食材，名称不能为空！");location="./m-ingredient.php"</script>';
    die(0);
}

$id = $_POST['id'];
$name = $_POST['name'];
$desc = isset($_POST['desc']) ? $_POST['desc'] : '';

if (! is_numeric($id)) {
    echo '<script>alert("食材的编号一定要是数字！");location="./m-ingredient.php"</script>';
    die(0);
}

$id = remove_unsafe_char($id);
$name = remove_unsafe_char($name);
$desc = remove_unsafe_char($desc);

$sql = "update ingredient set name='$name',description='$desc' where mid='$id'";
$result = mysql_query($sql, $db);
if (! $result) {
    die('修改食材信息失败！'.mysql_error());
}

echo "<script>alert('成功修改食材信息');location='./m-ingredient.php'</script>";
mysql_close($db);
