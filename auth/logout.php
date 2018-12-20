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
    <link
      rel="stylesheet"
      href="/assets/bootstrap/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="/assets/font-awesome/css/font-awesome.min.css"
    />
  </head>

    <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">注销成功</div>
      <div class="login-box-body">
      <br>
        <form action="/" method="post" accept-charset="utf-8">
        <div class="row">
            <div class="col-xs-8">点击右侧按钮返回首页</div>
            <div class="col-xs-4">             
              <button type="submit" class="btn btn-primary btn-block btn-flat" style="margin:auto">
                首页
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="/assets/jquery/dist/jquery.min.js"></script>
    <script src="/assets/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>

</html>

<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['admin']);
unset($_SESSION['m1']);
unset($_SESSION['m2']);
?>


