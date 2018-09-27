<?php include("head.php") ?>
<?php 
	$xmName = $_POST["xmName"];
	$xhName = $_POST["xhName"];
	$kcmName = $_POST["kcmName"];
	$sql1 = "select * from xuanxiu 
	inner join kecheng ON kecheng.课程编号 = xuanxiu.课程编号 
	inner join student ON xuanxiu.学号=student.学号 where xuanxiu.学号='{$xhName}' and student.姓名='{$xmName}' and kecheng.课程名='{$kcmName}'";
	include("conn.php");
	$result = mysqli_query($conn,$sql1);
	//关闭数据连接
	mysqli_close($conn);
?>
	<div class="sui-layout">
		<div class="sidebar">
			<?php include("leftmenu.php") ?>	  	
		</div>
		<div class="content">
			<p class="sui-text-xxlarge my-padd">学生列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>姓名</th>
					<th>学号</th>
					<th>课程编号</th>
					<th>课程名</th>
					<th>成绩</th>
<?php 
	if(mysqli_num_rows($result)>0) {
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr><td>{$row["姓名"]}</td>
				<td>{$row["学号"]}</td>
				<td>{$row["课程编号"]}</td>
				<td>{$row["课程名"]}</td>
				<td>{$row["成绩"]}</td>
				</tr>";
		};
	}else{
		echo "<tr><td>没有找到结果</td></tr>";
	}
?>
			</table>
		</div>
	</div>		
<?php include("foot.php") ?>