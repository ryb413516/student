<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include 'leftmenu.php' ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程录入</p>
			<form class="sui-form form-horizontal sui-validate" action="kecheng-save.php" method="post">
				<input type="hidden" name="action" value="add">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程名：</label>
			    <div class="controls">
			      <input type="text" id="kcName" name="kcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程时间：</label>
			    <div class="controls">
			      <input type="text" id="kcTime" name="kcTime" class="input-large input-fat" placeholder="输入课程时间" data-rules="required|minlength=2|maxlength=10">
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
<?php include "foot.php" ?>