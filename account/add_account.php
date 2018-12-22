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

if (empty($_POST['username']) or empty($_POST['password']) or empty($_POST['proi'])) {
    echo "<script type='text/javascript'>alert('添加账户，用户名、密码、权限都不能为空！');</script>";
    header('refresh:0;url=../account/m-account.php');
    die(0);
}

$us = $_POST['username'];
$pw = $_POST['password'];
$pr = $_POST['proi'];

if ('1' != $pr and '2' != $pr) {
    echo "<script type='text/javascript'>alert('添加账户，分配的权限出错！');</script>";
    header('refresh:0.4;url=../account/m-account.php');
    die(0);
}

$us = remove_unsafe_char($us);
$pw = md5(remove_unsafe_char($pw));
$pr = intval(remove_unsafe_char($pr));

$sql_exist = "select * from account where username='$us'";
if (0 != mysql_num_rows(mysql_query($sql_exist))) {
    echo "<script type='text/javascript'>alert('用户名已被占用！请尝试使用另一用户名。');</script>";
    header('refresh:0.4;url=../account/m-account.php');
    die(0);
}

$sql = "insert into account (username,password,proi) values ('$us','$pw',$pr) ";
$result = mysql_query($sql, $db);
if (! $result) {
    die('添加帐号失败! '.mysql_error());
}

echo "<script>alert('成功添加帐号');location='./m-account.php'</script>";
mysql_close($db);
