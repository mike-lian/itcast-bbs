<?php 

/**
 * 项目初始化文件
 */

// 1, 设置响应头(设置文字编码)
header("Content-type:text/html;charset=utf-8");

// 2, 定义目录常量
// 定义根目录常量
define("DIR_ROOT", str_replace('\\','/',__DIR__) . '/');
// 定义配置文件目录常量
define("DIR_CONFIG", DIR_ROOT . 'config/');
// 定义核心文件目录常量
define("DIR_CORE", DIR_ROOT . 'core/');
// 定义业务逻辑处理目录常量
define("DIR_MODEL", DIR_ROOT . 'model/');
// 定义模版文件目录常量
define("DIR_VIEW", DIR_ROOT . 'view/');
// 定义公开目录常量
define("DIR_PUBLIC", '/public'); // 这里的'/'代表根目录

// 3,封装跳转函数
/**
 * 封装跳转函数
 * @param string $url 跳转的url
 * @param string $info 跳转时的提交信息
 * @param int $time 跳转时候的等待时间
 */
function jump($url,$info=NULL,$time=2) {
	if($info == NULL) {
		// 说明是直接跳转
		header("location:$url");
		die;
	} else {
		// 说明是刷新跳转
		header("refresh:$time;url=$url");
		die("$info");
	}	
}

 ?>