<?php
include("../db_conn.php");
include("../util.php");
handle_login();
utf8();

$sql = "select * from jobs order by jid desc ";
$result = mysql_query($sql, $db);
include("../template/header.html");
?>
<section class="content-header"><h1>职位管理</h1></section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">添加职位</h3>
                </div>
                <form action="add_position.php" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">职位名称</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tel">薪水</label>
                            <input type="text" name="salary" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="增加职位">
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
                            <th>职位名称</th>
                            <th>薪水</th>
                            <th>操作</th>
                        </tr>
<?php
while ($row = mysql_fetch_array($result)) {
    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['salary'] .
    "</td><td><a href='del_position.php?id=" . $row['jid'] .
    "' onclick=\"return confirm('确认删除?'); \">删除该职位</a>" .
    "&nbsp;&nbsp;<a href='edit_position.php?id=" . $row['jid'] . "'>编辑</a></td></tr>";
}

mysql_close($db);
?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
include("../template/footer.html");
