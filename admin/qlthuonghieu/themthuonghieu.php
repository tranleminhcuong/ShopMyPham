<?php include("../view/top.php"); 
?>
<div class="page-content p-3" id="content">
	<!-- Toggle button -->
	&nbsp;&nbsp;&nbsp;&nbsp;<button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
		<i class="fa fa-bars text-primary mr-1"></i>
	</button>
	<div class="container">
		<div class="card">
			<h4 class="card-header">THÊM THƯƠNG HIỆU</h4> 
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
				<form id="formthem" method="post" enctype="multipart/form-data">
					<div class="form-group">
						
						<label>Tên thương hiệu</label>
						<input type="text" class="form-control" name="tenthuonghieu" required placeholder="Nhập tên thương hiệu">
					</div>
					
					<div class="form-group">
						<label>Hình ảnh</label>
						<input class="form-control" type="file" name="fhinh" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
						<br><img id="output" class="img-thumnail" width="100">  
					</div>

					<div class="form-group">
						<input type="hidden" name="action" value="xulythem">
						<button type="submit" id="them"  class="btn btn-success">Thêm mới</button>
						<button type="reset"  class="btn btn-warning">Huỷ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).on()
	</script>

<?php include("../view/bottom.php"); ?>
