<meta charset="utf-8">

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

if (empty($_POST['username']) or empty($_POST['password'])) {
    header('Location: /auth/login.html');
}

$username = remove_unsafe_char(trim($_POST['username']));
$password = md5(remove_unsafe_char(trim($_POST['password'])));

$result = mysql_query("SELECT * FROM account where username='$username' and password='$password'", $db);
if (! $result) {
    die('查表失败'.mysql_error());
}

$arr = mysql_fetch_array($result);
if (! $arr) {
    $ref = $_SERVER['HTTP_REFERER'];
    echo "<script type='text/javascript'>alert('用户名或密码错误，点击确定按钮重新登录');</script>";
    header('refresh:0.4;url=/auth/login.html');
    
} else {
    session_start();
    switch ($arr['proi']) {
        case 0:
            $_SESSION['user'] = $username;
            $_SESSION['admin'] = 1;
            header('Location: /auth/admin.php');
            break;
        case 1:
            $_SESSION['user'] = $username;
            $_SESSION['m1'] = 1;
            header('Location: /ingredient/m-ingredient.php');
        case 2:
            $_SESSION['user'] = $username;
            $_SESSION['m2'] = 1;
            header('Location: /consumption_record/showall_consumption_record.php');
        default:
            echo '权限出错';
            break;
    }
}

mysql_close($db);
