<?php
	//四大步
	//1.登录连接数据库
	$conn = mysqli_connect("localhost","root","");
	//2.选择要操作的数据库
	mysqli_select_db($conn,"student");
	//3.运行SQL,执行增、删、改、查
	//设置读取数据库的编码,不然可能显示乱码
	mysqli_query($conn, "set names utf8");
?>