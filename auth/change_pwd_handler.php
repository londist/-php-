
<?php

include '../db_conn.php';
include '../util.php';
is_user();
header('Content-Type:text/html;charset=utf-8');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $old_pw = md5($_POST['pw0']);
    $new_pw1 = md5($_POST['pw1']);
    $new_pw2 = md5($_POST['pw2']);
    if ($new_pw1 != $new_pw2) {
        die('两个新输入的密码不一致!<br>');
        $ref = $_SERVER['HTTP_REFERER'];
        die("<a href=$ref>返回</a>");
    }
    $sql_q = "select * from account where username='$user' and password='$old_pw'";
    $result = mysql_query($sql_q, $db);
    if (! $result) {
        die('query database error '.mysql_error());
    }
    $row = mysql_fetch_array($result);
    if ($row) {
        $sql_u = "update account set password='$new_pw1' where username='$user' and password='$old_pw'";
        if (! mysql_query($sql_u)) {
            die('修改数据失败! '.mysql_error());
        } else {
            unset($_SESSION['login']);
            echo '<meta http-equiv="refresh" content="2; url=/auth/login.html">';
            echo '已成功修改密码!<br>';
            echo '请重新登录<br>';
            echo '<b>正在跳转....</b>';
        }
    } else {
        echo "<script type='text/javascript'>alert('旧用户密码不正确');</script>";
        $ref = $_SERVER['HTTP_REFERER'];
        echo "<a href=$ref>返回</a>";
    }
} else {
    header('Location: /auth/login.html');
}
