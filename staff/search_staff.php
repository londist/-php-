<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_GET['id']))
    die ("查询工人信息，姓名或编号不能为空");
$id = remove_unsafe_char($_GET['id']);
if (is_numeric($id))
    $sql = "select wid,staff.name wname,sex,jobs.name jname,salary from staff,jobs where staff.wid='$id'and staff.jid = jobs.jid";
else
    $sql = "select wid,staff.name wname,sex,jobs.name jname,salary from staff,jobs where staff.jid = jobs.jid and staff.name like '$id%'";

$result = mysql_query($sql,$db);
if (! $result)
    die ("查询工人信息失败" . mysql_error());

include ("../template/template.html");
?>
<section class="content-header"><h1>员工管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>序号</th>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>职位</th>
                            <th>薪水</th>
                        </tr>
<?php
while ($row = mysql_fetch_array($result)) {
    echo "<tr><td>" .
        $row['wid'] . "</td><td>" .
        $row['wname'] ."</td><td>" .
        $row['sex'] . "</td><td>" .
        $row['jname'] . "</td><td>" .
        $row['salary'] . "</td></tr>" ;
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
include ("../template/tail.html");
?>
