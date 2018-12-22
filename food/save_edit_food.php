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

if (empty($_POST['name']) or empty($_POST['price']) or empty($_POST['id'])) {
    echo '<script>alert("修改食物，名称，价格都不能为空！");location="./m-food.php"</script>';
    die(0);
}


$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$desc = isset($_POST['desc']) ? $_POST['desc'] : '';

if (! is_numeric($id)) {
    echo '<script>alert("食物的编号一定要是数字！");location="./m-food.php"</script>';
    die(0);
}

$id = remove_unsafe_char($id);
$name = remove_unsafe_char($name);
$price = remove_unsafe_char($price);
$desc = remove_unsafe_char($desc);

$sql = "select * from food where name = '$name';";
$result = mysql_query($sql, $db);
$row = mysql_fetch_array($result);
if ('' == ! $row['fid']) {
    echo '<script>alert("该食材已存在！请使用编辑功能编辑该食材。");location="./m-food.php"</script>';
    die(0);
}

$sql = "update food set name='$name',description='$desc',price=$price where fid='$id'; ";
$result = mysql_query($sql, $db);
if (! $result) {
    die('修改食物信息失败! '.mysql_error());
}

echo "<script>alert('成功修改食物信息');location='./m-food.php'</script>";
mysql_close($db);
