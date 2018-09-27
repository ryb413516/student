<?php include("register-head.php"); ?>
	<form class="sui-form form-horizontal sui-validate" action="forget-save.php" method="post">
		<div class="control-group">
			<label for="email " class="control-label .input-fat">邮箱：</label>
			<div class="controls">
				<input type="text" id="email" placeholder="请输入邮箱" class="input-fat input-large" name="email" data-rules="required|minlength=2|maxlength=30">
			</div>
		</div>
		<div class="control-group">
			<label for="yzm" class="control-label">验证码：</label>
			<div class="controls">
				<input type="input" id="yzm" placeholder="请输入验证码	" class="input-fat input-large" name="yzm" data-rules="required|minlength=0|maxlength=4">
			</div>
		</div>
		<input type="text" id="code_btn" >
		<div class="control-group">
			<label for="question" class="control-label">密码提示问题：</label>
			<div class="controls">
				<select id="question" name="question">
					<option value="你的小学在哪上学">你的小学在哪上学</option>
					<option value="你的最好朋友的姓名">你的最好朋友的姓名</option>
					<option value="你最有纪念意义的日期">你最有纪念意义的日期</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label for="answer " class="control-label .input-fat">密码答案：</label>
			<div class="controls">
				<input type="text" id="answer" placeholder="请输入密码答案" class="input-fat input-large" name="answer" data-rules="required|minlength=2|maxlength=15">
			</div>
		</div>
		<div class="control-group">
			<label for="password " class="control-label .input-fat">修改密码：</label>
			<div class="controls">
				<input type="text" id="password" placeholder="请输入修改密码" class="input-fat input-large" name="password" data-rules="required|minlength=2|maxlength=15">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"></label>
			<div class="controls">
				<button type="submit" class="sui-btn btn-primary" id="btn">修改</button>
			</div>
		</div>
	</form>
</div>
<?php include("register-foot.php") ?>