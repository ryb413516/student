<?php
include 'conn.php';
$sid = $_REQUEST['sid'];
$sql2 = "select * from kecheng where 课程编号='{$sid}'";
$result = mysqli_query($conn,$sql2);
if(mysqli_num_rows($result)>0){
	$row2 = mysqli_fetch_assoc($result);
}else{
	echo "找不到该班级信息,请检查班号是否正确";
}
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include 'leftmenu.php' ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程信息修改</p>
			<form class="sui-form form-horizontal sui-validate" action="kecheng-save.php" method="post">
				<input type="hidden" name="action" value="update">
				<input type="hidden" name="sid" value="<?php echo $row2['课程编号'] ?>">
				<div class="control-group">
			  <div class="control-group">
			    <label for="kcName" class="control-label">课程名：</label>
			    <div class="controls">
			      <input type="text" id="kcName" name="kcName" class="input-large input-fat" placeholder="输入课程名" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row2['课程名']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程时间：</label>
			    <div class="controls">
			      <input type="text" id="kcTime" name="kcTime" class="input-large input-fat" placeholder="输入课程时间" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row2['时间']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="修改" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>
			</form>
		  </div>
		</div>
	</div>
<?php include "foot.php" ?>