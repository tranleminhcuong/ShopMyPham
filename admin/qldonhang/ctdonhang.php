<?php include("../view/top.php"); ?>
<?php require_once "../../libs/functions.php";?>
<div class="page-content p-3" id="content">
	<!-- Toggle button -->
	&nbsp;&nbsp;&nbsp;&nbsp;<button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
		<i class="fa fa-bars text-primary mr-1"></i>
	</button>
	<div class="container">
	<div class="card">
		<h4 class="card-header">CHI TIẾT ĐƠN HÀNG #<?php echo str_pad($dhang["id"], 8, "0", STR_PAD_LEFT); ?></h4> 
		<div class="card-body">
			<div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
				THÔNG TIN KHÁCH HÀNG
			</div>
			<div class="table-responsive-lg">	
				<table class="table table-borderless">
					<tr>
						<td>
							Họ tên khách hàng: <strong><?php echo $nguoidung["hoten"]; ?></strong>
						</td>
						<td class="text-right">
							Điện thoại: <strong><?php echo preg_replace("/^1?(\d{4})(\d{3})(\d{3})$/", "$1.$2.$3", $nguoidung["sodienthoai"]); ?></strong>
						</td>
					</tr>
					<tr>
						<td colspan="2">Địa chỉ giao hàng: <strong><?php echo $tendiachi; ?></strong></td>
					</tr>
					<tr><td>Ghi chú: <?php echo $dhang["ghichu"];?></td></tr>
					<tr>
						<td>
						Trạng thái: 
						<?php 
							if($dhang["trangthai"]==0) 
								echo "<span class='badge badge-secondary'>Chờ xử lý</span>"; 
							 else if($dhang["trangthai"]==1)
								echo "<span class='badge badge-warning'>Đã xác nhận</span>";
							 else if($dhang["trangthai"]==2)
								echo "<span class='badge badge-primary'>Đang giao hàng</span>";
							 else if($dhang["trangthai"]==3)
								echo "<span class='badge badge-success'>Đã nhận</span>";
							 else if($dhang["trangthai"]==4)
								echo "<span class='badge badge-dark'>Hoàn lại</span>";
							 else
								echo "<span class='badge badge-danger'>Đã huỷ</span>";
						?>
						</td> 
						<td class="text-right" >Ngày đặt: <strong><?php echo $dhang["ngay"];?></strong></td>   
					</tr> 
				</table>
				<div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
					THÔNG TIN SẢN PHẨM
				</div>
				<br>
				<table class="table table-sm" width="100%">
					<tr class="table-active bg-light">
						<th>#</th>
						<th>Hình ảnh</th>
						<th>Tên sản phẩm</th>
						<th>Đơn giá</th>
						<th>Số lượng</th>		
						<th>Thành tiền</th>		
						
					</tr>
					<?php
					$stt=1;
					foreach($ctdonhang as $ct):
					?>
					<tr>
						<td><?php echo $stt++;?></td>
						<td ><img class="img-thumnail" width="60px" src="../../public/<?php echo $ct["hinhanh"]; ?>" alt=""></td>
						<td class="small"><?php echo $ct["tenmypham"]; ?></td>
						<td><?php echo number_format($ct["dongia"]); ?>đ</td>
						<td><?php echo $ct["soluong"]; ?></td>
						<td><?php echo number_format($ct["thanhtien"]); ?>đ</td>
						
					</tr>
					<?php
					
					endforeach;
					?>
				</table>
	
				<div class="row">
					<div class="col-sm-8">
						<form method="post" action="index.php">
								<input type="hidden" name="id" value="<?php echo $dhang["id"]; ?>">
								<input type="hidden" name="action" value="capnhattrangthai">
							<?php
								if($dhang["trangthai"]==0 || $dhang["trangthai"]==1 || $dhang["trangthai"]==2){
							?>
							<div class="form-group">
								
								<label>Trạng thái đơn hàng</label>
								
								
								<select class="form-control" name="opttrangthai">
								<?php 
									if($dhang["trangthai"]==0){
										echo "<option value='0'selected>Chờ xử lý</option>";
										echo "<option value='1'>Đã xác nhận</option>";
										echo "<option value='2'>Đang giao hàng</option>";
										echo "<option value='3'>Đã nhận</option>";
										echo "<option value='4'>Hoàn lại</option>";
										echo "<option value='5'>Huỷ đơn</option>";
									}
									elseif($dhang["trangthai"]==1){
										
										echo "<option value='1'selected>Đã xác nhận</option>";
										echo "<option value='2'>Đang giao hàng</option>";
										echo "<option value='3'>Đã nhận</option>";
										echo "<option value='4'>Hoàn lại</option>";
										echo "<option value='5'>Huỷ đơn</option>";
									}
									elseif($dhang["trangthai"]==2){
										
										echo "<option value='2'selected>Đang giao hàng</option>";
										echo "<option value='3'>Đã nhận</option>";
										echo "<option value='4'>Hoàn lại</option>";
										echo "<option value='5'>Huỷ đơn</option>";
									}
									
									
								?>
							</select>
								</div>
								<div class="form-group">
									<input type="submit" value="Cập nhật" class="btn btn-success">
									<a href="index.php" type="button" class="btn btn-warning">Huỷ</a>
								</div>
							<?php
							}
								elseif($dhang["trangthai"]==3)
									echo "<h5 class='text-success'><i class='bi bi-check-circle'></i> Đơn hàng đã được giao thành công!</h5>";
								elseif($dhang["trangthai"]==4)
									echo "<h5><i class='bi bi-arrow-counterclockwise'></i> Đơn hàng đã bị hoàn trả vì một số lý do!</h5>";
								else
									echo "<h5 class='text-danger'><i class='bi bi-dash-circle'></i> Đơn hàng đã bị huỷ vì một số lý do!</h5>";
							
							?>
						</form>
					</div>
					<div class="col-sm-4">
					
						<table class="table table-sm table-borderless">
							<tr>
								<th scope="row">Tạm tính</th>					
								<td class="text-right"><?php echo number_format($dhang["tongtien"]);?>đ</td>
							</tr>
							<tr>
								<th scope="row">Phí vận chuyển</th>
								<td class="text-right">0đ</td>
							
							</tr>
							<tr>
								<td colspan="2"><hr /></td>
							</tr>
							
							<tr>
								<th scope="row">Tổng cộng</th>
								<td class="text-right"><h5 class="text-danger"><?php echo number_format($dhang["tongtien"]); ?>đ</h5></td>
							</tr>
							<tr>
								<?php $tongtien=$dhang["tongtien"];?>
								<td colspan="2"class="font-weight-bold text-primary small">Bằng chữ: <span class="text-danger"><?php echo ucfirst(DocSoThanhChu($tongtien)); ?> đồng.</span></td>
							</tr>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<?php include("../view/bottom.php"); ?>
