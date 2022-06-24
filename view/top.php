<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>NUTY COSMETICS</title>
    <link rel="shortcut icon" href="public/images/short-icon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="public/css/shopmypham.css" />
   
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color:rgb(26,148,255);">
        <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="public/images/logo.png" width="100" height="40" class="d-inline-block align-top" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"><i class="bi bi-gem"></i> THƯƠNG HIỆU</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <?php            
                      foreach($thuonghieu as $th):
                      ?>
                        <a class="dropdown-item" href="?action=xemthuonghieu&math=<?php echo $th["id"]; ?>"><?php echo $th["tenthuonghieu"]; ?></a>
                      <?php endforeach; ?>
                    </div>
              </li>
              <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"><i class="bi bi-flower1"></i> DANH MỤC</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <?php            
                      foreach($loaimypham as $loaimp):
                      ?>
                        <a class="dropdown-item" href="?action=xemloaimypham&maloai=<?php echo $loaimp["id"]; ?>"><?php echo $loaimp["tenloai"]; ?></a>
                      <?php endforeach; ?>
                    </div>
              </li>
              
            </ul>
            <!--form tìm kiếm--->
            <form method="get" class="col-sm-5">
                <input type="hidden" name="action" value="timkiem">
                <div class="input-group mb-0">
                        <input type="search" class="form-control" name="tukhoa" style="width=300px;" placeholder="Tìm sản phẩm ..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-blue" type="submit"  id="button-addon2"><i class="bi bi-search"></i> Tìm kiếm</button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav ml-auto">
              <?php
                if(!isset($_SESSION['khachhang']))
                {
              ?>
                    <li class="nav-item active"><a class="nav-link" href="index.php?action=dangnhap"><i class="bi bi-box-arrow-right"></i> Đăng nhập</a></li>
                    <li class="nav-item dropdown active ">
                      
                        <a class="nav-link dropdown-toggle" href="index.php?action=xemgiohang"><i class="bi bi-cart"></i>
                          <sup><span class="badge badge-pill badge-warning" style="top: 50%; margin-top: -5px; margin-left:-10px;"><?php echo demhangtronggio(); ?></span></sup>
                        </a>
                     
                      <div class="dropdown-menu dropdown-menu-right" style="white-space: nowrap;" aria-labelledby="navbarDropdownMenuLink">
                      <?php 
                        if(demhangtronggio()==0){
                          echo "
                            <div class='text-center'>
                              <img src='public/images/giohangrong.png' width='100px'> 
                              <br><br>
                                <h6 class='small'>Chưa có sản phẩm!</h6>
                            </div>";
                        }
                        else
                        {
                        ?>
                          <table class="table table-sm table-borderless">
                            <th colspan="3">Sản phẩm mới thêm</th>
                          <?php
                          $giohang=laygiohang();
                          foreach($giohang as $ma => $mp):
                            ?>
                            <tr>
                                <td><img class="img-thumnail" width="50" src="public/<?php echo $mp["hinhanh"];?>" alt=""></td>
                                <td class="small"><?php echo $mp["tenmypham"]; ?></td>
                                
                                <td class="text-center text-primary small"><?php echo number_format($mp["sotien"])."đ"; ?></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                            <tr>
                              <td colspan="3" class="text-right"><a href="?action=xemgiohang" type="button" class="btn btn-warning">Xem giỏ hàng</a> </td>
                            </tr>
                          </table>

                        <?php 
                        }
                        ?>

                    </div>
                    </li>
              <?php
               }
               else
               {
              ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                            <img class="rounded-circle shadow-lg" src="public/images/<?php if($_SESSION['khachhang']['hinhanh']==null){
                            echo 'user.png'; 
                          }else {
                            echo $_SESSION['khachhang']['hinhanh'];
                          }
                          ?>"  width="25px" height="25px"> <?php if(isset($_SESSION["khachhang"])) echo $_SESSION['khachhang']["hoten"]; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="index.php?action=doimatkhau"><i class="fa fa-key"></i> Đổi mật khẩu</a>
                            <a class="dropdown-item" href="index.php?action=capnhathoso"><i class="fa fa-address-card-o"></i> Cập nhật hồ sơ</a>
                            <a class="dropdown-item" href="index.php?action=lichsumuahang"><i class="fa fa-history"></i> Lịch sử mua hàng</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#fdangxuat" ><i class="fa fa-power-off"></i> Đăng xuất</a>
                        </div>
                     </li>
                
                  
                      <li class="nav-item dropdown active ">
						  
							<a id="badge" class="nav-link dropdown-toggle" href="index.php?action=xemgiohang"><i class="bi bi-cart"></i>
							  <sup><span class="badge badge-pill badge-warning" style="top: 50%; margin-top: -5px; margin-left:-10px;"><?php echo demhangtronggio(); ?></span></sup>
							</a>
                     
						  <div class="dropdown-menu dropdown-menu-right" style="white-space: nowrap;" aria-labelledby="navbarDropdownMenuLink">
						  <?php 
							if(demhangtronggio()==0){
							  echo "
								<div class='text-center'>
								  <img src='public/images/giohangrong.png' width='100px'> 
								  <br><br>
									<h6 class='small'>Chưa có sản phẩm!</h6>
								</div>";
							}
							else
							{
							?>
							  <table class="table table-sm table-borderless">
								<th colspan="3">Sản phẩm mới thêm</th>
							  <?php
							  $giohang=laygiohang();
							  foreach($giohang as $ma => $mp):
								?>
								<tr>
									<td><img class="img-thumnail" width="50" src="public/<?php echo $mp["hinhanh"];?>" alt=""></td>
									<td class="small"><?php echo $mp["tenmypham"]; ?></td>
									
									<td class="text-center text-primary small"><?php echo number_format($mp["sotien"])."đ"; ?></td>
								</tr>
								<?php
								endforeach;
								?>
								<tr>
								  <td colspan="3" class="text-right"><a href="?action=xemgiohang" type="button" class="btn btn-warning">Xem giỏ hàng</a> </td>
								</tr>
							  </table>

							<?php 
							}
							?>

						</div>
                    </li>
              <?php
               }
              ?>
            </ul>
            
        </div>
       </div>
    </nav>
    <!--Bắt đầu đăng xuất-->
<div class="modal fade" id="fdangxuat" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Đăng xuất</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Bạn chắn chắn muốn đăng xuất?</label>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
              <a href="index.php?action=dangxuat" class="btn btn-primary" type="button" >Đồng ý</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>