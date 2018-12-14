<?php
include("../conn.php");
include("../util.php");
utf8();

$sql = "select * from food";
$result = mysql_query($sql, $db);
if (! isset($result)) {
    die("查询食物失败<br/>".mysql_error());
}
include("../template/header.html");
?>
<section class="content-header"><h1>消费记录</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">模拟就餐刷卡</div>
                <form action="add_consumption_record.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id">学号</label>
                            <input type="text" name="id" class="form-control">
                        </div>
                        <table class="table table-hover">
                            <tr>
                                <th style="width: 5%">选择</th>
                                <th>序号</th>
                                <th>菜名</th>
                                <th>价格</th>
                                <th>描述</th>
                            </tr>
<?php
$n = 1;
while ($row = mysql_fetch_array($result)) {
    echo "<tr><td><input type='checkbox' name='food[]' value='".$row['fid']."'></td><td>$n</td><td>".$row['name']."</td><td>".$row['price']."</td><td>".$row['description']."</td></tr>";
    $n = $n + 1;
}
mysql_close($db);
?>
                        </table>
                    </div>
                    <div class="box-footer">
                        <input class="btn btn-primary" type="submit" value="点菜">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include("../template/footer.html");
