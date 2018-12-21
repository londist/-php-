<html>
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <title>饭堂就餐管理系统</title>
      <meta
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
        name="viewport"
      />
      <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css" />
    </head>
  
      <body class="hold-transition login-page">
          <div style="margin-top:180px">
              <div class="login-logo">正 在 跳 转 . . .</div>
          </div>
      </body>
  </html>
<?php

include '../db_conn.php';
include '../util.php';
handle_login();
utf8();

if (empty($_POST['id']) or empty($_POST['name']) or empty($_POST['sex']) or empty($_POST['job'])) {
    echo '<script>alert("编辑工人信息中，姓名、性别和职位均不能为空！");location="./m-staff.php"</script>';
    die(0);
}

$id = $_POST['id'];
$name = $_POST['name'];
$sex = $_POST['sex'];
$jid = $_POST['job'];

if ('男' != $sex and '女' != $sex) {
    die('未知性别！');
}
if (! is_numeric($jid)) {
    die('职位编号要是整数');
}
if (! is_numeric($id)) {
    die('员工编号要是整数');
}

$id = remove_unsafe_char(intval($id));
$name = remove_unsafe_char($name);
$sex = remove_unsafe_char($sex);
$jid = intval(remove_unsafe_char($jid));

$sql = "update staff set name='$name',sex='$sex',jid=$jid where wid=$id";
$result = mysql_query($sql, $db);
if (! $result) {
    die('修改工人信息失败'.mysql_erro());
}

echo "<script>alert('成功修改工人信息');location='./m-staff.php'</script>";
mysql_close($db);
