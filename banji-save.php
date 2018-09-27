<?php
	/*create 博大大@ 2018-09-04*/
	//接受banji-input.php提交出来的信息
	$banhao = $_REQUEST['banhao'];//班号
	$banzhang = $_REQUEST['banzhang'];//班长
	$jiaoshi = $_REQUEST['jiaoshi'];//教室
	$banzhuren = $_REQUEST['banzhuren'];//班主任
	$banjikouhao = $_REQUEST['banjikouhao'];//班级口号
	$action = $_REQUEST['action'];//add新增记录 update 修改记录
	include "conn.php";
	if($action == "add"){
		//新增记录
		$str = "数据插入成功";
		$str2 = "数据插入失败";
		$url = 'banji-input.php';
		$sql = "insert into banji(班号,班长,教室,班主任,班级口号) values('{$banhao}','{$banzhang}','{$jiaoshi}','{$banzhuren}','{$banjikouhao}')";//增
	}else if ($action == "update") {
		//修改记录
		$str = "数据更新成功";
		$str2 = "数据更新失败";
		$url = 'banji-list-ajax.php';
		$sql = "update banji set 班号='{$banhao}',班长='{$banzhang}',教室='{$jiaoshi}',班主任='{$banzhuren}',班级口号='{$banjikouhao}' where 班号='{$banhao}'";
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
	// 关闭连接,释放资源
	mysqli_close($conn);
?>
