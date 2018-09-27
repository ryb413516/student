<?php
include 'conn.php';
$sql = "select 学号 from student";
$result = mysqli_query($conn, $sql);

$sid = $_REQUEST['sid'];
$sql2 = "select * from xuanxiu where 学号='{$sid}'";
$result2 = mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0){
	$row2 = mysqli_fetch_assoc($result2);
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
			<p class="sui-text-xxlarge my-padd">成绩信息修改</p>
			<form class="sui-form form-horizontal sui-validate" action="grade-save.php" method="post">
				<input type="hidden" name="action" value="update">
				<input type="hidden" name="sid" value="<?php echo $row2['学号'] ?>">
				<div class="control-group">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row2['学号']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			  	<label for="inputEmail" class="control-label">课程编号：</label>
			  	<div class="controls">
			  		<input type="text" id="courseHao" name="courseHao" value="<?php echo $row2['课程编号']; ?>"  class="input-fat input-large" placeholder="输入课程编号" data-rules="required|minlength=2|maxlength=10">
			  	</div>
			  </div>
			  <div class="control-group">
			  	<label for="inputEmail" class="control-label">成绩：</label>
			  	<div class="controls">
			  		<input type="text" id="cjName" name="cjName" value="<?php echo $row2['成绩']; ?>"  class="input-fat input-large" placeholder="输入成绩	" data-rules="required|minlength=2|maxlength=10" >
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