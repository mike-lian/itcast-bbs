<?php 

// 1, 加载项目初始化文件
include '../init.php';

// 2, 加载数据连接文件
include DIR_CORE . 'MySQLDB.php';

// 以下的代码跟分页有关
// (1) 接受当前的页码数
$pageNum = isset($_GET['num']) ? $_GET['num'] : 1;
// (2) 定义每一页显示的记录数
$rowPerPage = 5;
// (3) 查询总记录数
$sql = "select count(*) as sum from publish";
$result = my_query($sql);
$row = mysql_fetch_assoc($result); // 得到一个数组
$rowCount = $row['sum']; // 得到总记录数
// (4) 计算总页数
$pages = ceil($rowCount / $rowPerPage);

// (5) 拼凑出页码字符串
$strPage = '';
// 拼凑出首页
$strPage .= "<a href='./list_father.php?num=1'>首页</a>";
// 拼凑出上一页
$preNum = $pageNum == 1 ? 1 : $pageNum-1;
$strPage .= "<a href='./list_father.php?num=$preNum'><<上一页</a>";
// 确定显示的第1个页码$startNum的值
if($pageNum <= 3) {
	$startNum = 1;
}else {
	$startNum = $pageNum - 2;
}
// 确定startNum最大值
if($startNum > $pages - 4) {
	$startNum = $pages - 4;
}
// 防止$startNum出现负值
if($startNum <= 1) {
	$startNum = 1;
}
// 确定显示的最后1个页码$endNum的值
$endNum = $startNum + 4;
// 防止$endNum越界
if($endNum > $pages) {
	$endNum = $pages;
}

// 拼凑出中间页码
for($i=$startNum;$i<=$endNum;$i++) {
	if($i == $pageNum) {
		$strPage .= "<a href='./list_father.php?num=$i'><font color='red'>$i</font></a>";
	}else {
		$strPage .= "<a href='./list_father.php?num=$i'>$i</a>";
	}
	
}
// 拼凑出下一页
$nextNum = $pageNum == $pages ? $pages : $pageNum + 1;
$strPage .= "<a href='./list_father.php?num=$nextNum'>>>下一页</a>";
// 拼凑出尾页
$strPage .= "<a href='./list_father.php?num=$pages'>尾页</a>";

// 分页到此结束

// 提取publish表的数据
$offset = ($pageNum-1) * $rowPerPage;
$sql = "select * from publish order by pub_time desc limit $offset , $rowPerPage";
$result = my_query($sql);
 
// 3, 提取publish表的数据
$sql = "select * from publish order by pub_time desc limit $offset , $rowPerPage";
$result = my_query($sql);

// 4, 加载视图文件
include DIR_VIEW . 'list_father.html';

 ?>