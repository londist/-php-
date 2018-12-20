<?php

include '../db_conn.php';
include '../util.php';
handle_login();
utf8();
include '../template/header.html';

for($i=1;$i<18;$i++){
    echo "<br>";
}

?>

<div>
    <h2 class="col-md-12" style="text-align:center;">欢迎登录饭堂就餐管理系统！</h2>
</div>

<?php
    include '../template/footer.html';
?>