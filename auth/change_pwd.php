<?php
include '../util.php';
is_user();
utf8();
include '../template/header.html';
?>
<section class="content-header"><h1>修改密码</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="update_pwd_handler.php" method="post">
                    <div class="box-body">
                        <p><?php echo '用户：'.$_SESSION['user']; ?></p>
                        <div class="form-group">
                            <label for="pw0">旧密码</label>
                            <input type="password" name="pw0" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pw1">新密码</label>
                            <input type="password" name="pw1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pw2">确认新密码</label>
                            <input type="password" name="pw2" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" value="修改密码" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include 'template/footer.html';
