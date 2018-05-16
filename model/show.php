<?php 

// 1, 加载项目初始化文件
include '../init.php';

// 2, 加载数据库连接文件
include DIR_CORE . 'MySQLDB.php';

// 3, 接收pub_id
$pub_id = $_GET['pub_id']; // 楼主帖子的ID号

// 6, 每点一次,楼主的pub_hits加1
if(!$_GET['action']) {
	$sql = "update publish set pub_hits = pub_hits + 1 where pub_id = $pub_id";
	my_query($sql);
}

// 4, 提取楼主帖子的信息
$sql = "select * from publish where pub_id = $pub_id";
$result = my_query($sql);
$row = mysql_fetch_assoc($result);

// 7, 提取回帖的资源结果集
$rep_sql = "select * from reply where rep_pub_id = $pub_id order by rep_time";
$rep_result = my_query($rep_sql);


// 5, 加载视图文件
include DIR_VIEW . 'show.html';





 ?>