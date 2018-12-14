<?php
include("../conn.php");
include("../util.php");
utf8();
m2_login();

if (! isset($_GET['id'])) {
    die("请输入学号");
}
$id = remove_unsafe_char($_GET['id']);
if (! is_numeric($id)) {
    die("学号一定要是数字");
}

$sql = "select * from consumption_record where cid='$id'";
$result = mysql_query($sql, $db);
if (! $result) {
    die("查询消费记录失败<br/>" . mysql_error());
}
include("../template/header.html");
?>
<section class="content-header"><h1>消费记录</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <p>
                消费者：
                <a href="../consumer/search_consumer.php?id=<?php echo $id; ?>">
                    <?php $stu = mysql_fetch_row(mysql_query("select name from student where sid='$id'")); echo $stu[0];  ?>
                </a>
            </p>
            <div class="box table-responsive no-padding">
                <div class="box-header">消费记录列表</div>
                <div class="box-body">
                    <table class="table table-hover">
                        <tr>
                            <th>序号</th>
                            <th>编号</th>
                            <th>消费类型</th>
                            <th>金额</th>
                            <th>时间</th>
                        </tr>
<?php
$n = 1;
while ($row = mysql_fetch_array($result)) {
    $temp = $row['operator'] == 1 ? "消费" : "充值";
    echo "<tr><td>$n</td><td><a href='../consumer/search_consumer.php?id=".$row['cid']."'>".$row['cid']."</a></td><td>$temp</td><td>".$row['money']."</td><td>".$row['last_modified']."</td></tr>";
    $n = $n + 1;
}
mysql_close($db);
?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("../template/footer.html");
