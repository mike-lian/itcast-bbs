<?php 

include '../init.php';
/**
 * 注销登陆
 */
// 删除cookie数据
setcookie('user_id','',time()-1,'/');
// 删除session 数据
session_start();
$_SESSION = array();
session_destroy();

// 跳转
jump('../index.php','注销成功，2秒后跳转到首页');


 ?>