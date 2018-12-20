<?php
include '../db_conn.php';
include '../util.php';
utf8();
m2_login();

$sql = 'select * from consumption_record';
$result = mysql_query($sql, $db);
if (! $result) {
    die('查询消费记录失败<br/>'.mysql_error());
}
include '../template/header.html';
?>
<section class="content-header"><h1>消费记录</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
            <div class="box-header">模拟就餐刷卡</div>
                <form action="show_consumption_record.php" method="get">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id">学号</label>
                            <input type="text" name="id" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" value="查询" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
    $temp = 1 == $row['operator'] ? '消费' : '充值';
    echo "<tr><td>$n</td><td><a href='../consumer/search_consumer.php?id=".$row['cid']."'>".$row['cid']."</a></td><td>$temp</td><td>".$row['money'].'</td><td>'.$row['last_modified'].'</td></tr>';
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
include '../template/footer.html';
