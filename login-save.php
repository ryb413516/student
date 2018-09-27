<?php
	session_start();
	include 'conn.php';
	$email = $_REQUEST['email'];//邮箱
	$password = $_REQUEST['password'];//密码
	$sql = "select email,password from user where email='{$email}' and password='{$password}'";
	$result = mysqli_query($conn,$sql);
	if($result){
		$_SESSION['usname'] = $email;
		echo "<script>alert('数据登录成功')</script>";
		header("Refresh:0;url=index.php");
	}else{
		echo "<script>alert('数据登录失败')</script>";
		header("Refresh:0;url=login.php");
	}
	mysqli_close($conn);
?>