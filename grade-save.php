<?php
/*create 博大大@ 2018-09-04*/
//接受grade-input.php提交出来的信息
$xuehao = $_REQUEST['xuehao'];//学号
$courseHao = $_REQUEST['courseHao'];//课程编号
$cjName = $_REQUEST['cjName'];//成绩
$sid = empty($_REQUEST['sid'])?"null":$_REQUEST['sid'];
if ($sid == null) {
	echo "<script>alert('请指定要删除的记录！')</script>";
	header("Refresh:1;url=grade-list.php");
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
	$url = 'grade-input.php';
	$sql = "insert into xuanxiu(学号,课程编号,成绩) value('{$xuehao}','{$courseHao}','{$cjName}')";//增
}else if ($action == "update") {
// 	//修改记录
	$str = "数据更新成功";
	$str2 = "数据更新失败";
	$url = 'grade-list.php';
	$sql = "update xuanxiu set 课程编号='{$courseHao}' ,成绩={$cjName} where 学号='{$sid}'";
}else{
	die("请选择操作方法");
}
		$result = mysqli_query($conn,$sql);
		if($result){
			echo "$str";
			//页面指定2秒后跳转
			header("Refresh:1;url={$url}");
		}else{
			echo "$str2".mysqli_error($conn);
			header("Refresh:1;url={$url}");
		}
	//4.关闭连接,释放资源
		mysqli_close($conn);
?>