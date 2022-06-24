<?php include("view/top.php"); ?>
<?php require_once "libs/functions.php";?>
<div class="container"> 
   <?php 
      if(demhangtronggio()==0){
         $message = "Giỏ hàng chưa có sản phẩm nào! Xin vui lòng quay về trang mua hàng.";
		   include "view/empty.php";
      }
      else
      {
    ?>
   <div class="row">
      <div class="col-sm-7">
         <div class="alert alert-primary" role="alert">
            <img src="public/images/free.png" width="64px" alt=""> &nbsp;Miễn phí vận chuyển cho tất cả các đơn hàng mua tại website!
         </div>
      </div>
   </div>
   <h5>GIỎ HÀNG</h5> 
   <div class="row">
      <div class="col-sm-9">
      <form method="post" enctype="multipart/form-data">
         <input type="hidden" name="action" value="capnhatgiohang">
         <table class="table table-sm">
            <tr class="table-active bg-light">
                  <th width="10%"></th>
                  <th width="40%">Tất cả (<?php echo demhangtronggio();?> sản phẩm)</th>
                  <th width="15%" class="text-center">Đơn giá</th>
                  <th width="10%" class="text-center">Số lượng</th>
                  <th width="20%" class="text-center">Thành tiền</th>
                  <th width="5%" class="text-center">Xoá</th>
            </tr>
            <?php
            foreach($giohang as $ma => $mp):
               ?>
               <tr>
                  <td><img class="img-thumnail" width="60" src="public/<?php echo $mp["hinhanh"];?>" alt=""></td>
                  <td class="small"><?php echo $mp["tenmypham"]; ?></td>
                  <td class="text-center"><?php echo number_format($mp["giaban"]). "đ"; ?></td>
                  <td class="text-center"><input type="number" min="0" max="999" class="form-control" name="mp[<?php echo $ma; ?>]" value="<?php echo $mp["soluong"]; ?>">
                  </td>
                  <td class="text-center"><?php echo number_format($mp["sotien"])."đ"; ?></td>
                  <td class="text-center"><a href="index.php?action=xoamotmathang&id=<?php echo $ma; ?>" onclick="return confirm('Bạn chắn chắn muốn xóa sản phẩm <?php echo $mp['tenmypham'];?>?')"><i class="bi bi-trash-fill text-danger"></i></a></td>
               </tr>

               <?php
               endforeach;
               ?>
            <tr>
               <td colspan="4">
               <a href="?action=xoagiohang" onclick="return confirm('Bạn chắn chắn muốn xóa tất cả sản phẩm trong giỏ?')">Xoá tất cả</a></td>
               <td colspan="2" class="text-right"><button type="submit" class="btn btn-primary">Cập nhật giỏ hàng</button></td>
            </tr>
         </table>
         
      </div>
      <div class="col-sm-3">
         <table class="table table-sm table-borderless">
            <tr class="table-active bg-light">
               <th colspan="2">
                  Thông tin thanh toán
               </th>
            </tr>
            <tr>
               <th scope="row">Tạm tính</th>
               <?php $tongtien=tinhtiengiohang(); ?>
               <td class="text-right"><?php echo number_format($tongtien); ?>đ</td>
               
            </tr>
            <tr>
               <th scope="row">Giảm giá</th>
               <td class="text-right">0đ</td>
               
            </tr>
            <tr>
               <td colspan="2"><hr /></td>
            </tr>
            
            <tr>
               <th scope="row">Tổng cộng</th>
               <td class="text-right"><h5 class="text-danger"><?php echo number_format(tinhtiengiohang()); ?>đ</h5></td>
            </tr>
            
            <tr>
               
               <td colspan="2"  class="text-right"><a href="index.php?action=datmua" class="btn btn-danger btn-block">Đặt mua</a></td>
            </tr>
         </table>
      </div>
      </form>
      <?php
      }
      ?>
   </div>
</div>
<?php include("view/bottom.php"); ?>