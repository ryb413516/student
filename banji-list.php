<?php
include "conn.php";
$sql = "select * from banji";
$result = mysqli_query($conn, $sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout">
			<div class="sidebar">
<?php include "leftmenu.php" ?>
			</div>
		<div class="content">
			<p class="sui-text-xxlarge my-padd label-success">班级信息管理</p>
			<table class="sui-table table-bordered">
				<thead>
					<tr>
						<th>序号</th>
						<th>班号</th>
						<th>班长</th>
						<th>教室</th>
						<th>班主任</th>
						<th>班级口号</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if( mysqli_num_rows($result)>0 ){
							$i = 1;
							while( $row = mysqli_fetch_assoc($result) ){
								echo "<tr>";
								echo "<td>{$i}</td>";
								echo "<td>{$row['班号']}</td>";
								echo "<td>{$row['班长']}</td>";
								echo "<td>{$row['教室']}</td>";
								echo "<td>{$row['班主任']}</td>";
								echo "<td>{$row['班级口号']}</td>";
								echo "<td><a class='sui-btn btn-small btn-warning' href='banji-update.php?sid={$row['班号']}'>修改</a>&nbsp;<a class='sui-btn btn-small btn-danger' href='banji-del.php?sid={$row['班号']}'>删除</a>
								</td>";
								echo "<tr>";
								$i++;
							}
						}else{
							echo "<tr><td>暂无学生记录</td></tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include "foot.php"; ?>