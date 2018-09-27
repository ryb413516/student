<?php
/*create 博大大@ 2018-09-04*/
//接受news-input.php提交出来的信息
session_start();
$title = $_REQUEST['title'];//新闻标题
$jtNum = $_REQUEST['jtNum'];//新闻肩题
$column = $_REQUEST['column'];//栏目
$authors = $_SESSION['usid'];//作者
$Issue = $_REQUEST['Issue'];//发布时间
$content = $_REQUEST['content'];//内容
$action = $_REQUEST['action'];

if ((($_FILES['file']['type'] == 'image/gif')||($_FILES['file']['type'] == 'image/png')||($_FILES['file']['type'] == 'video/mp4')||($_FILES['file']['type'] == 'image/jpeg')||($_FILES['file']['type'] == 'image/pjpeg'))&&($_FILES['file']['size'] < 10241000)){
	if($_FILES["file"]["error"] > 0){
		echo "错误: " . $_FILES["file"]["error"] . "<br />";
	}else{
		$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
	}
}else{
	$filename = 1;
}



include "conn.php";

$sql1 = "select * from newscolumn where name='{$column}'";
$result2 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result2)>0){
	$row2 = mysqli_fetch_assoc($result2);
}

if($action == "add"){
	//新增记录
	$a = time();
	$str = "数据插入成功";
	$str2 = "数据插入失败";
	$url = 'news-input.php';
	$sql = "insert into news(标题,肩题,图片,内容,发布时间,userid,创建时间,columnid) values('{$title}','{$jtNum}','{$filename}','{$content}','{$Issue}','{$authors}','$a',{$row2['id']})";//增
}else if ($action == "update") {
	//修改记录
	$id = $_REQUEST['id'];
	$str = "数据更新成功";
	$str2 = "数据更新失败";
	$url = 'news-list.php';

	$sql3 = "select * from news where id='{$id}'";
	$result3 = mysqli_query($conn,$sql3);
	if(mysqli_num_rows($result3)>0){
		$row3 = mysqli_fetch_assoc($result3);
	}

	if($filename == 1){
		$filename = $row3['图片'];
	}

	$sql = "update news set 标题='{$title}',肩题='{$jtNum}',图片='{$filename}',内容='{$content}',发布时间='{$Issue}',userid='{$authors}',columnid={$row2['id']} where id='{$id}'";
}else{
	die("请选择操作方法");
}
		$result = mysqli_query($conn,$sql);
		if($result){
			echo $str;
			header("Refresh:1;url={$url}");
		}else{
			echo $str2;
			header("Refresh:1;url={$url}");
		}
		mysqli_close($conn);
?>