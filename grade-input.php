<?php
//先读取数据库中班级的班号，然后更新下拉列表，保证班号是更新的
include "conn.php";
$sql = "select 学号 from xuanxiu";
$sql2 = "select 课程编号 from xuanxiu";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);

?>
<?php include "head.php" ?>
		<div class="sui-layout">
			<div class="sidebar">
<?php include 'leftmenu.php' ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge my-padd">成绩信息录入</p>
				<form class="sui-form form-horizontal" action="grade-save.php" method="post">
					<input type="hidden" name="action" value="add">
					<div class="control-group">
						<label for="inputEmail" class="control-label">学号：</label>
						<div class="controls">
							<select name='xuehao' id='xuehao'>
<?php
	if( mysqli_num_rows($result)>0 ){
		while ( $row = mysqli_fetch_assoc($result) ) {
			echo "<option value='{$row['学号']}'>{$row['学号']}</option>";
		}
	}else{
		echo "<option value=''>暂无课程信息</option>";
	}
?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label for="courseHao" class="control-label">课程编号：</label>
						<div class="controls">
							<select name='courseHao' id='courseHao'>
<?php
	if( mysqli_num_rows($result2)>0 ){
		while ( $row = mysqli_fetch_assoc($result2) ) {
			echo "<option value='{$row['课程编号']}'>{$row['课程编号']}</option>";
		}
	}else{
		echo "<option value=''>暂无课程信息</option>";
	}
?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label for="cjName" class="control-label">成绩：</label>
						<div class="controls">
							<input type="text" id="cjName" name="cjName" class="input-large input-fat" placeholder="输入成绩" data-rules="required|minlength=2|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include 'foot.php' ?>