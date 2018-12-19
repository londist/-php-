<?php
include("../db_conn.php");
include("../util.php");
handle_login();
header('Content-Type:text/html;charset=utf-8');

if (isset($_POST['id']) and isset($_POST['money'])) {
    $id = $_POST['id'];
    $money = $_POST['money'];
    if (empty($id) || empty($money))
        die("学号或金额不能为空");
    
    if (has_unsafe_char($id) or has_unsafe_char($money)) {
        die("不允许加入特殊字符!<br>");
    }

    $id = remove_unsafe_char($id);
    $money = remove_unsafe_char($money);
    $sql = "insert into consumer values ('$id','$money')";
    $result = mysql_query($sql, $db);
    if (! $result) {
        die("添加消费者信息失败<br/>" . mysql_error());
    } else {
        $url = referer("m-consumer.php");
        echo "<script>alert('成功添加一个消费者信息!');location='$url'</script>";
    }
}
