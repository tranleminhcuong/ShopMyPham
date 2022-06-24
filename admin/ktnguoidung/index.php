<?php 
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/donhang.php");

$islogin=isset($_SESSION['nguoidung']);
// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
elseif($islogin==FALSE){
    $action="dangnhap";
}
else{
    $action="xem";
}

$nd = new NGUOIDUNG();
$dh=new DONHANG();
$dem=$dh->demsodonhangdangxuly();
$demdontra=$dh->demsodonhangkhachtra();
$tongtienbanhang=$dh->tongtienbanhang();

switch($action){
    case "dangnhap":
        include("loginform.php");
		 break;
    case "xem":
        
        include("main.php");
        break;
    case "xulydangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $nguoidung = $nd->kiemtranguoidunghople($email,$matkhau);
        if($nguoidung){
            if($nguoidung['trangthai'] == 0)//trangthai: 1:kích hoạt; 0:khoá
            {
                $error_message = "Tài khoản người dùng đã bị khóa!";
                include("loginform.php");
            }
            else
            {
                $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
                include("main.php");
                
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
	case "dangxuat":
        unset($_SESSION['nguoidung']);
        include("loginform.php");
        break;
	case "capnhat":
        $id=$_POST['txtid'];
        $email=$_POST['txtemail'];
        $sodienthoai=$_POST['txtdienthoai'];
        $hoten=$_POST['txthoten'];
        $hinhanh=$_POST['txthinhanh'];
        //upload file 
        if($_FILES["fhinh"]["name"]!="")
        {
            $hinhanh=basename($_FILES["fhinh"]["name"]);
            move_uploaded_file($_FILES["fhinh"]["tmp_name"],"../public/images/".$hinhanh);
        }
		$nd->capnhatnguoidung($id,$email,$sodienthoai,$hoten,$hinhanh);
        $_SESSION["nguoidung"]= $nd->laythongtinnguoidung($_POST["txtemail"]);
        include("main.php");
        break;
    case "doimatkhau":
        $email=$_POST['txtemail'];
        $matkhaumoi=$_POST['txtmatkhaumoi'];
        $nd->doimatkhau($email,$matkhaumoi);
        include("main.php");
        break;
   
    default:
        break;   
}
?>
