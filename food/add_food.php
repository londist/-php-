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

if (empty($_POST['name']) or empty($_POST['price'])) {
    echo '<script>alert("添加食物，名称，价格都不能为空！");location="./m-food.php"</script>';
    die(0);
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
    echo '<script>alert("不允许添加同名的食材！请尝试使用下方的编辑按钮。");location="./m-food.php"</script>';
    die(0);
}

$sql = "insert into food (name,description,price) values ('$name','$desc','$price');";
$result = mysql_query($sql, $db);
if (! $result) {
    die('添加食物失败! '.mysql_error());
}

echo "<script>alert('成功添加食物');location='./m-food.php'</script>";
mysql_close($db);
