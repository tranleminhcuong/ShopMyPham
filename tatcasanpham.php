<?php 
  include("view/top.php");
?>

<div class="container">    
<h2 style="text-align: center;">Tất cả sản phẩm </h2>

<div class="row"> <!-- Tất cả mặt hàng - Xử lý phân trang -->
  
  <?php
  foreach($mypham as $m):
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

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="?action=xemtatcasanpham&trang=1"><i class="bi bi-chevron-bar-left"></i></a>
    </li>
    <?php if($tranghh>1&& $tongsotrang>1) 
    ?>
    <li class="page-item"><a class="page-link" href="?action=xemtatcasanpham&trang=<?php echo $tranghh-1; ?>"><i class="bi bi-caret-left"></i>
      </a></li>
    <?php
    //xuất các số trang
      for($i = 1;$i<=$tongsotrang;$i++){
        if($tranghh==$i)
          {
    ?>
            <li class="page-item active"><a class="page-link" href="?action=xemtatcasanpham&trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php 
          }
          else
          {
    ?>
    <li class="page-item"><a class="page-link" href="?action=xemtatcasanpham&trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php
          }
    }
    ?>
    <li class="page-item"><a class="page-link" href="?action=xemtatcasanpham&trang=<?php echo $tranghh+1; ?>">
    <i class="bi bi-caret-right"></i></a></li>
    <li class="page-item"><a class="page-link" href="?action=xemtatcasanpham&trang=<?php echo $tongsotrang; ?>">
    <i class="bi bi-chevron-bar-right"></i></a></li>
  </ul>
  </nav>
  
<?php include("view/bottom.php"); ?>