<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

$sql = "select * from food";
$result = mysql_query($sql,$db);
if (! $result)
    die ("查询食物失败 !" . mysql_error());

include ("../template/template.html");
?>
<section class="content-header"><h1>食物管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">添加食物</div>
                <form action="add_food.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">名称</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">价格</label>
                            <div class="input-group">
                                <input type="text" name="price" class="form-control">
                                <span class="input-group-addon">元</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc">描述</label>
                            <input type="text" name="desc" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="添加食物">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>序号</th>
                            <th>食物名称</th>
                            <th>价格</th>
                            <th>描述</th>
                            <th>操作</th>
                        </tr>
<?php
while ($row = mysql_fetch_array($result))
    echo "<tr><td>".$row['fid']."</td><td>".$row['name']."</td><td>".$row['price']."</td><td>".$row['description']."</td><td><a href='del_food.php?id=".$row['fid']."' onclick=\"return confirm('确定删除?'); \" >删除</a>  <a href='edit_food.php?id=".$row['fid']."'>编辑</a></td></tr>";

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
