<?php

include '../db_conn.php';
include '../util.php';
handle_login();
utf8();

if (empty($_POST['name']) or empty($_POST['price'])) {
    die('添加食物，名称，价格都不能为空!');
}

$name = $_POST['name'];
$price = $_POST['price'];
$desc = isset($_POST['desc']) ? $_POST['desc'] : '';

$name = remove_unsafe_char($name);
$price = remove_unsafe_char($price);
$desc = remove_unsafe_char($desc);

$sql = "select * from food where name = '$name';";
$result = mysql_query($sql, $db);
$row = mysql_fetch_array($result);
if ('' == ! $row['fid']) {
    die('不允许添加同名的食材，请尝试使用下方的编辑按钮，以避免不必要的混淆');
}

$sql = "insert into food (name,description,price) values ('$name','$desc','$price');";
$result = mysql_query($sql, $db);
if (! $result) {
    die('添加食物失败! '.mysql_error());
}

echo "<script>alert('成功添加食物');location='./m-food.php'</script>";
mysql_close($db);
