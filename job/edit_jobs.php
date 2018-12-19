<?php
include("../db_conn.php");
include("../util.php");
handle_login();
utf8();

if (! isset($_GET['id'])) {
    die("职位编号不能为空");
}

$id = $_GET['id'];
if (! is_numeric($id)) {
    die("职位编号一定要是数字!");
}

$id = remove_unsafe_char($id);
$sql = "select * from jobs where jid='$id'";

$result = mysql_query($sql, $db);
if (! $result) {
    die("查询职位失败" . mysql_error());
}

$row = mysql_fetch_array($result);
if (! $row) {
    die("没有该职位!");
}

mysql_close($db);

include("../template/header.html");
?>
<section class="content-header"><h1>编辑职位</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">编辑</div>
                <form action="save_edit_jobs.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label>职位名称</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>薪水</label>
                            <input type="text" class="form-control" name="salary" value="<?php echo $row['salary']; ?>">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?php echo $row['jid']; ?>">
                        <input type="submit" value="提交" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include("../template/footer.html");
