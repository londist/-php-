<meta charset="utf-8">

<?php

include '../db_conn.php';
include '../util.php';

if (! isset($_POST['username']) or ! isset($_POST['password'])) {
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
    echo '用户名或密码错误<br>'."<a href=$ref>返回</a>";
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
            // no break
        case 2:
            $_SESSION['user'] = $username;
            $_SESSION['m2'] = 1;
            header('Location: /consumption_record/showall_consumption_record.php');
            // no break
        default:
            echo '权限出错';
            break;
    }
}
mysql_close($db);
