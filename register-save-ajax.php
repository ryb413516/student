<?php
	//四大步
	//1.登录连接数据库
	$conn = mysqli_connect("127.0.0.1","root","");
	//2.选择要操作的数据库
	mysqli_select_db($conn,"student");
	//设置读取数据库的编码,不然可能显示乱码
	mysqli_query($conn,"set names utf8");
	//执行查询email的sql
	$email = $_REQUEST["email"];
	$sql = "select * from user where email='{$email}'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)>0) {
		echo "error";
	}else{
		echo "ok";
	}
	mysqli_close($conn);
?>