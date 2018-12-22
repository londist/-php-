<?php
include '../db_conn.php';
include '../util.php';

handle_login();
utf8();

if (empty($_GET['sid'])) {
    die('请输入学号!');
}

$sid = remove_unsafe_char($_GET['sid']);
$row = mysql_fetch_array(mysql_query("select * from consumer,student where cid='$sid' and sid='$sid'"));
if (! $row) {
    die("不存在学号为 $sid  的学生!<br/>");
}

mysql_close($db);
include '../template/header.html';
?>
<section class="content-header"><h1>编辑消费者信息</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">编辑</div>
                <form action="edit_save_consumer.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label>学号</label>
                            <input type="text" class="form-control" disabled value="<?php echo $row['sid']; ?>">
                        </div>
                        <div class="form-group">
                            <label>姓名</label>
                            <input type="text" class="form-control" disabled value="<?php echo $row['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>性别</label>
                            <input type="text" class="form-control" disabled value="<?php echo $row['sex']; ?>">
                        </div>
                        <div class="form-group">
                            <label>电话</label>
                            <input type="text" class="form-control" disabled value="<?php echo $row['tel']; ?>">
                        </div>
                        <div class="form-group">
                            <label>当前金额</label>
                            <input type="text" class="form-control" name="money" value="<?php echo $row['cur_money']; ?>">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value=<?php echo $row['sid']; ?> >
                        <input type="submit" value="提交" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include '../template/footer.html';
