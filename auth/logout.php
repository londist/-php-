<meta charset="utf-8" />
<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['admin']);
unset($_SESSION['m1']);
unset($_SESSION['m2']);
?>
<h3>注销成功</h3>
<a href="/">首页</a>
<a href="/auth/login.html">登录</a>
