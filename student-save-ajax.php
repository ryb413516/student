<?php
/* creater 博大大@ 2018-09-04*/
//接收student-input.php提交过来的信息
$conn = mysqli_connect("127.0.0.1","root","");

//2、选择要操作的数据库
mysqli_select_db($conn, "student");
//设置读取数据库的编码，不然有可能显示乱码
mysqli_query($conn, "set names utf8");

$sID = $_REQUEST['sID'];
$sql = "select * from student where id='{$sID}'";
$result = mysqli_query($conn,$sql);
//如果查找的记录有一条，说明此email已经被注册过
if(mysqli_num_rows($result) >0){
  echo "此id重复了！";
}else{
  echo "ok".mysqli_error($conn);
  header("Refresh:1;student-list-ajax.php");
}

mysqli_close($conn);
?>