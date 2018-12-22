<?php
include '../db_conn.php';
include '../util.php';
handle_login();
utf8();

if (empty($_GET['id'])) {
    die("编辑供应商信息，供应商编号不能空!");
}

$id = remove_unsafe_char($_GET['id']);
if (! is_numeric($id)) {
    die('供应商编号一定要是数字！');
}

$sql = "select * from supplier where sid='$id'";
$result = mysql_query($sql, $db);
if (! $result) {
    die('查询供应商信息失败！'.mysql_error());
}
$row = mysql_fetch_array($result);
if (! $row) {
    die('数据库没有改供应商的信息！');
}
mysql_close($db);
include '../template/header.html';
?>
<section class="content-header"><h1>供应商管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">修改供应商</div>
                <form action="save_edit_supplier.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                        </div>
                        <div class="form-control">
                            <label for="sex">性别</label>
                            <input type="radio" name="sex" value="男" <?php if ('男' == $row['sex']) {
    echo 'checked';
} ?>> 男
                            <input type="radio" name="sex" value="女" <?php if ('女' == $row['sex']) {
    echo 'checked';
} ?>> 女
                        </div>
                        <div class="form-group">
                            <label for="name">电话</label>
                            <input type="text" name="tel" class="form-control"value="<?php echo $row['tel']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">地址</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="desc">描述</label>
                            <input type="text" name="desc" class="form-control" value="<?php echo $row['description']; ?>">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="修改供应商">
                        <input type="hidden" name="id" value="<?php echo $row['sid']; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include '../template/footer.html';
