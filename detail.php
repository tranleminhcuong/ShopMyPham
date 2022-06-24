<?php include("view/top.php"); ?>
<div class="container">  
    <!-- start row 1-->  
    <div class="row">
        <div class="col-sm-5">     
            <div ><img class="rounded" src="public/<?php echo $mpct["hinhanh"]; ?>" width="450px" height="450px"></div>
            <br>
        </div>
        <div class="col-sm-7">
            <div class="bg-white pb-2 pt-3 px-4 rounded">
                <h5 class="text-primary"><?php echo $mpct["tenmypham"]; ?></h5>
                <div class="alert alert-danger" role="alert">
                    <h4 class="text-primary">Giá bán: 
                    <span class="text-danger"><?php echo number_format($mpct["giaban"]); ?><sup>đ</sup></span>
                    </h4>
                    <h6><span class="badge badge-warning font-italic">FREESHIP</span>Miễn phí vận chuyển</h6>
                </div>
            
                <form method="post">
                    <input type="hidden" name="action" value="themvaogio">
                    <input type="hidden" name="id" value="<?php echo $mpct["id"]; ?>">
                    <div class="form-row">
                        <div class="form-group col-sm-2">
                            <label for="">Số lượng</label>
                            <input type="number" class="form-control" name="soluong" value="1" min=1 max=999>
                            
                        </div>
                    </div>
                
                    <input type="submit" class="btn btn-danger col-sm-5" value="Chọn mua">
                    
                    <span class="badge badge-light">Lượt xem: <?php echo $mpct["luotxem"];?></span>
                    <span class="badge badge-light">Lượt mua: <?php echo $mpct["luotmua"];?></span>
                <br><br>
                </form>
        
           
                <h6>THÔNG TIN CHI TIẾT</h6>
               
                <table class="table table-borderless table-sm small">
                    <tbody>
                        <tr>
                            <td width="30%" class="table-secondary">Lưu ý</td>
                            <td>Bao bì sản phẩm có thể thay đổi theo từng đợt nhập hàng</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Danh mục</td>
                            <td><?php echo $tenloai;?></td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Thương hiệu</td>
                            <td><?php echo $tenthuonghieu;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end row 1-->
    <!--======================================-->
    <!-- start row 2-->
    <div class="row">
        
        <div class="col-sm-9">
            <div class="bg-white px-2 py-2 rounded">
                <div class="alert alert-info" role="alert">
                    <h4>MÔ TẢ SẢN PHẨM</h4>
                </div>
                <div>
                <?php echo $mpct["mota"]; ?>
                </div>
                
            </div>

                
        </div>
        <div class="col-sm-3">
            <div class="bg-white py-2 px-2 rounded">  
                <p>SẢN PHẨM CÙNG LOẠI</p>
                <marquee direction="down" height="1000px" onmouseover="stop()" onmouseout="start()">
                <?php
                foreach($mypham as $m):  
                    if($m["id"] != $mpct["id"]){
                ?>
                    <div class="card h-100">
                        <div class="card-body">
                        <a href="index.php?action=xemchitiet&id=<?php echo $m["id"]; ?>">
                            <img src="public/<?php echo $m['hinhanh']; ?>" class="card-img-top" />
                            <h5 class="card-text small"><?php echo $m['tenmypham']; ?></h5> 
                        </a>
                        <h6 class="card-text text-danger font-weight-bold"><?php echo number_format($m['giaban']); ?><u><sup>đ</sup></u></h6>
                        </div>
                    </div>
                    
                <?php 
                    }
                endforeach; 
                ?>
                </marquee>
            </div>
        </div>
    </div>
    <!--end row 2 -->
    <!--======================================-->
    <!-- start row 3-->
    <hr>
    <div class="row">
        <h2>Sản phẩm nổi bậc</h2>
        <?php include("topview.php"); ?>
    </div>
    <!--end row 3-->
</div>
<br>
<div class="button_scroll2top" onclick="page_scroll2top()">
    <i class="bi bi-capslock"></i>
</div>
<div class="d-flex justify-content-center"><a href="?action=xemtatcasanpham" type="button" class="btn btn-outline-primary col-sm-4 ">XEM THÊM</a></div>

<?php include("view/bottom.php"); ?>