
      <div class="card" style="width: 15rem;">
            <div class="card-header" style="background-color:rgb(26,148,255);color: #FFFFFF;">
            <i class="fa fa-cogs" aria-hidden="true"></i> BẢNG ĐIỀU KHIỂN 

            </div>
            <ul class="list-group list-group-flush">
               
                <li class="list-group-item"><a href="?action=doimatkhau"><i class="fa fa-key"></i> Đổi mật khẩu</a></li>
                <li class="list-group-item"><a href="?action=capnhathoso"><i class="fa fa-address-card-o"></i> Cập nhật hồ sơ</a></li>
                <li class="list-group-item" ><a href="?action=lichsumuahang"><i class="fa fa-history"></i> Lịch sử mua hàng</a></li>
                <li class="list-group-item"><a href="#" data-toggle="modal" data-target="#fdangxuat"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
         
            </ul>
      </div>

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
              <a href="?action=dangxuat" class="btn btn-primary" type="button" >Đồng ý</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
      <br>