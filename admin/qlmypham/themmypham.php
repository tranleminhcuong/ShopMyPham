<?php include("../view/top.php"); ?>
<div class="page-content p-3" id="content">
	<!-- Toggle button -->
	&nbsp;&nbsp;&nbsp;&nbsp;<button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
		<i class="fa fa-bars text-primary mr-1"></i>
	</button>
	<div class="container">
		<div class="card">
			<h4 class="card-header">THÊM MỸ PHẨM</h4> 
			<div class="card-body">
				<?php 
				if(isset ($error_message))
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
				<form method="post" enctype="multipart/form-data" action="index.php">
					
					<input type="hidden" name="action" value="xulythem">
					
					<div class="form-row">
						<div class="form-group col-sm-6">
						<label>Loại mỹ phẩm</label>
							<select class="form-control" name="optloaimypham">
							<?php
							foreach($loaimypham as $l):
							?>
								<option value="<?php echo $l["id"]; ?>"><?php echo $l["tenloai"]; ?></option>
							<?php
							endforeach;
							?>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>Thương hiệu</label>
							<select class="form-control" name="optthuonghieu">
							<?php
							foreach($thuonghieu as $t):
							?>
								<option value="<?php echo $t["id"]; ?>"><?php echo $t["tenthuonghieu"]; ?></option>
							<?php
							endforeach;
							?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label>Tên mỹ phẩm</label>
						<input class="form-control" type="text" name="tenmypham" required value="<?php if(isset($tenmypham)) echo $tenmypham;?>">
					</div>
					<div class="form-row">
						<div class="form-group col-sm-6">
							<label>Giá gốc</label>
							<input class="form-control" type="number" name="giagoc" required value="<?php if(isset($giagoc)) echo $giagoc; else echo "0";?>">
						</div>
						<div class="form-group col-sm-6">
							<label>Giá bán</label>
							<input class="form-control" type="number" name="giaban" required value="<?php if(isset($giaban)) echo $giaban; else echo "0";?>">
						</div>
					</div>
					
					<div class="form-group">
						<label>Số lượng tồn</label>
						<input class="form-control" type="number" name="soluongton" required value="<?php if(isset($soluongton)) echo $soluongton; else echo "0";?>">
					</div>
					<div class="form-group">
						<label>Hình ảnh</label>
						<input class="form-control" type="file" name="filehinhanh">
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<textarea class="form-control ckeditor" id="mota" name="mota" name="mota"><?php if(isset($mota)) echo $mota;?></textarea>
					</div>
					
					<div class="form-group">
						<button type="submit" onclick="" class="btn btn-success">Thêm mới</button>
						<button type="reset"  class="btn btn-warning">Huỷ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

	

<?php include("../view/bottom.php"); ?>
