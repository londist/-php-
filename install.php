<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>饭堂就餐管理系统</title>
    <meta
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
      name="viewport"
    />
    <link
      rel="stylesheet"
      href="/assets/bootstrap/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css" />
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-box-body">
      <h3 style="text-align:center">初始化中...</h3><br>

<meta charset="utf-8" />
<?php
$username = 'root';
$password = 'root';
$hostname = 'localhost';

$db_name = 'canteen';

$db = mysql_connect($hostname, $username, $password);
mysql_select_db($db_name, $db);

$student = 'create table if not exists student (
    sid char(10) primary key,
    name char(10) not null,
    sex char(3) not null,
    tel varchar(13)) engine=innodb';

$consumer = 'create table if not exists consumer (
    cid char(10) primary key ,
    cur_money float,
    foreign key (cid) references student(sid) on delete cascade on update cascade ) engine=innodb';

$supplier = 'create table if not exists supplier (
    sid int primary key auto_increment,
    name char(10) not null,
    sex char(3) not null,
    tel varchar(13),
    address char(100),
    description char(200),
    last_modified datetime)';

$jobs = 'create table if not exists jobs (
    jid int primary key auto_increment,
    name char(100) not null,
    salary float )';

$staff = 'create table if not exists staff (
    wid int primary key auto_increment,
    name char(10) not null,
    sex char(3) ,
    jid int,
    birth date,
    foreign key (jid) references jobs(jid))';

$ingredient = 'create table if not exists ingredient (
    mid int primary key auto_increment,
    name char(20),
    description char(200))';

$food = 'create table if not exists food (
    fid int primary key auto_increment,
    name char(20),
    description char(200),
    price float not null)';

$add_ingredient = 'create table if not exists add_ingredient (
    aid int primary key auto_increment,
    mid int,
    sid int,
    price float not null,
    amount float not null,
    last_modified datetime,
    charge int,
    foreign key (mid) references ingredient(mid),
    foreign key (sid) references supplier(sid),
    foreign key (charge) references staff(wid))';

$consumption_record = 'create table if not exists consumption_record (
    id int primary key auto_increment,
    cid char(10),
    money float not null,
    operator int not null,
    last_modified datetime,
    add_date date,
    foreign key (cid) references consumer(cid))';

$account = 'create table if not exists account (
    id int primary key auto_increment,
    username char(20) not null unique,
    password char(32) not null ,
    proi int not null )';

function create_table($sql, $table)
{
    global $db;
    $result = mysql_query($sql, $db);
    if (! $result) {
        mydie("创建表 $table 失败<br>");
    } else {
        echo "成功创建表 $table<br>";
    }
}

function mydie($info)
{
    echo $info;
    exit();
}

create_table($student, 'student');
create_table($consumer, 'consumer');
create_table($supplier, 'supplier');
create_table($jobs, 'jobs');
create_table($staff, 'staff');
create_table($ingredient, 'ingredient');
create_table($food, 'food');
create_table($add_ingredient, 'add ingredient');
create_table($consumption_record, 'consumption_record');
create_table($account, 'account');

function add_jobs()
{
    $sql = "insert into jobs (name) values ('系统管理员')";
    if (! mysql_query($sql, $db)) {
        mydie('创建职位失败<br>');
    } else {
        echo '成功创建一条职位记录<br>';
    }
}

function add_staff()
{
    $sql = "insert into staff (name) values ('系统管理员')";
    if (! mysql_query($sql, $db)) {
        mydie('创建员工失败<br>');
    } else {
        echo '成功创建一个员工<br>';
    }
}

function add_admin()
{
    global $db;
    $canteen_admin = 'admin';
    $canteen_admin_pwd = 'admin';
    $canteen_admin_pwd_cry = md5($canteen_admin_pwd);
    $sql = "insert into account (username,password,proi) values ('$canteen_admin','$canteen_admin_pwd_cry',0)";
    if (! mysql_query($sql, $db)) {
        echo '创建管理员失败<br>';
    } else {
        echo "<b>成功创建管理员帐号! 用户名: $canteen_admin, 密码: $canteen_admin_pwd</b><br>";
    }
}

add_admin();
?>

        <br><h3 style="text-align:center">初始化成功</h3><br>
            <div style="text-align:center">
                <a href="/auth/login.html" class="btn btn-primary" style="font-size:13px; text-align:center">登录</a>
            </div>
        </div>
    </div>
    <script src="/assets/jquery/dist/jquery.min.js"></script>
    <script src="/assets/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>

