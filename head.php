<?php
session_start();
if(empty($_SESSION['usname'])){
	header("Refresh:0;url=login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生管理系统</title>
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<style>
		.userinfo{
			margin-left: 900px;
			/*display: inline-block;*/
		}
	</style>
</head>
<body>
	<div class="sui-container">
		<div class="my-head">北京网络职业学院学生管理系统 V2.0</div>
			<div class="userinfo">欢迎
				<span style="color: red;"><?php echo $_SESSION['usname'];?></span>登录&nbsp;&nbsp;
				<a href="login-out.php">退出</a>
			</div>