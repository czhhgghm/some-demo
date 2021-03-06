<?php  

// 根据用户邮箱获取用户头像

require_once '../../config.php';

// 1. 接受一下传递过来的邮箱
if (empty($_GET['email'])) {
	exit('缺少必要参数');
}

$email = $_GET['email'];

// 2.查询对应的头像地址
$conn = mysqli_connect(CZH_DB_HOST,CZH_DB_USER,CZH_DB_PASS,CZH_DB_NAME);
if (!$conn) {
	exit('连接数据库失败');
}

$res = mysqli_query($conn, "select avatar from users where email = '{$email}' limit 1;");
if (!$res) {
	exit('查询数据库失败');
}

$row = mysqli_fetch_assoc($res);

// 3.echo出去
echo $row['avatar'];