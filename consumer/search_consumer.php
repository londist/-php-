<?php
include '../db_conn.php';
include '../util.php';
handle_login();
header('Content-Type:text/html; charset=utf-8');

if (empty($_GET['id'])) {
    echo '<html>
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
  </html>';
    echo '<script>alert("请添加学号");location="./m-consumer.php"</script>';
}

$id = $_GET['id'];
$id = remove_unsafe_char($id);

$sql = "select * from student,consumer where sid='$id' and sid=cid";
$result = mysql_query($sql, $db);
if (! $result) {
    die('查找消费者信息失败!<br>'.mysql_error());
}

$row = mysql_fetch_array($result);
if (! $row) {
    echo '<script>alert("没有该消费者的信息！");location="./m-consumer.php"</script>';
}

mysql_close($db);
include '../template/header.html';
?>
<section class="content-header"><h1>消费者信息</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>学号</th>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>电话</th>
                            <th>金额</th>
                            <th>操作</th>
                        </tr>
<?php
echo '<tr><td>'.$row['sid'].'</td><td>'.$row['name'].'</td><td>'.$row['sex'].'</td><td>'.$row['tel'].'</td><td>'.$row['cur_money'].'</td><td><a href=edit_consumer.php?sid='.$row['sid'].'>编辑</a></td></tr>';
?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include '../template/footer.html';
?>
