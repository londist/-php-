<?php
include '../db_conn.php';
include '../util.php';
handle_login();
utf8();
if (! isset($_GET['id'])) {
    die('编辑食材，请输入食材的编号!');
}

$id = $_GET['id'];
if (! is_numeric($id)) {
    die('食材的编号一定要是数字!');
}

$id = remove_unsafe_char($id);
$sql = "select * from ingredient where mid='$id'";
$result = mysql_query($sql, $db);
if (! $result) {
    die('查询食材信息失败! <br/>'.mysql_error());
}
$row = mysql_fetch_array($result);
if (! $row) {
    die('没有该食材的信息!');
}
mysql_close($db);
include '../template/header.html';
?>
<section class="content-header"><h1>食材管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">编辑食材</div>
                <form action="save_edit_ingredient.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">名称</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="desc">描述</label>
                            <input type="text" name="desc" class="form-control" value="<?php echo $row['description']; ?>">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="提交">
                        <input type="hidden" name="id" value="<?php echo $row['mid']; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include '../template/footer.html';
