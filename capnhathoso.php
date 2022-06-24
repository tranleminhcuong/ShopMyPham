<?php include("view/top.php"); ?>
<?php require_once "libs/functions.php";?>
<div class="container"> 
   
   <br>
   <form action="index.php?action=xulycapnhathoso" method="post" enctype="multipart/form-data">
   <?php
      if(isset($_SESSION["khachhang"])) //tồn tại session khách hàng
      { 
   ?>
   <div class="row">
      <div class="col-sm-3">
            <?php include("nav_khachhang.php");?>
      </div>
      
      <div class="col-sm-6">
      <h4>CẬP NHẬT HỒ SƠ</h4>
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
         
            <div class="form-group">
               <label for="">Email</label>
               <input type="email" name="email" class="form-control" value="<?php echo $_SESSION["khachhang"]["email"];?>" required>
            </div>
            <div class="form-group">
               <label for="">Họ tên khách hàng</label>
               <input type="text" name="hoten" id="hoten" class="form-control" value="<?php echo $_SESSION["khachhang"]["hoten"];?>" required>
            </div>
            <div class="form-group">
               <label for="">Số điện thoại</label>
               <input type="number" name="dienthoai" id="dienthoai" class="form-control" value="<?php echo $_SESSION["khachhang"]["sodienthoai"];?>" required>
            </div>
            
            <div>
               <button type="submit" class="btn  btn-danger btn-block">Lưu thay đổi</button>
            </div>
         
      </div>
      <div class="col-sm-3">
               <div class="text-center">
								<div id="hinh" class="form-group">
                        <br>
									<p>Ảnh đại diện</p>
									<input type="hidden" name="hinhcu" value="<?php echo $_SESSION["khachhang"]["hinhanh"];; ?>">
									<img class="rounded-circle shadow-lg" id="output" src="public/images/<?php if($_SESSION['khachhang']['hinhanh']==null){
                              echo 'user.png'; 
                           }else {
                              echo $_SESSION['khachhang']['hinhanh'];
                           }
                           ?>"  width="200px" height="200px">
								</div>
								<div id="file" class="form-group">
									<input type="file" name="fhinh" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
								</div>
							</div>
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