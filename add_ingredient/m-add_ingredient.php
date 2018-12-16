<?php
include("../db_conn.php");
include("../util.php");
m1_login();

utf8();
$sql_mate = "select * from ingredient";
$sql_supp = "select * from supplier";
$sql_work = "select * from staff";

$result_1 = mysql_query($sql_mate, $db);
$result_2 = mysql_query($sql_supp, $db);
$result_3 = mysql_query($sql_work, $db);

if (! $result_1) {
    die("查询食材记录失败" . mysql_error());
}
if (! $result_2) {
    die("查询供应商失败" . mysql_error());
}
if (! $result_3) {
    die("查询员工信息失败" . mysql_error());
}

include("../template/header.html");
?>
<section class="content-header"><h1>食材进货管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">添加进货记录</div>
                <form action="add__record.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="ingredient">食材</label>
                            <select name="ingredient" class="form-control">
                                <?php
                                    while ($row_1 = mysql_fetch_array($result_1)) {
                                        echo "<option value='".$row_1['mid']."'>".$row_1['name']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="supplier">供应商</label>
                            <select name="supplier" class="form-control">
                                <?php
                                    while ($row_2 = mysql_fetch_array($result_2)) {
                                        echo "<option value='".$row_2['sid']."'>".$row_2['name']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="charge">饭堂负责人</label>
                            <select name="charge" class="form-control">
                                <?php
                                    while ($row_3 = mysql_fetch_array($result_3)) {
                                        echo "<option value='".$row_3['wid']."'>".$row_3['name']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">单价</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="price">
                                <span class="input-group-addon">元/公斤</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="account">数量</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="account">
                                <span class="input-group-addon">公斤</span>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" value="提交" class="btn btn-primary">
                        <a href="show_add_ingredient.php" class="btn btn-primary pull-right">查看所有进货记录</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include("../template/footer.html");
