<?php include("../view/top.php"); ?>
<div class="page-content p-3" id="content">
	<!-- Toggle button -->
	&nbsp;&nbsp;&nbsp;&nbsp;<button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
		<i class="fa fa-bars text-primary mr-1"></i>
	</button>
	<div class="container">
		<div class="card">
			<h4 class="card-header">SỬA THƯƠNG HIỆU</h4> 
			<div class="card-body">
				<?php 
				if(isset ($message))
				{
					?>
				<div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
				<i class="bi bi-exclamation-triangle-fill"></i> <?php echo $message; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
				}
				?>
				<form method="post" enctype="multipart/form-data" action="index.php">
					<input type="hidden" name="id" value="<?php echo $t["id"]; ?>">
					<input type="hidden" name="action" value="xulysua">	
					<div class="form-group">
						<label>Tên thương hiệu</label>
						<input type="text" class="form-control" name="tenthuonghieu" placeholder="Nhập tên thương hiệu" value="<?php echo $t["tenthuonghieu"];?>">
					</div>

					<div id="hinh" class="form-group">
						<p>Hình ảnh</p>
						<input type="hidden" name="hinhcu" value="<?php echo $t["hinhanh"]; ?>">
						<img src="../../public/<?php echo $t["hinhanh"]; ?>" width="100"><br><br>
						<input type="checkbox" id="chkdoianh" name="chkdoianh" value="1"  > Đổi ảnh mới<br>
					</div>  
					<div id="file" class="form-group">
						<img id="output" class="img-thumnail" width="100">  
						<input class="form-control" type="file" name="fhinh" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
					</div>

					<div class="form-group">
						<input type="submit" value="Cập nhật" class="btn btn-success">
						<a href="index.php" type="button" class="btn btn-warning">Huỷ</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include("../view/bottom.php"); ?>
