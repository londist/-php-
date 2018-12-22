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
m1_login();
utf8();

if (empty($_POST['ingredient']) or empty($_POST['supplier']) or empty($_POST['charge']) or empty($_POST['price']) or empty($_POST['account'])) {
    echo "<script>alert('添加食材记录中，食材编号，供应商编号，饭堂负责人编号，单价，数量均不能为空！'); location='./m-add_ingredient.php'</script>";
    die(0);
}

$ingre = $_POST['ingredient'];
$supp = $_POST['supplier'];
$work = $_POST['charge'];
$price = $_POST['price'];
$account = $_POST['account'];

$ingre = remove_unsafe_char($_POST['ingredient']);
$supp = remove_unsafe_char($_POST['supplier']);
$work = remove_unsafe_char($_POST['charge']);
$price = remove_unsafe_char($_POST['price']);
$account = remove_unsafe_char($_POST['account']);

$sql = "insert into add_ingredient (mid,sid,charge,price,amount,last_modified) values ($ingre,$supp,$work,$price,$account,now());";

$result = mysql_query($sql,$db);
if (! $result){
    die('添加进货记录失败!'.mysql_error());
}

echo "<script>alert('成功添加一条进货记录');location='./m-add_ingredient.php'</script>;";
mysql_close($db);
