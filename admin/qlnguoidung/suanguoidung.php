<?php include_once("../view/top.php"); ?>
<div class="page-content p-3" id="content">
	<!-- Toggle button -->
	&nbsp;&nbsp;&nbsp;&nbsp;<button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
		<i class="fa fa-bars text-primary mr-1"></i>
	</button>
	<div class="container">
		<div class="card">
			<h4 class="card-header">PHÂN QUYỀN</h4> 
			<div class="card-body">
				<form  action="index.php?action=xulysua" method="post"  enctype="multipart/form-data">
					
						
							<div class="form-group">
								<label for="hoten">Họ và tên</label>
								<input type="text" class="form-control" name="hoten" disable required readonly value="<?php echo $nguoidung["hoten"]; ?>"/>
							</div>
							<div class="form-group">
								<label for="sodienthoai">Số điện thoại</label>
								<input type="number" class="form-control"  name="sodienthoai" readonly required value="<?php echo $nguoidung["sodienthoai"]; ?>" />
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" readonly required value="<?php echo $nguoidung["email"]; ?>"/>
							</div>
							<div class="form-group ">
								<label for="tendangnhap">Phân quyền</label>
								<select class="custom-select" name="optloai" required>
								<?php
									if($nguoidung['loai']==1){
										echo "<option value='1'selected>Quản trị</option>";
										echo "<option value='2'>Nhân viên</option>";
										
									}
									elseif($nguoidung['loai']==2){
										echo "<option value='1'>Quản trị</option>";
										echo "<option value='2'selected>Nhân viên</option>";
										
									}
									
								?>
								</select>
							</div>
							
							
							
							
							
						
						
					
					<input type="hidden" name="id" value="<?php echo $nguoidung["id"]; ?>">
					<button type="submit" class="btn btn-primary">Cập nhật</button>
					<a href="index.php" type="button" class="btn btn-warning">Huỷ</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include_once("../view/bottom.php"); ?>
