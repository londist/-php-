<?php
include ("../util.php");
include ("../conn.php");
handle_login();
utf8();
include ("../template/header.html");
?>
<section class="content-header"><h1>供应商管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">添加供应商</div>
                <form action="add_supply.php" method="post">
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
                            <label for="name">电话</label>
                            <input type="text" name="tel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">地址</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="desc">描述</label>
                            <input type="text" name="desc" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="增加供应商">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">所有供应商</div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                    <tr>
                        <th>编号</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <th>电话</th>
                        <th>地址</th>
                        <th>描述</th>
                        <th>最后修改时间</th>
                        <th>操作</th>
                    </tr>
<?php
$sql = "select * from supply";
$result = mysql_query($sql,$db);
if (! $result)
    die("查询供应商失败" . mysql_error());
while ($row = mysql_fetch_array($result)) {
    echo "<tr><td>".$row['sid']."</td><td>".$row['name']."</td><td>".$row['sex']."</td><td>".$row['tel']."</td><td>".$row['address']."</td><td>".$row['description']."</td><td>".$row['last_modified']."</td><td><a href='del_supply.php?id=".$row['sid']."' onclick=\"return confirm('确定删除?'); \">删除</a>  &nbsp;<a href='edit_supply.php?id=".$row['sid']."'>编辑</a></td></tr>";
}

mysql_close($db);
?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include ("../template/footer.html");
