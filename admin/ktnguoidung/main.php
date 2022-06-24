<?php include("../view/top.php"); ?>
<div class="page-content p-3" id="content">
  <!-- Toggle button -->
  <!-- Toggle button -->
	&nbsp;&nbsp;&nbsp;&nbsp;<button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
		<i class="fa fa-bars text-primary mr-1"></i>
	</button>
    <div class="container">
        <h2 class="display-4 text-dark">Trang quản trị shop mỹ phẩm NuTy</h2>
        <br>
        <div class="row">
        <div class="col-sm-4">
            
                <div class="card mb-3" style="max-width: 22rem;">
                    <div class="card-body text-white bg-success ">
                        <img style="float: left" src="../public/images/coin.png" alt="">
                        <h2 class="card-text text-right"><?php echo number_format($tongtienbanhang);?>đ</h2>
                        <h5 class="card-title text-right">Doanh thu</h5>
                    </div>
                    <div class="card-footer text-right bg-transparent border-success"><a href=""><i class="bi bi-chevron-double-right"></i></a></div>
                </div>
            </div>
            
        <div class="col-sm-4">
                <div class="card mb-3" style="max-width: 22rem;">
                    <div class="card-body text-white bg-info">
                        <img style="float: left" src="../public/images/cardnew.png" alt="">
                        <h2 class="card-text text-right"><?php echo $dem;?></h2>
                        <h5 class="card-title text-right">Chờ xử lý!</h5>
                    </div>
                    <div class="card-footer text-right bg-transparent border-info"><a href="../qldonhang/index.php?opttrangthai=0&action=timkiem">Xem chi tiết<i class="bi bi-chevron-double-right"></i></a></div>
                </div>
            </div>
            <div class="col-sm-4">          
                <div class="card mb-3" style="max-width: 22rem;">
                <div class="card-body text-white bg-danger">
                    <img style="float: left" src="../public/images/card.png" alt="">
                    <h2 class="card-text text-right"><?php echo $demdontra;?></h2>
                    <h5 class="card-title text-right">Đơn hoàn!</h5>
                </div>
                <div class="card-footer text-right bg-transparent border-danger"><a href="../qldonhang/index.php?opttrangthai=4&action=timkiem">Xem chi tiết<i class="bi bi-chevron-double-right"></i></a></div>
                </div>
            </div>  
         
            

            
        </div>
    </div>
  
    <div class="separator"></div>

    </div>

</div>
<?php include("../view/bottom.php"); ?>

