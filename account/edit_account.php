<?php
include("../db_conn.php");
include("../util.php");
handle_login();
utf8();
if (! isset($_GET['id'])) {
    die("编辑帐号，请输入帐号的编号!");
}

$id = $_GET['id'];
if (! is_numeric($id)) {
    die("帐号的编号一定要是数字!");
}

$id = remove_unsafe_char($id);
$sql = "select * from account where id='$id' and proi!=0";
$result = mysql_query($sql, $db);
if (! $result) {
    die("查询帐号信息失败! <br/>" . mysql_error());
}
$row = mysql_fetch_array($result);
if (! $row) {
    die("没有该帐号的信息!");
}
mysql_close($db);
include("../template/header.html");
?>
<section class="content-header"><h1>账号管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">编辑帐号</div>
                <form action="save_edit_account.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">用户名</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" name="password" class="form-control" placeholder="此项留空则保持原来的密码不变">
                        </div>
                        <div class="form-group">
                            <label for="proi">用户名</label>
                            <select name="proi" class="form-control">
                                <option value="1">进货记录员</option>
                                <option value="2" <?php echo $row['proi'] == '2' ? 'selected' : ''; ?>>消费查询员</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="提交">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include("../template/footer.html");
