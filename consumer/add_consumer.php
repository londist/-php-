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
header('Content-Type:text/html;charset=utf-8');

if (isset($_POST['id']) and isset($_POST['money'])) {
    $id = $_POST['id'];
    $money = $_POST['money'];
    if (empty($id) || empty($money)) {
        echo '<script>alert("学号或金额不能为空！");location="./m-consumer.php"</script>';
        die(0);
    }


    if (has_unsafe_char($id) or has_unsafe_char($money)) {
        echo '<script>alert("不允许加入特殊字符！");location="./m-consumer.php"</script>';
        die(0);
    }

    $id = remove_unsafe_char($id);
    $money = remove_unsafe_char($money);

    $sql = "select * from consumer where cid = '$id'";
    $result = mysql_query($sql, $db);
    $row = mysql_fetch_array($result);
    if ('' == ! $row['cid'] ) {
        echo '<script>alert("不允许添加同一个学生！");location="./m-consumer.php"</script>';
        die(0);
    }

    $sql = "insert into consumer values ('$id','$money')";
    $result = mysql_query($sql, $db);
    if (! $result) {
        echo "<script>alert('没有这个学生！请先添加这个学生后重试。');</script>";
        header("refresh:0;url='../consumer/m-consumer.php';");
        die(0);
    } else {
        $url = referer('m-consumer.php');
        echo "<script>alert('成功添加一个消费者信息!');location='$url'</script>";
    }
}
