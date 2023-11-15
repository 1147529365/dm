<?php

//数据库连接 信息配置 永恒资源网 www.yonghengzy.cn
// 数据库地址 数据库帐号 数据库密码 数据库库名
@$connect = mysqli_connect('localhost','dm','123456','dm');
if (!$connect){
    die("连接数据库失败");
}
mysqli_set_charset($connect, "utf8");