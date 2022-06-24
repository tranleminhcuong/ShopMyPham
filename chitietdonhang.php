<?php include("view/top.php"); ?>
<?php require_once "libs/functions.php";?>
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
            <h4>CHI TIẾT ĐƠN HÀNG #<?php echo str_pad($donhang_id, 8, "0", STR_PAD_LEFT); ?> </h4>
            <table class="table table-borderless">
               <tr >
                  <td>
                  Trạng thái: 
                  <?php if($ctdh["trangthai"]==0) 
                           echo "<span class='badge badge-secondary'>Chờ xử lý</span>"; 
                        else if($ctdh["trangthai"]==1)
                           echo "<span class='badge badge-warning'>Đã xác nhận</span>";
                        else if($ctdh["trangthai"]==2)
                           echo "<span class='badge badge-primary'>Đang giao hàng</span>";
                        else if($ctdh["trangthai"]==3)
                           echo "<span class='badge badge-success'>Đã nhận</span>";
                        else if($ctdh["trangthai"]==4)
                           echo "<span class='badge badge-dark'>Hoàn lại</span>";
                        else
                           echo "<span class='badge badge-danger'>Đã huỷ</span>";
                  ?>
                  </td> 
                  <td class="text-right" >Ngày mua: <?php echo $ctdh["ngay"];?></td>   
               </tr> 
               <tr>
                  <td colspan="2">Địa chỉ giao hàng: <?php echo $tendiachi; ?></td>
               </tr>
         </table>
            
         <table class="table table-sm" width="100%">
				<tr class="table-active bg-light">
               <th></th>
					<th>Tên sản phẩm</th>
					<th>Đơn giá</th>
					<th>Số lượng</th>		
					<th>Thành tiền</th>		
					
				</tr>
				<?php
				foreach($ctdonhang as $ct):
				?>
				<tr>
               <td ><img class="img-thumnail" width="80px" src="public/<?php echo $ct["hinhanh"]; ?>" alt=""></td>
					<td ><?php echo $ct["tenmypham"]; ?></td>
					<td><?php echo number_format($ct["dongia"]); ?>đ</td>
               <td><?php echo $ct["soluong"]; ?></td>
					<td><?php echo number_format($ct["thanhtien"]); ?>đ</td>
					
				</tr>
				<?php
				endforeach;
				?>
			</table>
         <hr>
         <table class="table table-sm table-borderless float-right col-sm-5">
            
            <tr>
               <th scope="row">Tạm tính</th>
               
               <td class="text-right"><?php echo number_format($ctdh["tongtien"]);?>đ</td>
               
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
               <td class="text-right"><h5 class="text-danger"><?php echo number_format($ctdh["tongtien"]); ?>đ</h5></td>
            </tr>
            <tr>
               <?php $tongtien=$ctdh["tongtien"];?>
               <td colspan="2"class="font-weight-bold text-primary small">Bằng chữ: <span class="text-danger"><?php echo ucfirst(DocSoThanhChu($tongtien)); ?> đồng.</span></td>
            </tr>
         </table>
      </div>
      
      <?php
      }
      ?>
   </div>
   <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-9">
         <h6><a href="?action=lichsumuahang"><i class="bi bi-chevron-double-left"></i>Quay lại đơn hàng của tôi</a> </h6>
      </div>

   </div>
</div>
<?php include("view/bottom.php"); ?>