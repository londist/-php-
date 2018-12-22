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
    die('删除供应商中，供应商编号不能为空!');
}

$id = remove_unsafe_char($_GET['id']);
if (! is_numeric($id)) {
    die('供应商编号要是数字!');
}

$sql = "delete from supplier where sid='$id'";
$result = mysql_query($sql, $db);
if (! $result) {
    die('删除供应商失败!'.mysql_error());
}

echo "<script>alert('成功删除供应商信息');location='./m-supplier.php'</script>";
mysql_close($db);
