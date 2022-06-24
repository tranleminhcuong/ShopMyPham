<?php include("../view/top.php"); ?>
<div class="page-content p-3" id="content">
	<!-- Toggle button -->
	&nbsp;&nbsp;&nbsp;&nbsp;<button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
		<i class="fa fa-bars text-primary mr-1"></i>
	</button>
	<div class="container">
		<div class="card">
			<h4 class="card-header">QUẢN LÝ NGƯỜI DÙNG</h4> 
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
				<!-- Danh sách người dùng -->
				<form action="" method="GET">
					<div class="form-row">
						<div class="form-group col-sm-4">
						<a href="?action=themnguoidung" type="button" class="btn btn-primary"><i class="fa fa-plus-square" ></i> Thêm mới</a>
						</div>
						<div class="form-group col-sm-3">
						<select class="custom-select" name="optloai" required>
						
							<option value='1'selected>Quản trị</option>
							<option value='2'>Nhân viên</option>
							<option value='3'>Khách hàng</option>
						
						</select>
						</div>
						<div class="form-group col-sm-5">
							<input type="submit" value="Tìm kiếm" class="btn btn-primary">
							<input type="hidden" name="action" value="timkiem">
						</div>
					</div>
					
					
				</form>
				<div class="table-responsive-lg">
					<table id="PhanTrang" class="table table-sm table-hover table-bordered">
					<thead>
						<tr class="table-active">
							<th scope="col">#</th>
							<th scope="col">Email</th>
							<th scope="col">Tên</th>
							<th scope="col">Số điện thoại</th>
							<th scope="col">Phân quyền</th>
							<th scope="col">Trạng thái</th>
							<th scope="col">Khóa</th>
							<th width="7%" scope="col">Cấp quyền</th>
							
							
						</tr>
					</thead>
					<tbody>
						<?php 
						$stt=0;
						foreach ($nguoidung as $nd): 
						?>
						<tr>
							<td><?php echo $stt++;?></td>
							<td><?php echo $nd['email'];?></td>
							<td><?php echo$nd['hoten'];?></td>
							<td><?php echo $nd['sodienthoai'];?></td>
							<td>
							<?php
								if($nd["loai"]==1){
								?>
									 <span class='badge badge-danger'>Quản trị</span>
								<?php
								}
								elseif($nd["loai"]==2){ ?>
									<span class='badge badge-success'>Nhân viên</span>
								
								<?php
								}
								else{
								?>
									<span class='badge badge-secondary'>Khách hàng</span>
								<?php
								}?>
						
							</td>
							<td>
							<?php
								if($nd["loai"]!=1) {
									if($nd["trangthai"]==1){
								?>
										<span class='badge badge-primary'>Kích hoạt</span>
								<?php
								}
									else{
								?>
										<span class='badge badge-danger'>Khóa</span> 
								<?php	
									}
								}
								?>
							</td>
							<td>
							<?php

							if($nd["loai"]!=1) {
								if($nd["trangthai"]==1){
								?>
									<a onclick="return confirm('Bạn chắn chắn muốn khoá người dùng <?php echo $nd['hoten'];?>?')" href="?action=khoa&trangthai=0&id=<?php echo $nd['id'];?>">Khóa</a>
								<?php 
								}else{ 
								?> 
									<a  onclick="return confirm('Bạn chắn chắn muốn kích hoạt người dùng <?php echo $nd['hoten'];?>?')"  href="?action=khoa&trangthai=1&id=<?php echo $nd['id'];?>">Kích hoạt</a>
								<?php 
								}
							}
								?>
							</td>
							<td>
							<?php
							if($nd["loai"]==2) {
								?>
									<a class='btn btn-warning' href='index.php?action=suanguoidung&id=<?php echo $nd['id'];?>'><i class='fa fa-pencil-square-o text-white'></i></a>
							<?php
							}
							?>
							</td>
							
						</tr>
							<?php
								endforeach;	
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("../view/bottom.php"); ?>
