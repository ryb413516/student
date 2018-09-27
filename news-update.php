<?php
include 'conn.php';
$sid = $_REQUEST['sid'];
$sql2 = "select * from news where id='{$sid}'";
$result = mysqli_query($conn,$sql2);
if(mysqli_num_rows($result)>0){
	$row2 = mysqli_fetch_assoc($result);
}else{
	echo "找不到该新闻信息,请检查id是否正确";
}
$sql = "select * from newscolumn ";
$result = mysqli_query($conn,$sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include 'leftmenu.php' ?>
		  </div>
		   <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻修改模块</p>
			<form class="sui-form form-horizontal sui-validate" action="news-save.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="update"><<input type="hidden" name="id" value="<?php echo $row2['id']; ?>">
			  <div class="control-group">
			    <label for="title" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" id="title" name="title" class="input-large input-fat" placeholder="输入标题" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row2['标题']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jtNum" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" id="jtNum" name="jtNum" class="input-large input-fat"  placeholder="输入肩题" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row2['肩题']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="column" class="control-label">栏目：</label>
			    <div class="controls">
			      <select id="column" name="column">
			      		<?php
			      			if(mysqli_num_rows($result)>0){
			      				while($row = mysqli_fetch_assoc($result)){
			      					echo "<option value='{$row['name']}'>{$row['name']}</option>";
			      				}
			      			}else{
			      				echo "<option value=''>暂无作者信息</option>";
			      			}
			      		?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="authors" class="control-label">作者：</label>
			    <div class="controls">
			      <input type="text" id="authors" name="authors" class="input-large input-fat"  placeholder="输入肩题" data-rules="required|minlength=0|maxlength=10" value="<?php echo $_SESSION['usname']?>" readonly>
			    </div>
			  </div>
			  <div class="control-group">
			  	<label for="Issue" class="control-label">发布时间：</label>
			  	<div class="controls">
			  		<input type="text" id="Issue" name="Issue" class="input-fat input-large" placeholder="输入时间" data-toggle="datepicker" value="<?php echo $row2['发布时间']; ?>">
			  	</div>
			  </div>
			  <div class="control-group">
			  	<label for="file" class="control-label">图片：</label>
			  	<div class="controls">
					<input type="file" name="file" id="file">
			  	</div>
			  </div>
				<img src="<?php echo $row2['图片']; ?>" alt="" style="width: 100px;height:120px;margin-left: 100px;">
			  <div class="control-group" style="margin-top: 20px;">
			    <label for="content" class="control-label v-top">内容：</label>
			    <div class="controls">
			      <textarea id="content" name="content" placeholder="内容" data-rules="required"><?php echo $row2['内容']; ?></textarea>
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