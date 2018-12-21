<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>注销页面</title>
    <meta
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
      name="viewport"
    />
    <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css" />
  </head>

    <body class="hold-transition login-page">
        <script type='text/javascript'>alert('注销成功，点击确定跳转')</script>
        <div style="margin-top:180px">
            <div class="login-logo">正 在 跳 转 . . .</div>
        </div>
        <meta http-equiv='refresh' content='0; url=/auth/login.html'>
    </body>
</html>


<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['admin']);
unset($_SESSION['m1']);
unset($_SESSION['m2']);
?>


