<?php include("../view/top.php"); ?>

<div class="page-content p-3" id="content">
	<!-- Toggle button -->
	&nbsp;&nbsp;&nbsp;&nbsp;<button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
		<i class="fa fa-bars text-primary mr-1"></i>
	</button>
	<div class="container">
		<div class="card">
			<h4 class="card-header">QUẢN LÝ LOẠI MỸ PHẨM</h4> 
			<div class="card-body">
				<?php 
				if(isset ($message))
				{
					?>
				<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
					<i class="bi bi-check-circle-fill"></i> <?php echo $message; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
				}
				elseif(isset ($error_message))
				{
				?>
					<div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
						<i class="bi bi-exclamation-triangle-fill"></i> <?php echo $error_message; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
				<?php
				}
				?>
				<button id="buttonthem" class="btn btn-primary"><i class="fa fa-plus-square" ></i> Thêm mới</button>
				<br> <br>
				<!-- Danh sách loại mỹ phẩm -->
				<div class="table-responsive-lg">
					<table id="PhanTrang" class="table table-sm table-hover table-bordered">
						
						<tr class="table-active bg-light">
							<th>Tên loại</th>
							<th width="7%">Sửa</th>
							<th width="7%">Xóa</th>
						</tr>
						<?php
						foreach($loaimypham as $l):
							if($l["id"] == $idsua) {
						?>
								<form method="post">
								<input type="hidden" name="id" value="<?php echo $l["id"]; ?>">
								<input type="hidden" name="action" value="capnhat">
								<tr>
									<td><input type="text" class="form-control" name="tenloai" value="<?php echo $l["tenloai"]; ?>"></td>
									<td><input type="submit" class="btn btn-warning" value="Cập nhật"></td>
									<td><a class="btn btn-danger"  onclick="return confirm('Bạn chắn chắn muốn xóa loại mỹ phẩm <?php echo $l['tenloai'];?>?')" href="index.php?action=xoaloaimypham&id=<?php echo $l["id"]; ?>" href="index.php?action=xoaloaimypham&id=<?php echo $l["id"]; ?>">Xóa</a></td>
								</tr>
								</form>
						<?php
							}
							else{			
						?>
								<tr>
									<td><?php echo $l["tenloai"]; ?></td>
									<td><a class="btn btn-warning" href="index.php?action=sualoaimypham&id=<?php echo $l["id"]; ?>"><i class='fa fa-pencil-square-o text-white'></i></a></td>
									<td><a class="btn btn-danger" onclick="return confirm('Bạn chắn chắn muốn xóa loại mỹ phẩm <?php echo $l['tenloai'];?>?')" href="index.php?action=xoaloaimypham&id=<?php echo $l["id"]; ?>"><i class="fa fa-trash"></i></a></td>
								</tr>
						<?php
							}
						endforeach;
						?>
						
					</table>
				</div>
				<br> 
				<div id="formthem">
				<form class="form-inline" method="post">
					<input type="text" class="form-control" name="tenloai" placeholder="Nhập tên loại">
					<input type="hidden" name="action" value="themloaimypham">
					<input type="submit" class="btn btn-warning" value="Thêm">
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$("#formthem").hide();
	$("#buttonthem").click(function(){
		$("#formthem").toggle(1000);
	});
});
</script>

<?php include("../view/bottom.php"); ?>
