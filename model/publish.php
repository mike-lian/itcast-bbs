<?php 

// 1, 加载项目初始化文件
include '../init.php';

// 3, 判断用户是否登陆
session_start();
if(!isset($_SESSION['userInfo'])) {
	// 说明用户没有登陆
	jump('./login.php','请您先登陆!');
}

// 2, 加载视图文件
include DIR_VIEW . 'publish.html';




 ?>