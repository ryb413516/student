<?php
	include 'conn.php';
	$sid = $_REQUEST['sid'];
	$sql2 = "select * from banji where 班号='{$sid}'";
	$result = mysqli_query($conn,$sql2);
	if(mysqli_num_rows($result)>0){
		$row2 = mysqli_fetch_assoc($result);
	}else{
		echo "找不到该班级信息,请坚持班号是否正确";
	}
?>
<?php include "head.php" ?>
		<div class="sui-layout">
			<div class="sidebar">
<?php include 'leftmenu.php' ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge my-padd">班级信息修改</p>
				<form class="sui-form form-horizontal sui-validate" action="banji-save.php" method="post">
					<input type="hidden" name="action" value="update">
					<div class="control-group">
						<label for="kcName" class="control-label">班号：</label>
						<div class="controls">
							<input type="text" id="banhao" name="banhao" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row2['班号']; ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">班长：</label>
						<div class="controls">
							<input type="text" id="banzhang" name="banzhang" class="input-large input-fat"  placeholder="输入班长姓名" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row2['班长']; ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="jiaoshi" class="control-label">教室：</label>
						<div class="controls">
							<input type="text" id="jiaoshi" name="jiaoshi" class="input-large input-fat"  placeholder="输入教室" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row2['教室']; ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="banzhuren" class="control-label">班主任：</label>
						<div class="controls">
							<input type="text" id="banzhuren" name="banzhuren" class="input-large input-fat"  placeholder="输入班主任姓名" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row2['班主任']; ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="banzhuren" class="control-label">班级口号：</label>
						<div class="controls">
							<input type="text" id="banjikouhao" name="banjikouhao" class="input-large input-fat"  placeholder="输入班级口号" data-rules="required|minlength=2|maxlength=20" value="<?php echo $row2['班级口号']; ?>">
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