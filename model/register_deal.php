<?php 

// 1, 加载项目初始化文件
include '../init.php';

// 2, 连接数据库
//$link = mysql_connect('localhost:3306', 'root', 'lw050109');
//mysql_query('set names utf8');
//mysql_query('use bbs');

include DIR_CORE . 'MySQLDB.php';
// 3, 接收数据
$user_name = trim($_POST['user_name']);
$user_password1 = trim($_POST['user_password1']);
$user_password2 = trim($_POST['user_password2']);
$vcode = trim($_POST['vcode']);

// 4, 判断用户数据合法性
// 4,1 判断用户名密码是否为空
if(empty($user_name) || empty($user_password1) || empty($user_password2)) {
	// 非法,跳转
	jump('./register.php','用户名和密码不能为空！请您重新注册！');
}
// 4,2 判断用户名的长度
if(strlen($user_name) < 6 || strlen($user_name) > 16) {
	// 非法,跳转
	jump('./register.php','用户名在6到10位之间！请重新注册！');
}
// 4,3 判断两次数据的密码是否一致
if($user_password1 !== $user_password2) {
	// 非法，跳转
	jump('./register.php','两次密码输入不一致！请重新注册');
}

// 4,4 判断密码的长度
	if(strlen($user_password1) < 6 || strlen($user_password1) > 16) {
		// 非法，跳转
	jump('./register.php','密码在6到10位之间！请重新注册');
	}
// 4,5 判断用户名是否已经存在
$sql = "select * from user where user_name='$user_name'";
mysql_query($sql);
if(mysql_affected_rows() > 0) {
	// 说明用户名已经存在
	// 非法，跳转
	jump('./register.php','您输入的用户名已经存在！请重新注册');
}

// 5, 数据入库
$user_password = md5($user_password1);
$sql = "insert into user value(null,'$user_name','$user_password')";
// 执行
$result = mysql_query($sql);
if($result) {
	// 注册成功，跳转
	jump('./login.php','注册成功，2秒后跳转到登录页面');
}else {
	// 入库失败
	jump('./register.php','发生未知错误，注册失败');
}

 ?>