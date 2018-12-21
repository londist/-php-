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
    echo '<script>alert("工人编号不能为空");location="./m-staff.php"</script>';
    die(0);
}

$id = $_GET['id'];
if (! is_numeric($id)) {
    die('编号一定要是数字!');
}

$id = remove_unsafe_char($id);
$sql = "delete from staff where wid='$id'";

$result = mysql_query($sql, $db);
if (! $result) {
    die('删除失败!'.mysql_error());
}

$url = referer('m-staff.php');
echo "<script>alert('成功删除');location='$url'</script>";
mysql_close($db);
