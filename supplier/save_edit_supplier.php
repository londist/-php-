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

if (empty($_POST['id']) or empty($_POST['name']) or empty($_POST['sex']) or empty($_POST['tel'])) {
    echo '<script>alert("供应商的姓名，性别，电话不能为空！");location="./m-supplier.php"</script>';
    die(0);
}

$id = $_POST['id'];
$name = $_POST['name'];
$sex = $_POST['sex'];
$tel = $_POST['tel'];
$address = isset($_POST['address']) ? $_POST['address'] : '';
$desc = isset($_POST['desc']) ? $_POST['desc'] : '';

$id = remove_unsafe_char($id);
$name = remove_unsafe_char($name);
$sex = remove_unsafe_char($sex);
$tel = remove_unsafe_char($tel);
$address = remove_unsafe_char($address);
$desc = remove_unsafe_char($desc);

if (! is_numeric($id)) {
    die('供应商编号一定要是数字！');
}

$sql = "update supplier set name='$name',sex='$sex',tel='$tel',address='$address',description='$desc',last_modified=now() where sid='$id'";
$result = mysql_query($sql, $db);
if (! $result) {
    die('修改供应商失败！'.mysql_error());
}

echo "<script>alert('成功修改供应商');location='./m-supplier.php'</script>";
mysql_close($db);
