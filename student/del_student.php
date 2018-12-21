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

if ( empty($_GET['sid'])) {
    echo '<script>alert("请输入学号");location="./m-student.php"</script>';
    die(0);
}

$sid = remove_unsafe_char($_GET['sid']);
if (! mysql_fetch_row(mysql_query("select * from student where sid='$sid'"))) {
    die("不存在学号为 $sid  的学生!<br/>");
}

$sql = "delete from student where sid='$sid'";
$result = mysql_query($sql, $db);
if (! $result) {
    echo '<script>alert("删除失败！");location="./m-student.php"</script>';
    die(0);
} else {
    echo "<script>alert('删除成功');location='./m-student.php'</script>";
}
mysql_close($db);

?>

