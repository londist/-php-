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

if (empty($_GET['id'])) {
    die('删除菜品，请输入菜品的编号!');
}

$id = $_GET['id'];
if (! is_numeric($id)) {
    die('菜品的编号一定要是数字!');
}

$id = remove_unsafe_char($id);
$sql = "delete from food where fid=$id";
$result = mysql_query($sql, $db);
if (! $result) {
    die('删除菜品失败! '.mysql_error());
}

echo "<script>alert('删除菜品成功！');location='./m-food.php'</script>";
mysql_close($db);
