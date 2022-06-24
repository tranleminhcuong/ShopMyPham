<?php include("../view/top.php"); ?>
<div class="page-content p-3" id="content">
	<!-- Toggle button -->
	&nbsp;&nbsp;&nbsp;&nbsp;<button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
		<i class="fa fa-bars text-primary mr-1"></i>
	</button>
	<div class="container">
		<div class="card">
			<h4 class="card-header">QUẢN LÝ THƯƠNG HIỆU</h4> 
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
				?>
			

				<a href="?action=themthuonghieu" class="btn btn-primary"><i class="fa fa-plus-square" ></i> Thêm mới</a>
				<br><br>
			
				<!-- Danh sách thương hiệu -->
				
				<div class="table-responsive-lg">
					<table id="PhanTrang" class="table table-sm table-hover table-bordered">
						<thead>
							<tr class="table-active">
								<th >#</th>
								<th >Tên thương hiệu</th>
								<th width="60%">Hình ảnh</th>
								<th width="7%" >Sửa</th>
								<th width="7%" >Xoá</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$stt=0;
							foreach($thuonghieu as $th):
							?>
							<tr>
								<td class="small"><?php echo $stt++; ?></td>
								<td class="small"><?php echo $th["tenthuonghieu"]; ?></td>
								<td><img src="../../public/<?php echo $th["hinhanh"]; ?>" width="50" class="img-thumbnail"></td>
								<td><a class="btn btn-warning" href="index.php?action=suathuonghieu&id=<?php echo $th["id"]; ?>"><i class='fa fa-pencil-square-o text-white'></i></a></td>
								<td><a class="btn btn-danger" onclick="return confirm('Bạn chắn chắn muốn xóa thương hiệu <?php echo $th['tenthuonghieu'];?>?')" href="index.php?action=xoathuonghieu&id=<?php echo $th["id"]; ?>"><i class="fa fa-trash"></i></a></td>
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
