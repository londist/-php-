<?php
include("../util.php");
handle_login();
utf8();
include("../template/header.html");
?>
<section class="content-header"><h1>消费者管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">查找</h3>
                </div>
                <form action="search_consumer.php" method="get">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id">查找消费者 编号：</label>
                            <input type="text" name="id" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="查找">
                        <a class="btn btn-primary pull-right" href="show_consumer.php">
                            列出所有消费者信息
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">添加一个消费者</h3>
                </div>
                <form action="add_consumer.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id">编号</label>
                            <input type="text" name="id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">金额（元）</label>
                            <input type="text" name="money" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="添加消费者">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include("../template/footer.html");
?>
