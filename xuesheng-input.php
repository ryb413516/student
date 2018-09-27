<!-- 页头 -->
<?php include("head.php"); 
$conn = mysqli_connect("localhost","root","" );
if( $conn ){
	echo "连接成功！";
}else{
	die("连接失败！".mysqli_connect_error() );
}
$sql = "select distinct 课程编号 from kecheng";
$sql1 = "select distinct 学号 from student";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
?>
<div class="sui-layout">
	<div class="sidebar">
	<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>	 	  	
	</div>
	<div class="content">
		<p class="sui-text-xxlarge my-padd">学生信息查询</p>
		<form class="sui-form form-horizontal sui-validate" action="xuesheng-list.php" method="post">
			<div class="control-group">
				<label for="xhName" class="control-label">学号：</label>
				<div class="controls">
				<input type="text" id="xhName" name="xhName" class="input-large input-fat"  placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<input type="submit" id="xuehao" name="xuehao" value="查询" name="" class="sui-btn btn-large btn-primary">
				</div>
			</div>	  
		</form>
	</div>
</div>		
		<!-- 页脚 -->
	<?php include("foot.php"); ?>