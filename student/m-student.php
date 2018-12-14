<?php
include ("../util.php");
handle_login();
utf8();
include ("../template/template.html");
?>
<section class="content-header"><h1>学生管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">查找</h3>
                </div>
                <form action="search_student.php" method="get">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id">查找学生 学号：</label>
                            <input type="text" name="id" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="查找">
                        <a class="btn btn-primary pull-right" href="show_student.php">
                            列出所有学生信息
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">添加一个学生</h3>
                </div>
                <form action="add_student.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id">学号</label>
                            <input type="text" name="id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tel">电话</label>
                            <input type="text" name="tel" class="form-control">
                        </div>
                        <div class="form-control">
                            <label for="sex">性别</label>
                            <input type="radio" name="sex" value="男" checked> 男
                            <input type="radio" name="sex" value="女"> 女
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="添加学生">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include ("../template/footer.html");
?>
