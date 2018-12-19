<?php
include("../db_conn.php");
include("../util.php");
handle_login();
header("Content-Type:text/html; charset=utf8");

if (! isset($_GET['id'])) {
    die("请添加学号<br>");
}

$id = $_GET['id'];
$id = remove_unsafe_char($id);

$sql = "select * from student where sid='$id'";
$result = mysql_query($sql, $db);
if (!$result) {
    die("查找学生信息失败!<br>" . mysql_error());
}

$row = mysql_fetch_array($result);
if (! $row) {
    die("没有该学号的学生信息!");
}
mysql_close($db);
include("../template/header.html");
?>
<section class="content-header"><h1>学生信息</h1></section>
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
echo "<tr><td>".$row['sid'] ."</td><td>". $row['name'] ."</td><td>". $row['sex'] ."</td><td>". $row['tel'] ."</td><td><a href=del_student.php?sid=" . $row['sid'] . " onclick=\"return confirm('确定删除?');\">删除</a></td></tr>";
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
