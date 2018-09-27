<?php
	include 'conn.php';
	$email = $_REQUEST['email'];//邮箱
	$name = $_REQUEST['name'];//用户名
	$password = $_REQUEST['password'];//密码
	$question = $_REQUEST['question'];//密码提示问题
	$answer = $_REQUEST['answer'];//密码提示问题答案
	$sql = "insert into user(email,name,password,question,answer) value('{$email}','{$name}','{$password}','{$question}','{$answer}')";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>console.log('注册成功')</script>";
		// echo $str;
		//页面指定2秒后跳转
		// header("Refresh:0;url=login.php");
	}else{
		echo "<script>console.log('注册失败')</script>";
		// echo $str2;
		// header("Refresh:0;url=register.php");
	}
	mysqli_close($conn);
?>