<?php include("view/top.php"); ?>

<div class="container">  
  <h4><b>TÌM KIẾM</b> </h4>
  <h5>Kết quả tìm kiếm cho từ khoá `<?php echo $tukhoa; ?>`</h5>
  <!-- Các thương hiệu -->
  <div class="row">
  <?php
    if($data != null){
      $dem=0;
      foreach($data as $m):  
  ?> 
        
      <div id="card" class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 px-2 p-2">
        <div class="card h-100">
          <a href="index.php?action=xemchitiet&id=<?php echo $m["id"]; ?>">
            <img src="public/<?php echo $m['hinhanh']; ?>" class="card-img-top" />
          </a>
          <div class="card-body p-2">
            <h5 class="card-text small"><?php echo $m['tenmypham']; ?></h5>
            <p class="card-text text-danger font-weight-bold"><?php echo number_format($m['giaban']); ?><u><sup>đ</sup></u></p>
          </div>
          <div class="card-footer p-2">
            <a href="?action=themvaogio&id=<?php echo $m["id"];?>&soluong=1" class="btn btn-sm btn-danger "><i class="bi bi-cart3"></i> Mua hàng</a>
            <a href="?action=xemchitiet&id=<?php echo $m["id"]; ?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Xem chi tiết"><i class="bi bi-exclamation-circle"></i> </a>
          </div>
        </div>
      </div> 
      <?php
        $dem++;
        endforeach; 
        } else{
      ?>

      <br>
      <div class="col-sm-12">
            <div class="text-center" height="400px">
                <img src="public/images/search.png" width="200px" alt="">
                <br><br>
                <p><i class="bi bi-x-lg text-danger"></i> Không tìm thấy sản phẩm nào khớp với lựa chọn của bạn!</p>
                <a href="index.php?action=macdinh" class="btn btn-warning">Tiếp tục mua sắm</a>
            </div>
            <br>
      </div>
    <?php
      }
    ?>
  </div>
  <hr>
  <h4><b>XEM THÊM</b> </h4>
  <?php include("topview.php"); ?>
</div>
<br>
    <div class="button_scroll2top" onclick="page_scroll2top()">
      <i class="bi bi-capslock"></i>
		</div>
<div class="d-flex justify-content-center"><a href="?action=xemtatcasanpham" type="button" class="btn btn-outline-primary col-sm-4 ">XEM THÊM</a></div>
<?php include("view/bottom.php"); ?>
  
