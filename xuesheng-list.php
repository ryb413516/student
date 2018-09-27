<?php include("head.php") ?>
<?php 
	$xhName = $_POST["xhName"];
	$sql1 = "select * from student inner join banji  ON banji.班号 = student.班号 where 学号='{$xhName}'";
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
					<th>学号</th>
					<th>班号</th>
					<th>教室</th>
					<th>姓名</th>
					<th>性别</th>
					<th>出生日期</th>
					<th>电话号码</th>
<?php 
if(mysqli_num_rows($result)>0) {
	while($row = mysqli_fetch_assoc($result)){
		$row1 = $row['性别']==1?'男':'女';
		echo "<tr><td>{$row["学号"]}</td>
			<td>{$row["班号"]}</td>
			<td>{$row["教室"]}</td>
			<td>{$row["姓名"]}</td>
			<td>{$row1}</td>
			<td>{$row["出生日期"]}</td>
			<td>{$row["电话"]}</td>
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