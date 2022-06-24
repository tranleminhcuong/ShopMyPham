<?php include("../view/top.php"); ?>
<div class="page-content p-3" id="content">
	<!-- Toggle button -->
	&nbsp;&nbsp;&nbsp;&nbsp;<button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
		<i class="fa fa-bars text-primary mr-1"></i>
	</button>
	<div class="container">
		<div class="card">
			<h4 class="card-header" >QUẢN LÝ MỸ PHẨM</h4> 
			<div class="card-body">
				<!--tim kiếm-->
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
					
				
				<form action="" method="GET">
					<div class="form-row">
						<div class="form-group col-sm-4">
							<a href="index.php?action=them" class="btn btn-primary"><i class="fa fa-plus-square" ></i> Thêm mới</a>
						</div>
						<div class="form-group col-sm-3">
							<select class="form-control" name="otploaimypham">
							<?php 
								foreach($loaimypham as $l):
									?>
									<option value="<?php echo $l["id"];?>"><?php echo $l["tenloai"] ;?></option>
								<?php
									endforeach;
								?>
								
							</select>
						</div>
						<div class="form-group col-sm-5">
							<input type="submit" value="Tìm kiếm" class="btn btn-primary">
							<input type="hidden" name="action" value="timkiem">
						</div>
					</div>										
				</form>
				
				<div class="table-responsive-lg">
					<table id="PhanTrang" class="table table-hover table-sm table-bordered" width="100%">
						<thead>	
							<tr class="table-active bg-light">
								<th>#</th>
								<th>Loại</th>
								<th>Tên mỹ phẩm</th>
								<th>Giá gốc</th>
								<th>Giá bán</th>		
								<th>Số lượng tồn</th>
								<th>Hình ảnh</th>
								<th>Lượt xem</th>		
								<th>Lượt mua</th>
								
								<th>Sửa</th>
								<th>Xoá</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$stt=0;
						foreach($mypham as $mp):
						?>
						
							<tr>
								<td><?php echo $stt++; ?></td>
								<?php 
									foreach($loaimypham as $l):
										if($l["id"]==$mp["loaimypham_id"]){
								?>
									<td class="small"><?php echo $l["tenloai"]; ?></td>
								<?php
										}
									endforeach;
								?>
								<td class="small"><?php echo $mp["tenmypham"]; ?></td>
								<td><?php echo number_format($mp["giagoc"]); ?>đ</td>
								<td><?php echo number_format($mp["giaban"]); ?>đ</td>
								<td><?php echo $mp["soluongton"]; ?></td>
								<td><img src="../../public/<?php echo $mp["hinhanh"]; ?>" width="80" class="img-thumbnail"></td>
								<td><?php echo $mp["luotxem"]; ?></td>
								<td><?php echo $mp["luotmua"]; ?></td>		
								
								<td><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $mp["id"]; ?>"><i class='fa fa-pencil-square-o text-white'></i></a></td>
								<td><a class="btn btn-danger" onclick="return confirm('Bạn chắn chắn muốn xóa sản phẩm <?php echo $mp['tenmypham'];?>?')" href="index.php?action=xoa&id=<?php echo $mp["id"]; ?>"><i class="fa fa-trash"></i></a></td>
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
