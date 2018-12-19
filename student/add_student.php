<?php

include '../db_conn.php';
include '../util.php';
handle_login();

header('Content-Type:text/html;charset=utf-8');

if (isset($_POST['id']) and isset($_POST['name'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    if (empty($id) || empty($name)) {
        die('学号或姓名不能为空');
    }
    $sex = isset($_POST['sex']) ? ($_POST['sex']) : '?';
    $tel = isset($_POST['tel']) ? ($_POST['tel']) : '';
    if (has_unsafe_char($id) or has_unsafe_char($name) or has_unsafe_char($sex) or has_unsafe_char($tel)) {
        die('不允许加入特殊字符!<br>');
    }

    if ($sex) {
        if ('男' != $sex and '女' != $sex) {
            die('未知性别!');
        }
    }

    $sql = "insert into student (sid,name,sex,tel) values ('$id','$name','$sex','$tel')";
    $result = mysql_query($sql, $db);
    if (! $result) {
        die('添加学生信息失败<br/>'.mysql_error());
    } else {
        echo "<script>alert('成功添加一个学生信息!');location='./m-student.php'</script>";
    }
}
