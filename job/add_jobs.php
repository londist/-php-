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

if (empty($_POST['name']) or empty($_POST['salary'])) {
    echo '<script>alert("职位名称和薪水都不能为空");location="./m-jobs.php"</script>';
    die(0);
}

$name = remove_unsafe_char($_POST['name']);
$salary = floatval(remove_unsafe_char($_POST['salary']));

$sql = "insert into jobs (name,salary) values ('$name',$salary)";
$result = mysql_query($sql, $db);

if (! $result) {
    die('增加职位，写入数据库失败! '.mysql_error());
}

$url = referer('m-jobs.php');
echo "<script>alert('成功添加职位');location='$url'</script>";
