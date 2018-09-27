<?php
/*create 磊哥@ 2018-09-04*/
//接受kecheng-input.php提交出来的信息
$kcName = $_REQUEST['kcName'];//课程名
$kcTime = $_REQUEST['kcTime'];//课程时间
$sid = empty($_REQUEST['sid'])?"null":$_REQUEST['sid'];
if ($sid == null) {
	echo "<script>alert('录入失败')</script>";
	header("Refresh:1;url=kecheng-list.php");
}else{
include 'conn.php';
	//别忘了关闭数据库连接
	mysqli_close($conn);
}
$action = $_REQUEST['action'];//add新增记录 update 修改记录

include "conn.php";
if($action == "add"){
	//新增记录
	$str = "数据插入成功";
	$str2 = "数据插入失败";
	$url = 'kecheng-input.php';
	$sql = "insert into kecheng(课程名,时间) value('{$kcName}','{$kcTime}')";//增
}else if ($action == "update") {
// 	//修改记录
	$str = "数据更新成功";
	$str2 = "数据更新失败";
	$url = 'kecheng-list.php';
	$sql = "update kecheng set 课程名='{$kcName}',时间='{$kcTime}' where 课程编号='{$sid}'";
}else{
	die("请选择操作方法");
}
		$result = mysqli_query($conn,$sql);
		if($result){
			echo "$str";
			header("Refresh:1;url={$url}");
		}else{
			echo "$str2";
			header("Refresh:1;url={$url}");
		}
	//4.关闭连接,释放资源
		mysqli_close($conn);
?>