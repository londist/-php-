<?php

include '../db_conn.php';
include '../util.php';
handle_login();
utf8();

if (empty($_POST['name']) or empty($_POST['sex']) or empty($_POST['job'])) {
    die('添加工人信息中，姓名，性别和职位都不能为空!');
}

$name = $_POST['name'];
$sex = $_POST['sex'];
$jid = $_POST['job'];

if ('男' != $sex and '女' != $sex) {
    die('未知性别!');
}
if (! is_numeric($jid)) {
    die('职位编号必须是整数');
}

$name = remove_unsafe_char($name);
$sex = remove_unsafe_char($sex);
$jid = intval(remove_unsafe_char($jid));

$sql = "insert into staff (name,sex,jid) values ('$name','$sex',$jid)";
$result = mysql_query($sql, $db);
if (! $result) {
    die('添加工人失败'.mysql_erro());
}

echo "<script>alert('成功添加一个工人');location='./m-staff.php'</script>";
mysql_close($db);
