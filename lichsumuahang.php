<?php include("view/top.php"); ?>
<div class="container"> 
   
   <br>
   
   <?php
      if(isset($_SESSION["khachhang"])) //tồn tại session khách hàng
      { 
   ?>
   <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
            <?php include("nav_khachhang.php");?>
      </div>
      
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
         <h4>LỊCH SỬ MUA HÀNG</h4>
         <br>
         <table id="PhanTrang" class="table table-hover table-sm table-bordered" width="100%">
            <thead>
				<tr class="table-active bg-light">
					<th>Mã đơn hàng</th>
					<th>Ngày mua</th>
					<th>Tổng tiền</th>		
					<th>Trạng thái</th>		
					<th>Chi tiết</th>
				</tr>
            </thead>
            <tbody>
				<?php
				foreach($donhang as $dh):
				?>
				<tr>
					<td ><?php echo str_pad($dh["id"], 8, "0", STR_PAD_LEFT); ?></td>
					<td><?php echo $dh["ngay"]; ?></td>
					<td><?php echo number_format($dh["tongtien"]); ?>đ</td>
					<td>
                  <?php if($dh["trangthai"]==0) 
                           echo "<span class='badge badge-secondary'>Chờ xử lý</span>"; 
                        else if($dh["trangthai"]==1)
                           echo "<span class='badge badge-warning'>Đã xác nhận</span>";
                        else if($dh["trangthai"]==2)
                           echo "<span class='badge badge-primary'>Đang giao hàng</span>";
                        else if($dh["trangthai"]==3)
                           echo "<span class='badge badge-success'>Đã nhận</span>";
                        else if($dh["trangthai"]==4)
                           echo "<span class='badge badge-dark'>Hoàn lại</span>";
                        else
                           echo "<span class='badge badge-danger'>Đã huỷ</span>";
                  ?>
               </td>
					<td><a  href="index.php?action=xemchitietdonhang&id=<?php echo $dh["id"]; ?>">Xem<i class="bi bi-chevron-double-right"></i></a></td>
				</tr>
				<?php
				endforeach;
				?>
            </tbody>
			</table>
      </div>
   </div>
   </form>
   <?php
      }
      else  //ko tồn tại session khách hàng
      {
   ?>
      <h5>Bạn chưa đăng nhập</h5>
   <?php
      }
   ?>
</div>
<?php include("view/bottom.php"); ?>