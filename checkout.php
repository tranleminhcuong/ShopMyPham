<?php include("view/top.php"); ?>
<?php require_once "libs/functions.php";?>
<div class="container"> 
   <?php if(isset($message)){ 
      ?>
   <div class="row">
      <div class="col-sm-12">
         <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
         <i class="bi bi-exclamation-circle"></i> <?php echo $message; ?><a href="?action=dangnhap&email=<?php if(isset($email)) echo $email;?>"> Đăng nhập ngay bây giờ!</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
      </div>
   </div>
   <?php
         }    
      ?>
   <br>
   <div class="row">
      <div class="col-sm-4">
         <h4>THÔNG TIN KHÁCH HÀNG</h4>
         <?php
            if(isset($_SESSION["khachhang"])) //tồn tại session khách hàng
            { 
         ?>
         <form method="post">
            <input type="hidden" name="action" value="luudonhang">
            <div class="form-group">
               <label for="hoten">Họ tên</label>
               <input type="text" name="hoten" class="form-control" value="<?php echo $_SESSION['khachhang']["hoten"]; ?>" readonly required>
            </div>
            <div class="form-group">
               <label for="">Email</label>
               <input type="email"name="email" class="form-control" value="<?php echo $_SESSION['khachhang']["email"]; ?>" readonly required>
            </div>
            <div class="form-group">
               <label for="">Số điện thoại</label>
               <input type="text" name="dienthoai" class="form-control" value="<?php echo $_SESSION['khachhang']["sodienthoai"]; ?>" readonly required>
            </div>
            <div class="form-group">
               <label for="">Địa chỉ</label>
               <textarea type="text" name="diachi" class="form-control" required placeholder="Địa chỉ giao hàng"></textarea>
            </div>
            <div class="form-group">
               <label for="">Ghi chú (tuỳ chọn)</label>
               <textarea type="text" name="ghichu" class="form-control" placeholder="Lưu ý khi giao hàng"></textarea>
            </div>
            <div>
               <button type="submit" class="btn btn-lg btn-danger btn-block">Hoàn tất đơn hàng</button>
            </div>
         </form>
         <?php
            }
            else  //ko tồn tại session khách hàng
            {
         ?>
         <form method="post">
            <input type="hidden" name="action" value="luudonhang">
            <div class="form-group">
               <label for="hoten">Họ tên</label>
               <input type="text" name="hoten" class="form-control" value="<?php if(isset($hoten)) echo $hoten;?>" required>
            </div>
            <div class="form-group">
               <label for="">Email</label>
               <input type="email"name="email" class="form-control" value="<?php if(isset($email)) echo $email;?>" required>
            </div>
            <div class="form-group">
               <label for="">Số điện thoại</label>
               <input type="text" name="dienthoai" class="form-control" value="<?php if(isset($dienthoai)) echo $dienthoai;?>" required>
            </div>
            <div class="form-group">
               <label for="">Địa chỉ</label>
               <textarea type="text" name="diachi" class="form-control" required><?php if(isset($diachi)) echo $diachi;?></textarea>
            </div>
            <div class="form-group">
               <label for="">Ghi chú (tuỳ chọn)</label>
               <textarea type="text" name="ghichu" class="form-control"  placeholder="Lưu ý khi giao hàng"><?php if(isset($ghichu)) echo $ghichu;?></textarea>
            </div>
            <div>
               <button type="submit" class="btn btn-lg btn-danger btn-block">Hoàn tất đơn hàng</button>
            </div>
         </form>
         <?php
            }
         ?>
      </div>
      <div class="col-sm-8">
      <h4>ĐƠN HÀNG CỦA BẠN</h4>
      
         <input type="hidden" name="action" value="capnhatgiohang">
         <table class="table table-sm">
            <tr class="table-active bg-light">
                  <th width="60%">SẢN PHẨM</th>
                  <th width="40%" class="text-right">TỔNG</th>
            </tr>
            <?php
            foreach($giohang as $ma => $mp):
               ?>
               <tr>
                  
                  <td ><h6 class="text-secondary" ><?php echo $mp["tenmypham"]; ?> <b>x <?php echo $mp["soluong"]; ?></b></h6></td>
                  <td class="text-right"><h6 class="text-secondary" ><?php echo number_format($mp["sotien"])."đ"; ?></h6></td>
                 
               </tr>
               <?php
               endforeach;
               ?>
               <tr>
               <th scope="row">Giao hàng</th>
                  <td class="text-right"><h6 class="text-primary">Miễn phí giao hàng</h6></td>
               </tr>
               <tr>
                  <th scope="row"><h3 class="text-danger">TỔNG GIÁ TRỊ</h3></th>
                  <td class="text-right"><h4 class="text-danger"><?php echo number_format(tinhtiengiohang()); ?>đ</h4></td>
               </tr>
               <tr>
                  <td colspan="2"class="font-weight-bold text-primary">Bằng chữ: <span class="text-danger"><?php $tongtien=tinhtiengiohang(); echo ucfirst(DocSoThanhChu($tongtien)); ?> đồng.</span></td>
               </tr> 
         </table>
         
      </div>
      
      
   </div>
</div>
<?php include("view/bottom.php"); ?>