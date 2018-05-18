<?php 

include '../init.php';
include DIR_CORE . 'MySQLDB.php';

// 1, 接受数据
$rep_content = $_POST['rep_content'];
$rep_pub_id = $_GET['pub_id'];
$rep_quote_id = $rep_id = $GET['rep_id'];

$rep_num = $num = $_GET['num'];

// 2, 判断数据合法性
if(empty($rep_content)) {
	// 非法，跳转
	jump("./quote.php?num=$num&pub_id=$pub_id&rep_id=$rep_id",'内容不能为空');
}
// 3, 数据入库
// 3.1 提取回复者的名字
session_start();
$rep_user = $_SESSION['userInfo']['user_name'];
// 3.2 引用回复的时间
$rep_time = time();
// 3.3 执行
$sql = "insert into reply values(null,$rep_pub_id,'$rep_user','$rep_content',$rep_time,$rep_num,$rep_quote_id)";
$result = my_query($sql);
// 4, 判断执行结果
if($result) {
	// 入库成功
	jump("./quote.php?num=$num&pub_id=$pub_id&rep_id=$rep_id",'发生未知错误');
}

 ?>