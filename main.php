<?php 
  include("view/top.php");
  include("view/carousel.php");
?>
<br>
<div class="container">  
        <img src="images/banner/b1.png" class="d-block w-100" alt="">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#spnoibac" role="tab" aria-controls="pills-home" aria-selected="true">Sản phẩm nổi bậc <i class="bi bi-star-fill "></i></a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#spbanchay" role="tab" aria-controls="pills-profile" aria-selected="false">Bán chạy nhất <i class="bi bi-lightning-fill "></i></a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#giathap" role="tab" aria-controls="pills-contact" aria-selected="false">Giá thấp<i class="bi bi-caret-down-fill"></i></a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#giacao" role="tab" aria-controls="pills-contact" aria-selected="false">Giá cao<i class="bi bi-caret-up-fill"></i></a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="spnoibac" role="tabpanel" aria-labelledby="pills-home-tab"> <?php include("topview.php"); ?></div>
  <div class="tab-pane fade" id="spbanchay" role="tabpanel" aria-labelledby="pills-profile-tab"><?php include("banchaynhat.php"); ?></div>
  <div class="tab-pane fade" id="giathap" role="tabpanel" aria-labelledby="pills-contact-tab">
  <div class="row"> 
      <!-- Hàng giá thấp -->    
      <?php
      foreach($giathap as $m):
      ?>
      <div id="card" class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 px-2 p-2">
        <div class="card h-100">
          <a href="index.php?action=xemchitiet&id=<?php echo $m["id"]; ?>">
            <img src="public/<?php echo $m['hinhanh']; ?>" class="card-img-top" />
          </a>
          <div class="card-body p-2">
            <h5 class="card-text small"><?php echo $m['tenmypham']; ?></h5>
            <form class="form-inline">
              <h6 class=" card-text text-danger font-weight-bold"><?php echo number_format($m['giaban']); ?><u><sup>đ </sup></u> </h6>
              <h6 class="small">&nbsp;&nbsp; | Đã bán: <?php echo $m["luotmua"];?></h6>
            </form>
          </div>
          <div class="card-footer p-2">
            <a href="?action=themvaogio&id=<?php echo $m["id"];?>&soluong=1" class="btn btn-sm btn-danger "><i class="bi bi-cart3"></i> Mua hàng</a>
            <a href="?action=xemchitiet&id=<?php echo $m["id"]; ?>" class="btn btn-sm btn-secondary " data-toggle="tooltip" title="Xem chi tiết"><i class="bi bi-info-circle"></i></a>
            
          </div>
        </div>
      </div>
      <?php endforeach; ?>
  </div>
  </div>
  <div class="tab-pane fade" id="giacao" role="tabpanel" aria-labelledby="pills-contact-tab">
    <div class="row"> 
      <!-- Hàng giá cao -->    
      <?php
      foreach($giacao as $m):
      ?>
      <div id="card" class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 px-2 p-2">
        <div class="card h-100">
          <a href="index.php?action=xemchitiet&id=<?php echo $m["id"]; ?>">
            <img src="public/<?php echo $m['hinhanh']; ?>" class="card-img-top" />
          </a>
          <div class="card-body p-2">
            <h5 class="card-text small"><?php echo $m['tenmypham']; ?></h5>
            <form class="form-inline">
                        <h6 class=" card-text text-danger font-weight-bold"><?php echo number_format($m['giaban']); ?><u><sup>đ </sup></u> </h6>
                        <h6 class="small">&nbsp;&nbsp; | Đã bán: <?php echo $m["luotmua"];?></h6>
                      </form>
          </div>
          <div class="card-footer p-2">
            <a href="?action=themvaogio&id=<?php echo $m["id"];?>&soluong=1" class="btn btn-sm btn-danger "><i class="bi bi-cart3"></i> Mua hàng</a>
            <a href="?action=xemchitiet&id=<?php echo $m["id"]; ?>" class="btn btn-sm btn-secondary " data-toggle="tooltip" title="Xem chi tiết"><i class="bi bi-exclamation-circle"></i> </a>
            
          </div>
        </div>
      </div>
      <?php endforeach; ?>
  </div>
  </div>
</div>
    
  <!--===========================================-->
  <hr>
  <?php
    foreach($loaimypham as $l):
    ?>
        <h2 style="text-align: center;"><a href="?action=xemloaimypham&maloai=<?php echo $l["id"];?>"> <?php echo $l["tenloai"];?></a></h2>
        <div class="row">
        <?php
        foreach($mypham as $m):
          if($m["loaimypham_id"]== $l["id"]){
        ?>
            <div id="card" class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 px-2 p-2">
                <div class="card h-100">
                  <a href="index.php?action=xemchitiet&id=<?php echo $m["id"]; ?>">
                    <img src="public/<?php echo $m['hinhanh']; ?>" class="card-img-top" />
                  </a>
                  <div class="card-body p-2">
                    <h5 class="card-text small"><?php echo $m['tenmypham']; ?></h5>
                    <form class="form-inline">
                      <h6 class=" card-text text-danger font-weight-bold"><?php echo number_format($m['giaban']); ?><u><sup>đ </sup></u> </h6>
                      <h6 class="small">&nbsp;&nbsp; | Đã bán: <?php echo $m["luotmua"];?></h6>
                    </form>
                    
                  </div>
                  <div class="card-footer p-2">
                    <a href="?action=themvaogio&id=<?php echo $m["id"];?>&soluong=1" class="btn btn-sm btn-danger "><i class="bi bi-cart3"></i> Mua hàng</a>
                    <a href="?action=xemchitiet&id=<?php echo $m["id"]; ?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Xem chi tiết"><i class="bi bi-exclamation-circle"></i></a>
                   
                  </div>
                </div>
              </div>
        <?php 
        }
          endforeach;
        ?>
    </div>
    <?php
        endforeach;
    ?>
    


      
<br>
    <div class="button_scroll2top" onclick="page_scroll2top()">
      <i class="bi bi-capslock"></i>
		</div>
<div class="d-flex justify-content-center"><a href="?action=xemtatcasanpham" type="button" class="btn btn-outline-primary col-sm-4 ">XEM THÊM</a></div>
<?php include("view/bottom.php"); ?>