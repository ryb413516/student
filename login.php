<?php include 'register-head.php' ?>
<form class="sui-form form-horizontal sui-validate" action="login-save-ajax.php" method="post" id="form1">
	<div class="control-group">
		<label for="email " class="control-label .input-fat">邮箱：</label>
		<div class="controls">
			<input type="text" id="email" placeholder="请输入邮箱" class="input-fat input-large" name="email" data-rules="required|minlength=2|maxlength=30">
		</div>
	</div>
	<div class="control-group">
		<label for="password" class="control-label">密码：</label>
		<div class="controls">
			<input type="password" id="password" placeholder="请输入密码	" class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=2|maxlength=15">
		</div>
	</div>
	<div class="control-group">
		<label for="yzm" class="control-label">验证码：</label>
		<div class="controls">
			<input type="input" id="yzm" placeholder="请输入验证码" class="input-fat input-large" name="yzm" data-rules="required|minlength=4|maxlength=4">
		</div>
	</div>
		<input type="text" id="code_btn" >
	<div class="control-group">
		<label class="control-label"></label>
		<div class="controls">
			<button type="submit" class="sui-btn btn-primary" id="btn">登录</button>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label"></label>
		<div class="controls">
			<a href="forget.php">忘记密码</a>
		</div>
	</div>
	<p class="pp"></p>
</form>
<?php include 'register-foot.php' ?>
<script>
	//给提交按钮绑定事件
	$("button[type=submit]").on("click",function(){
		//使用$.ajax()提交数据
		$.ajax({
			url:"login-save-ajax.php",
			type:"POST",
			data:$("#form1").serialize(),
			dataType:"Json",
			success:function(data,textStatus){
				//请求成功后调用此函数
				console.log(data);
				if (data.code == 200) {
					$(".pp").slideDown(1000,function(){
						window.location.href = "index.php";
						$(".pp").html("登录成功");
					});
				}else if (data.code == 20001) {
					//提示密码错误
					$(".pp").slideDown(1000,function(){
						$(".pp").html("密码错误");
						window.onclick = function(){
							$(".pp").hide();
						}
					});
				}else if(data.code == 20004){
					//提示邮箱错误
					$(".pp").slideDown(1000,function(){
						$(".pp").html("邮箱错误");
						window.onclick = function(){
							$(".pp").hide();
						}
					});
				}
			},
			error:function(XMLHttpRequest,textStatus,errorThrown){
				//请求失败后调用此函数
				console.log("失败原因:" + errorThrown);
			}
		});
		return false;
	})
</script>