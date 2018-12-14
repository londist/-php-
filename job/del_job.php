<?php
include("../conn.php");
include("../util.php");
handle_login();
utf8();

if (! isset($_GET['id'])) {
    die("职位编号不能为空");
}

$id = $_GET['id'];
if (! is_numeric($id)) {
    die("职位编号一定要是数字!");
}

$id = remove_unsafe_char($id);
$sql = "delete from jobs where jid='$id'";

$result = mysql_query($sql, $db);
if (! $result) {
    die("删除职位失败!" . mysql_error());
}

$url = referer("m-job.php");
echo "<script>alert('成功删除职位');location='$url'</script>";
mysql_close($db);
