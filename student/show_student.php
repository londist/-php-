<?php
include("../conn.php");
include("../util.php");
handle_login();
utf8();

$sql = "select * from student";
$result = mysql_query($sql, $db);
mysql_close($db);
include("../template/header.html");
?>
<section class="content-header"><h1>学生信息列表</h1></section>
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
                            <th>操作</th>
                        </tr>
<?php
while ($row = mysql_fetch_array($result)) {
    echo "<tr><td>".$row['sid'] ."</td><td>". $row['name'] ."</td><td>". $row['sex'] ."</td><td>". $row['tel'] ."</td><td><a href=del_student.php?sid=" . $row['sid'] . " onclick=\"return confirm('确定删除?');\">删除</a></td></tr>";
}
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
