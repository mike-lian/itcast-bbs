<?php 

// 1, 加载初始化文件
include '../init.php';

// 2, 加载数据库连接文件
include DIR_CORE . 'MySQLDB.php';

// 3, 接收楼主帖子的id号
$pub_id = $_GET['pub_id'];

// 4, 提取楼主帖子的信息
$sql = "select * from publish where pub_id = $pub_id";
$result = my_query($sql);
$row = mysql_fetch_assoc($result);

// 5, 加载视图文件
include DIR_VIEW . 'reply.html';




 ?>