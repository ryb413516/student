<?php
	include 'conn.php';
	$email = $_REQUEST['email'];//邮箱
	$question = $_REQUEST['question'];//密码提示问题
	$answer = $_REQUEST['answer'];//密码答案
	$password = $_REQUEST['password'];//修改密码
	$sql = "update user set password='{$password}' where email='{$email}' and question='{$question}' and answer='{$answer}'";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('密码修改成功')</script>";
		header("Refresh:0;url=login.php");
	}else{
		echo "<script>alert('密码修改失败')</script>";
		header("Refresh:0;url=forget.php");
	}
	mysqli_close($conn);
?>