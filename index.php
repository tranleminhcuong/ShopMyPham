<?php 
require("model/database.php");
require("model/mypham.php");
require("model/loaimypham.php");
require("model/thuonghieu.php");
require("model/giohang.php");
require("model/khachhang.php");
require("model/donhangct.php");
require("model/donhang.php");
require("model/diachi.php");
require("model/nguoidung.php");
require("model/goimail.php");

$loaimp = new LOAIMYPHAM();
$th = new THUONGHIEU();
$mp = new MYPHAM();
$kh=new KHACHHANG();
$nd=new NGUOIDUNG();
$dh=new DONHANG();
$ct=new DONHANGCT();
$dc=new DIACHI();

$loaimypham = $loaimp->layloaimypham();
$thuonghieu = $th->laythuonghieu();
$mypham = $mp->laymypham();
$myphamnoibat = $mp->laymyphamnoibat();
$myphambanchay = $mp->laymyphambanchaynhat();
$giathap = $mp->laymyphamgiathap();
$giacao = $mp->laymyphamgiacao();
if(isset($_REQUEST["action"])){
  $action = $_REQUEST["action"];
}
else{
  $action="macdinh"; 
}

switch($action){
    case "macdinh":
        include("main.php");
        break;
    case "dangnhap":
        if(isset($_GET["email"])){
            $email=$_GET["email"];
            include("loginform.php");
            break;
        }
        else
        {
            include("loginform.php");
            break;
        }
       
        
        
    case "xulydangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $khachhang = $kh->kiemtrakhachhanghople($email,$matkhau);
        $nguoidung = $nd->kiemtranguoidunghople($email,$matkhau);
        if($khachhang){
            if($khachhang['trangthai'] == 0)//trangthai: 1:kích hoạt; 0:khoá
            {
                $error_message = "Tài khoản người dùng đã bị khóa!";
                include("loginform.php");
            }
            else
            {
                $_SESSION["khachhang"] = $kh->laythongtinnguoidung($email);
               // $success_message="Đăng nhập thành công!";
                include("main.php");
            }
        }
        elseif($nguoidung)
        {
            if($nguoidung['trangthai'] == 0)//trangthai: 1:kích hoạt; 0:khoá
            {
                $error_message = "Tài khoản người dùng đã bị khóa!";
                include("loginform.php");
            }
            else
            {
                $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
                // $success_message="Đăng nhập thành công!";
                header("Location: admin/index.php");
            }
            
        }
        else
        {
            $error_message = "Tài khoản hoặc mật khẩu không chính xác!";
            include("loginform.php");
        }
        break;
    case "dangky":
        include("registerform.php");
        break;
    case "xulydangky":
        $email=$_POST['txtemail'];
        $sodienthoai=$_POST['txtdienthoai'];
        $makhau=$_POST['txtmatkhau'];
        $hoten=$_POST['txthoten'];
        $nd->nguoidungdangkymoi($email,$sodienthoai,$makhau,$hoten);
        $success_message = "Đăng ký thành công!";
        include ("loginform.php");
        break;
    case "xemtatcasanpham": 
        $tongmh = $mp->demtongsomypham(); //tổng số mặt hàng
        $soluong = 18;                       //mỗi lần/trang hiển thị 18 mặt hàng
        $tongsotrang = ceil($tongmh/$soluong);
        
        if(!isset($_GET["trang"])){
            $tranghh=1;
        }
        else
        {
            $tranghh = $_GET["trang"];
        }
        if($tranghh>$tongsotrang)
            $tranghh=$tongsotrang;
        else if($tranghh<1)
            $tranghh=1;
        $batdau = ($tranghh-1) * $soluong;
        $mypham = $mp->laymyphamtrongkhoang($batdau,$soluong);
        include("tatcasanpham.php"); 
        break;
    case "xemthuonghieu": 
        if(isset($_REQUEST["math"])){
            $math = $_REQUEST["math"];
            $thieu = $th->laythuonghieutheoid($math);
            $tenthuonghieu =  $thieu["tenthuonghieu"];   
            $mypham = $mp->laymyphamtheothuonghieu($math);
            include("group_thuonghieu.php");
        }
        else{
            include("main.php");
        }
        break;
    case "xemloaimypham": 
        if(isset($_REQUEST["maloai"])){
            $maloai = $_REQUEST["maloai"];
            $loai = $loaimp->layloaimyphamtheoid($maloai);
            $tenloai =  $loai["tenloai"];   
            $mypham = $mp->laymyphamtheoloaimypham($maloai);
            include("group_loaimp.php");
        }
        else{
            include("main.php");
        }
        break;
    case "xemchitiet": 
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            // tăng lượt xem lên 1
            $mp->tangluotxem($id);
            // lấy thông tin chi tiết mỹ phẩm
            $mpct = $mp->laymyphamtheoid($id);
            // lấy các mỹ phẩm cùng loại
            $loaimypham_id = $mpct["loaimypham_id"];
            //lấy các mỹ phẩm cùng thương hiệu
            $thuonghieu_id = $mpct["thuonghieu_id"];
            //lấy tên loại
            $loai = $loaimp->layloaimyphamtheoid($loaimypham_id);
            $tenloai =  $loai["tenloai"]; 
            //lấy tên thương hiệu
            $thieu = $th->laythuonghieutheoid($thuonghieu_id);
            $tenthuonghieu =  $thieu["tenthuonghieu"]; 
            //lấy mỹ phẩm cùng loại
            $mypham = $mp->laymyphamtheoloaimypham($loaimypham_id);
            include("detail.php");
        }
        break;
    case "themvaogio":
       
        if(isset($_REQUEST["id"])&& isset($_REQUEST["soluong"])){
            $id=$_REQUEST["id"];
            $soluong=$_REQUEST["soluong"];
        
            themhangvaogio($id,$soluong);
            //chuyển đến trang xem giỏ hàng
            $giohang=laygiohang();
            include("cart.php");
        }
         
        break;
    case "xemgiohang":
        $giohang=laygiohang();
        include("cart.php");
        break;
    case "capnhatgiohang":
        $mh=$_REQUEST["mp"];
        foreach($mh as $mypham => $soluong)
        {
            if($soluong>0)
                capnhatsoluong($mypham, $soluong);
            else
                xoamotmathang($mypham);
        }
        $giohang=laygiohang();
        include("cart.php");
        break;
    case "xoamotmathang":
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            xoamotmathang($id);
        }
        $giohang=laygiohang();
        include("cart.php");
        break;
    case "xoagiohang":
        xoagiohang();
        $giohang=laygiohang();
        include("cart.php");
        break;
    case "datmua":
            $giohang=laygiohang();
            include("checkout.php");
            break;

    case "luudonhang":
        $hoten=$_POST["hoten"];
        $email=$_POST["email"];
        $dienthoai=$_POST["dienthoai"];
        $diachi=$_POST["diachi"];
        $ghichu=$_POST["ghichu"];
        if(isset($_SESSION["khachhang"]))
        {
            $khachhang_id=$_SESSION["khachhang"]["id"];
            //lưu địa chỉ
           
            $diachi_id=$dc->themdiachi($khachhang_id,$diachi);

            //lưu đơn hàng
           
            $tongtien=tinhtiengiohang();
            $donhang_id=$dh->themdonhang($khachhang_id,$diachi_id,$tongtien,$ghichu);

            
            //lưu chi tiết đơn hàng
            
            $giohang=laygiohang();

            foreach($giohang as $mahang=>$mh){
                $dongia=$mh["giaban"];
                $soluong=$mh["soluong"];
                $thanhtien=$mh["sotien"];
                //tăng lượt mua hàng
                $mp->tangluotmua($mahang);
                //cập nhật số lượng tồn
                $mp->capnhatsoluong($mahang,$soluong);
                $ct->themchitietdonhang($donhang_id,$mahang,$dongia,$soluong,$thanhtien);

            }
            //xoá giỏ hàng
            xoagiohang();

            //đến trang cảm ơn
            include("thanks.php");
            break;
        }
        else
        {
            if($kh->kiemtraemail($email)==FALSE)
            {
                //lưu khách hàng
                
                $khachhang_id=$kh->themkhachhang($email,$dienthoai,$hoten);

                //lưu địa chỉ
                
                $diachi_id=$dc->themdiachi($khachhang_id,$diachi);

                //lưu đơn hàng
               
                $tongtien=tinhtiengiohang();
                $donhang_id=$dh->themdonhang($khachhang_id,$diachi_id,$tongtien,$ghichu);

                //lưu chi tiết đơn hàng
               
                $giohang=laygiohang();
               
                foreach($giohang as $mahang=>$mh){
                    $dongia=$mh["giaban"];
                    $soluong=$mh["soluong"];
                    $thanhtien=$mh["sotien"];
                     //tăng lượt mua hàng
                    $mp->tangluotmua($mahang);
                    //cập nhật số lượng tồn
                    $mp->capnhatsoluong($mahang,$soluong);
                    $ct->themchitietdonhang($donhang_id,$mahang,$dongia,$soluong,$thanhtien);

                }
                //xoá giỏ hàng
                xoagiohang();

                //đến trang cảm ơn
                include("thanks.php");
                break;

            }
            else{
                $message="Bạn đã sử dụng email này cho một tài khoản! Vui lòng thay đổi email hoặc ";
                $giohang=laygiohang();
                include("checkout.php");
                break;
            }
        }

    case "doimatkhau":
        include("doimatkhau.php");
        break;
    case "xulydoimatkhau":
        $matkhaumoi=$_POST["matkhau"];
        $kh->doimatkhau($_SESSION["khachhang"]["id"],$matkhaumoi);
        $message="Đã đổi mật khẩu thành công!";
        include("doimatkhau.php");
        break;
    case "dangxuat":
        unset($_SESSION['khachhang']);
        include("main.php");
        break;
    case "capnhathoso":
        include("capnhathoso.php");
        break;
    case "xulycapnhathoso":
        $id=$_SESSION["khachhang"]["id"];
        $email=$_POST["email"];
        $sodienthoai=$_POST["dienthoai"];
        $hoten=$_POST["hoten"];
        $hinhanh=$_POST["hinhcu"];
        // xử lý file upload
         // upload file mới (nếu có)
         if($_FILES["fhinh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "" . basename($_FILES["fhinh"]["name"]);// đường dẫn lưu csdl
            $duongdan = "public/images/" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
        }      
        
        $kh->capnhathoso($id,$email,$sodienthoai,$hoten,$hinhanh);
        $_SESSION["khachhang"]= $nd->laythongtinnguoidung($_POST["email"]);
        $message="Cập nhật hồ sơ thành công!";
        include("capnhathoso.php");
        break;  
    case "lichsumuahang":
        $khachhang_id=$_SESSION["khachhang"]["id"];
        $donhang=$dh->laydonhangtheonguoidung($khachhang_id);
        include("lichsumuahang.php");
        break; 
    case "xemchitietdonhang":
        $donhang_id=$_GET["id"];
        
        $ctdh=$dh->laydonhangtheoid($donhang_id);
        $diachi=$dh->laydonhangtheodiachi($ctdh["diachi_id"]);
        $tendiachi=$diachi["diachi"];
        

        $ctdonhang=$ct->laychitiettheodonhang($donhang_id);
        
        include("chitietdonhang.php");
        break;
    case "timkiem":
        $tukhoa=$_GET["tukhoa"];
        $data=$mp->timkiemmypham($tukhoa);
        include("search.php");
        break;
    case "gioithieu":
        include("gioithieu.php");
        break;
    case "quenmatkhau":
        include("quenmatkhau.php");
        break;
    case "xulygui":
        
            $email= $_POST["email"];
            // kiểm tra người dùng hợp lệ
            if($kh->kiemtratontaiemail($email)==0)
            {
                $error_message="Email không đúng";
                include("quenmatkhau.php");
            }
            else
            {
                $matkhaumoi=substr( (rand(0,999999)) , 0, 8);
                $kh->capnhatmatkhaumoi($email,$matkhaumoi);
                $goi=new GOIMAIL();
                $kq=$goi->guimatkhaumoi($email,$matkhaumoi);
                if($kq==true)
                {
                    $message="Thông tin đổi mật khẩu đã được gửi tới email của bạn.Vui lòng kiểm tra hộp thư!";
                    include("quenmatkhau.php");
                }
            }
            

        
        break;
    default:
        break;


    }

?>
    
<!-- ================================== -->