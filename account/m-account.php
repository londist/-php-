<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

$sql = "select * from account where proi!=0";
$result = mysql_query($sql,$db);
if (! $result)
    die ("查询帐号失败 !" . mysql_error());
include ("../template/header.html");
?>
<section class="content-header"><h1>账号管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">添加帐号</div>
                <form action="add_account.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">用户名</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="proi">用户名</label>
                            <select name="proi" class="form-control">
                                <option value="1">进货记录员</option>
                                <option value="2">消费查询员</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="添加帐号">
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
                            <th>用户名</th>
                            <th>权限</th>
                            <th>操作</th>
                        </tr>
<?php
while ($row = mysql_fetch_array($result)) {
    if ($row['proi'] == 1)
        $s_proi = "进货记录员";
    else if ($row['proi'])
        $s_proi = "消费查询员";
    else
        die("权限分配出错!");
    echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$s_proi."</td><td><a href='del_account.php?id=".$row['id']."' onclick=\"return confirm('确定删除?'); \" >删除</a>  <a href='edit_account.php?id=".$row['id']."'>编辑</a></td></tr>";
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
