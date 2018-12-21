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

if (isset($_POST['id']) and isset($_POST['name'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    if (empty($id) || empty($name)) {
        echo '<script>alert("学号或姓名不能为空！");location="./m-student.php"</script>';
        die(0);
    }
    $sex = isset($_POST['sex']) ? ($_POST['sex']) : '?';
    $tel = isset($_POST['tel']) ? ($_POST['tel']) : '';
    if (has_unsafe_char($id) or has_unsafe_char($name) or has_unsafe_char($sex) or has_unsafe_char($tel)) {
        echo '<script>alert("不允许加入特殊字符！");location="./m-student.php"</script>';
        die(0);
    }

    if ($sex) {
        if ('男' != $sex and '女' != $sex) {
            die('未知性别!');
        }
    }

    $sql = "insert into student (sid,name,sex,tel) values ('$id','$name','$sex','$tel')";
    $result = mysql_query($sql, $db);
    if (! $result) {
        echo '<script>alert("添加学生信息失败！不允许使用相同的学号。");location="./m-student.php"</script>';
        die(0);
    } else {
        echo "<script>alert('成功添加一个学生信息!');location='./m-student.php'</script>";
    }
}
