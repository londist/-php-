<?php
include("../conn.php");
include("../util.php");
handle_login();
header("Content-type: text/html; charset=utf-8");

$sql = "select * from student,consumer where consumer.cid=student.sid";
$result = mysql_query($sql, $db);
include("../template/header.html");
?>
<section class="content-header"><h1>所有消费者信息</h1></section>
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
while ($row = mysql_fetch_array($result)) {
    echo "<tr><td>".$row['sid'] ."</td><td>". $row['name'] ."</td><td>". $row['sex'] ."</td><td>". $row['tel'] ."</td><td>". $row['cur_money'] ."</td><td><a href=edit_consumer.php?sid=" . $row['sid'] . ">编辑</a></td></tr>";
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
?>
