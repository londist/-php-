<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_GET['id']))
    die("工人编号不能为空");

$id = $_GET['id'];
if (! is_numeric($id))
    die("编号一定要是数字!");

$id = remove_unsafe_char($id);
$sql = "delete from worker where wid='$id'";

$result = mysql_query($sql,$db);
if (! $result)
    die("删除失败!" . mysql_error());

$url = referer("m-worker.php");
echo "<script>alert('成功删除');location='$url'</script>";
mysql_close($db);
?>
