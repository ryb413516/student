<?php
include "conn.php";
$sql = "select * from news";
$result = mysqli_query($conn,$sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">新闻管理</p>
			<table class="sui-table table-bordered">
			<thead>
				<tr>
					<th>id</th>
					<th>新闻标题</th>
					<th>时间</th>
					<th>操作</th>
				</tr>
			</thead>
  			<tbody>
<?php
	if( mysqli_num_rows($result)>0){
		while( $row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>{$row['id']}</td>";
			echo "<td>{$row['标题']}</td>";
			echo "<td>{$row['发布时间']}</td>";
			echo "<td>
<a class='sui-btn btn-small btn-warning' href='news-update.php?sid={$row['id']}'>修改</a>&nbsp;
<a class='sui-btn btn-small btn-danger' href='news-del.php?sid={$row['id']}'>删除</a>
				</td>";
			echo "</tr>";
		}
	}else{
		echo "<tr><td >暂无新闻记录</td></tr>";
	}
?>
			</tbody>
			    </table>
		  </div>
		</div>
	</div>
<?php include "foot.php" ?>