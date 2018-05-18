<?php 

// 1, 加载项目初始化文件
include '../init.php';

// 2, 判断用户是否登陆
session_start();
if(!isset($_SESSION['userInfo'])) {
	jump('./login.php','请您先登陆');
}

// 3, 加载数据库连接文件
include DIR_CORE . 'MySQLDB.php';

// 4, 连接数据库
$num = $_GET['num']; // 楼层数
$pub_id = $_GET['pub_id']; // 楼主的id
$rep_id = $_GET['rep_id']; // 被引用帖子的id;

// 5, 提取楼主的信息
$sql = "select * from publish where pub_id=$pub_id";
$result = my_query($sql);
$row = mysql_fetch_assoc($result);

// 6, 提取被引用的帖子的信息
$sql = "select * from reply where rep_id=$rep_id";
$result = my_query($sql);
$rep_row = mysql_fetch_assoc($result);

// 7, 加载视图文件
include DIR_VIEW . 'quote.html';

 ?>