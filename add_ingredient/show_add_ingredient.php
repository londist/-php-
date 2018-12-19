<?php
include '../db_conn.php';
include '../util.php';
m1_login();
utf8();

$sql = 'select add_ingredient.price amprice,account,, from add_ingredient,ingredient,supply,staff where add_ingredient.mid=ingredient.mid and add_ingredient.sid=supply.sid and add_ingredient.charge=staff.wid ';

$sql2 = 'select * from add_ingredient,ingredient where ingredient.mid=add_ingredient.mid';
$result = mysql_query($sql2, $db);
if (! $result) {
    die('查询进货记录失败!<br/>'.mysql_error());
}
include '../template/header.html';
?>
<section class="content-header"><h1>食材进货记录</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box table-repsonsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>序号</th>
                        <th>食材</th>
                        <th>供应商</th>
                        <th>负责人</th>
                        <th>单价</th>
                        <th>数量</th>
                        <th>进货日期</th>
                    </tr>
<?php
$n = 1;
while ($row = mysql_fetch_array($result)) {
    echo "<tr><td>$n</td><td>".$row['name'].'</td><td>'.$row['sid']."</td><td><a href='../staff/search_staff.php?id=".$row['charge']."'>".$row['charge'].'</a></td><td>'.$row['price'].'</td><td>'.$row['amount'].'</td><td>'.$row['last_modified'].'</td><tr>';
    ++$n;
}
mysql_close($db);
?>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include '../template/footer.html';
