<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();
$sql = "select * from jobs";
$result = mysql_query($sql, $db);
if (! $result)
    die("连接数据库失败" . mysql_error());
include ("../template/header.html");
?>
<section class="content-header"><h1>添加员工信息</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">添加一个员工</h3>
                </div>
                <form action="add_staff_submit.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-control">
                            <label for="sex">性别</label>
                            <input type="radio" name="sex" value="男" checked> 男
                            <input type="radio" name="sex" value="女"> 女
                        </div>
                        <div class="form-group">
                            <label for="job">职位</label>
                            <select name="job" class="form-control">
<?php
while ($row = mysql_fetch_array($result))
    echo "<option value=" . $row['jid'] . ">" . $row['name'] . "</option>";
mysql_close($db);
?>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="添加">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include ("../template/footer.html");
?>
