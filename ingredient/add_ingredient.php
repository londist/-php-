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

if (empty($_POST['name'])) {
    echo '<script>alert("添加食材，名称不能为空！");location="./m-ingredient.php"</script>';
    die(0);
}

$name = $_POST['name'];
$desc = isset($_POST['desc']) ? $_POST['desc'] : '';

$name = remove_unsafe_char($name);
$desc = remove_unsafe_char($desc);

$sql = "select * from ingredient where name = '$name'";
$result = mysql_query($sql, $db);
$row = mysql_fetch_array($result);
if ('' == ! $row['name'] ) {
    echo '<script>alert("不允许添加同名的食材！请尝试使用下方的编辑按钮。");location="./m-ingredient.php"</script>';
    die(0);
}

$sql = "insert into ingredient (name,description) values ('$name','$desc') ";
$result = mysql_query($sql, $db);
if (! $result) {
    die('添加食材失败！'.mysql_error());
}

echo "<script>alert('成功添加食材');location='./m-ingredient.php'</script>";
mysql_close($db);
