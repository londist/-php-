<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

$sql = "select wid,name from staff";
$result = mysql_query ($sql,$db);
if (! $result)
    die("查询工人数据库失败! " . mysql_error());

$acount = mysql_num_rows($result);
include ("../template/template.html");
?>
<section class="content-header"><h1>员工管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $acount; ?></h3>
                    <p>现有工人</p>
                </div>
                <div class="icon">
                    <i class="fa fa-male"></i>
                </div>
                <a href="add_staff.php" class="small-box-footer">添加工人信息 <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">查找工人信息</div>
                <form action="search_staff.php" method="get">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id">姓名或编号</label>
                            <input type="text" name="id" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input class="btn btn-primary" type="submit" value="查询">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>工人编号</th>
                            <th>名字</th>
                            <th>操作</th>
                        </tr>
<?php
while ($row = mysql_fetch_array($result)) {
    echo "<tr><td><a href=search_staff.php?id=".$row['wid'] .">" .
        $row['wid'] ."</a></td><td>".
        $row['name'] ."</td><td><a onclick=\"return confirm('确定删除?'); \" href='del_staff.php?id=" .
        $row['wid'] ."'>删除</a> &nbsp;<a href='edit_staff.php?id=" .
        $row['wid'] ."'>编辑</a></td></tr>";
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
