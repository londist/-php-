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

if (empty($_POST['id']) or empty($_POST['money'])) {
    echo '<script>alert("输入的编号和金额都不能为空！");location="./m-consumer.php"</script>';
    die(0);
}

$id = remove_unsafe_char($_POST['id']);
$money = floatval(remove_unsafe_char($_POST['money']));

$row = mysql_fetch_array(mysql_query("select * from consumer where cid='$id'"));
if (! $row) {
    die("不存在学号为 $sid  的消费者!<br/>");
}

$sql = "update consumer set cur_money = $money  where cid='$id'";
$result = mysql_query($sql, $db);
if (! $result) {
    echo '<script>alert("修改失败！");location="./m-consumer.php"</script>';
    die(0);
}

$url = referer('m-consumer.php');
echo "<script>alert('修改数据成功！');location='$url'</script>";
