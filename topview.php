
<div class="row"> 
    <!-- Hàng nổi bật -->    
    <?php
    foreach($myphamnoibat as $m):
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
              <h6 class="small">&nbsp;&nbsp; |&nbsp;&nbsp;<i class="bi bi-eye-fill"></i> <?php echo $m["luotxem"];?></h6>
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