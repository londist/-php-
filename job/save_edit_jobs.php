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

if (empty($_POST['id']) or empty($_POST['name']) or empty($_POST['salary'])) {
    echo '<script>alert("职位编号，名称，薪水都不能为空！");location="./m-jobs.php"</script>';
    die(0);
}

$id = $_POST['id'];
$name = $_POST['name'];
$salary = $_POST['salary'];
if (! is_numeric($id)) {
    die('职位编号一定要是数字!');
}

$id = remove_unsafe_char($id);
$name = remove_unsafe_char($name);
$salary = floatval(remove_unsafe_char($salary));

$sql = "select * from jobs where jid='$id'";
if (0 == mysql_num_rows(mysql_query($sql, $db))) {
    die('职位中没有该记录'.$id);
}

$sql_update = "update jobs set name='$name' , salary=$salary where jid='$id'";
$result = mysql_query($sql_update, $db);
if (! $result) {
    die('修改职位失败! <br/>'.mysql_error());
}

echo "<script>alert('成功修改职位');location='./m-jobs.php'</script>";
mysql_close($db);
