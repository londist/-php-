<?php
include("../db_conn.php");
include("../util.php");
m1_login();
utf8();

if (empty($_POST['ingredient']) or empty($_POST['supplier']) or empty($_POST['charge']) or empty($_POST['price']) or empty($_POST['account'])) {
    die("添加食材记录中，食材编号，供应商编号，饭堂负责人编号，单价，数量均不能为空");
}

$ingre = remove_unsafe_char($_POST['ingredient']);
$supp = remove_unsafe_char($_POST['supplier']);
$work = remove_unsafe_char($_POST['charge']);
$price = remove_unsafe_char($_POST['price']);
$account = remove_unsafe_char($_POST['account']);

$sql = "insert into add_ingredient (mid,sid,charge,price,amount,last_modified) values ($ingre,$supp,$work,$price,$account,now())";

$result = mysql_query($sql, $db);
if (!$result) {
    die("添加进货记录失败 !<br/>" . mysql_error());
}

echo "<script>alert('成功添加一条进货记录');location='./m-add_ingredient.php'</script>";
mysql_close($db);
