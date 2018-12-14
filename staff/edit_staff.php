<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_GET['id']))
    die ("员工编号不能为空");

$id = $_GET['id'];
if (! is_numeric($id))
    die ("员工编号一定要是数字!");

$id = remove_unsafe_char($id);
$sql_job = "select * from jobs";
$sql = "select * from staff where wid='$id'";

$result = mysql_query($sql_job, $db);
if (! $result)
    die ("查询职位失败" . mysql_error());

$result2 = mysql_query($sql, $db);
if (! $result2)
    die ("查询员工失败" . mysql_error());
$row2 = mysql_fetch_array($result2);

include ("../template/header.html");
?>
<section class="content-header"><h1>编辑员工信息</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">编辑</div>
                <form action="update_staff_submit.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label>姓名</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $row2['name']; ?>">
                        </div>
                        <div class="form-control">
                            <label for="sex">性别</label>
                            <input type="radio" name="sex" value="男" <?php echo $row2['sex']=='男' ? 'checked' : '' ?>> 男
                            <input type="radio" name="sex" value="女" <?php echo $row2['sex']=='女' ? 'checked' : '' ?>> 女
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
                        <input type="hidden" name="id" value="<?php echo $row2['wid']; ?>">
                        <input type="submit" value="提交" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include ("../template/footer.html");
