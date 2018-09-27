<?php include 'register-head.php' ?>
			<form class="sui-form form-horizontal sui-validate" action="register-save.php" method="post">
				<div class="control-group">
					<label for="email" class="control-label">邮箱：</label>
					<div class="controls">
						<input type="text" id="email" placeholder="请输入邮箱" class="input-fat input-large" name="email" data-rules="required|minlength=10|maxlength=30">
						<span id="tips" style="color: red;"></span>
					</div>
				</div>
				<div class="control-group">
					<label for="name" class="control-label .input-fat">用户名：</label>
					<div class="controls">
						<input type="text" id="name" placeholder="请输入用户名" class="input-fat input-large" name="name" data-rules="required|minlength=2|maxlength=10">
					</div>
				</div>
				<div class="control-group">
					<label for="password" class="control-label">密码：</label>
					<div class="controls">
						<input type="password" id="password" placeholder="请输入密码	" class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=2|maxlength=12">
					</div>
				</div>
				<div class="control-group">
					<label for="word" class="control-label">重复密码：</label>
					<div class="controls">
						<input type="password" id="word" placeholder="请输入重复密码" class="input-fat input-large" name="word"data-rules="required|match=password">
					</div>
				</div>
				<div class="control-group">
					<label for="yzm" class="control-label">验证码：</label>
					<div class="controls">
						<input type="input" id="yzm" placeholder="请输入验证码	" class="input-fat input-large" name="yzm" data-rules="required|minlength=4|maxlength=4">
					</div>
				</div>
				<input type="text" id="code_btn">
				<div class="control-group">
					<label for="question" class="control-label">密码提示问题：</label>
					<div class="controls">
						<select id="question" name="question">
							<option value="你的小学在哪上学">你的小学在哪上学</option>
							<option value="你的最好朋友的姓名">你的最好朋友的姓名</option>
							<option value="你最有纪念意义的日期">你最有纪念意义的日期</option>
							<option value="你的初恋女友叫谁">你的初恋女友叫谁</option>
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
					<label class="control-label"></label>
					<div class="controls">
						<button type="submit" class="sui-btn btn-primary" id="rybbtn" disabled="disabled">立即注册</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php include 'register-foot.php' ?>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
	var input = document.getElementsByTagName('input');
	$("#email").on("blur",function(){
		$.get("http://localhost/rybphp/student_dbs/register-save-ajax.php",
			{"email":$(this).val()},
			function(data){
				if(data == "ok"){
					$("#tips").html("可以注册");
				}else{
					$("#tips").html("邮件重复");
				}
			},
			"text"
		)
	});
	$("input").each(function(a){
		$("input").eq(a).on("input",function(){
			var rybbtn = document.getElementById('rybbtn');
			var emailval = $("#email").val();
			var nameval = $("#name").val();
			var passwordval = $("#password").val();
			var wordval = $("#word").val();
			var yzmval = $("#yzm").val();
			var answerval = $("#answer").val();
			if (emailval != "" && nameval != "" && passwordval != "" && wordval != "" && yzmval != "" && answerval != "") {
				$("#rybbtn").removeAttr("disabled");
			}else{
				$("#rybbtn").attr("disabled","disabled");
			}
		})
	});
	rybbtn.onclick = function(){
		if(window.XMLHttpRequest){
			var xhr = new XMLHttpRequest();
		}else{
		// IE兼容
			var xhr = new ActiveObject("Msxml2.XMLHTTP");
		}
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 3){
				console.log("正在处理,请稍后....");
			};
			if(xhr.readyState == 4){
				if(xhr.status == "200"){
					console.log("请求完成,准备好了");
					console.log( xhr.responseText);
					if (xhr.responseText == 'ok') {
						alert("注册成功！");
						window.location.href="login.php";
					}else{
						alert("注册失败!");
						window.location.href="register.php";
					}
				}else if(xhr.status == "404"){
					console.log("网页被外星人劫持!");

				}
			}
		}
		xhr.open("post","http://localhost/rybphp/student_dbs/register-save-ajax.php",true);
		xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xhr.send("email="+encodeURIComponent(email.value));
	};
</script>