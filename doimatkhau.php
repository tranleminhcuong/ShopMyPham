<?php include("view/top.php"); ?>
<?php require_once "libs/functions.php";?>
<div class="container"> 
   
      <br>
   <div class="row">
      <div class="col-sm-3">
            <?php include("nav_khachhang.php");?>
      </div>
      <div class="col-sm-6">
      <h4>ĐỔI MẬT KHẨU</h4>
            <?php if(isset($message)){ 
            ?>
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle-fill"></i> <?php echo $message; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
         <?php
               }    
            ?>
         
         <?php
            if(isset($_SESSION["khachhang"])) //tồn tại session khách hàng
            { 
         ?>
         <form method="post" onsubmit="return ktxacnhanmatkhau()">
            <input type="hidden" name="action" value="xulydoimatkhau">
            
            <div class="form-group">
               <label for="">Mật khẩu mới</label>
               <input type="password" name="matkhau" id="matkhau" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="">Xác nhận mật khẩu</label>
               <input type="password" name="xacnhanmatkhau" id="xacnhanmatkhau" class="form-control" required>
            </div>
            <div>
               <button type="submit" class="btn btn-danger btn-block">Đổi mật khẩu</button>
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
   </div>
</div>
<?php include("view/bottom.php"); ?>