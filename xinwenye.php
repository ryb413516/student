<?php
include ('conn.php');
$kid = $_REQUEST["kid"];
$sql = "SELECT * FROM `news` WHERE id = '{$kid}'";
$result = mysqli_query($conn,$sql);
//关闭数据库
mysqli_close($conn);
?>
<?php include ('xinwenye-head.php'); ?>
		<div class="section17">
			<div class="clearfix1 wrap">
				<div class="boxL">
					<div class="block26">
						<div class="tit06">
							<h4>
								<font color="#2052af">北网新闻</font>
								<font color="f7931e"></font>
							</h4>
						</div>
						<div class="innerleft" style="margin-left: 20px;">
							<?php
								if (mysqli_num_rows($result) > 0){
									while ($row = mysqli_fetch_assoc($result)) {
										echo "
										<h2 style='font-size:20px;'>{$row['标题']}</h2>
										<div class='other'>
											<span class='tag' style='margin:20px; font-size:17px;'>{$row['肩题']}</span>
											<span class='tag' style='color:blue;'>{$row['发布时间']}</span>
										</div>
										<div class='txt'>{$row['内容']}</div>
										<img src='{$row["图片"]}'>
										";
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include ('xinwenye-foot.php'); ?>
