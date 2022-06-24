<?php include("../view/top.php"); ?>
<div class="page-content p-3" id="content">
	<!-- Toggle button -->
	&nbsp;&nbsp;&nbsp;&nbsp;<button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
		<i class="fa fa-bars text-primary mr-1"></i>
	</button>
	<div class="container">
		<div class="card">
			<h4 class="card-header" >SỬA MỸ PHẨM</h4> 
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
					<input type="hidden" name="id" value="<?php echo $m["id"]; ?>">
					<input type="hidden" name="action" value="xulysua">
					
					<div class="form-row">
						<div class="form-group col-sm-6">
						<label>Loại mỹ phẩm</label>
							<select class="form-control" name="optloaimypham">
							<?php
							foreach($loaimypham as $l):
								if($l["id"]==$m["loaimypham_id"])
								{
							?>
								<option value="<?php echo $l["id"]; ?>" selected="selected"><?php echo $l["tenloai"]; ?></option>
							<?php
								}
								else
								{
								?>
								<option value="<?php echo $l["id"];?>" ><?php echo $l["tenloai"];?></option>
							<?php
								}
							endforeach;
							?>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>Thương hiệu</label>
							<select class="form-control" name="optthuonghieu">
								<?php
								foreach($thuonghieu as $t):
									if($t["id"]==$m["thuonghieu_id"]){
								?>
								<option value="<?php echo $t["id"];?>" selected="selected"><?php echo $t["tenthuonghieu"];?></option>
								<?php
									}
									else
									{
								?>
								<option value="<?php echo $t["id"];?>" ><?php echo $t["tenthuonghieu"];?></option>
								<?php
									}	
								endforeach;
								?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label>Tên mỹ phẩm</label>
						<input class="form-control" type="text" name="tenmypham" value="<?php echo $m["tenmypham"]; ?>">
					</div>
					<div class="form-row">
						<div class="form-group col-sm-6">
							<label>Giá gốc</label>
							<input class="form-control" type="number" name="giagoc" value="<?php echo $m["giagoc"]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label>Giá bán</label>
							<input class="form-control" type="number" name="giaban" value="<?php echo $m["giaban"]; ?>">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-sm-4">
							<label>Số lượng tồn</label>
							<input class="form-control" type="number" name="soluongton" value="<?php echo $m["soluongton"]; ?>">
						</div>
						<div class="form-group col-sm-4">
							<label>Lượt xem</label>
							<input class="form-control" type="number" name="luotxem" value="<?php echo $m["luotxem"]; ?>">
						</div>
						<div class="form-group col-sm-4">
							<label>Lượt mua</label>
							<input class="form-control" type="number" name="luotmua" value="<?php echo $m["luotmua"]; ?>">
						</div>
					</div>
					
					<div id="hinh" class="form-group">
						<label>Hình ảnh</label><br>
						<input type="hidden" name="hinhcu" value="<?php echo $m["hinhanh"]; ?>">
						<img src="../../public/<?php echo $m["hinhanh"]; ?>" width="50"><br>
						<input type="checkbox" id="chkdoianh" name="chkdoianh" value="1"> Đổi hình ảnh<br>
					</div>  
					<div id="file" class="form-group">  
						<input type="file" class="form-control" name="filehinhanh">
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<textarea class="form-control ckeditor" id="mota" name="mota"><?php echo $m["mota"]; ?></textarea>
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
