<?php
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh";
}
$nd = new NGUOIDUNG();
$idsua = 0;
switch($action){
    case "macdinh":
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
    case "khoa":
        $id=$_GET['id'];
        $trangthai=$_GET['trangthai'];
        $nd->capnhattrangthai($id,$trangthai);
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
    case "themnguoidung":
        include("themnguoidung.php");
        break;
    case "xulythem":    
        
        // xử lý thêm       
        $email = $_POST["email"];
        $sodienthoai = $_POST["sodienthoai"];
        $matkhau = $_POST["matkhau"];
        $hoten = $_POST["hoten"];
        if(($nd->kiemtratrungemail($email))==TRUE){
            $error_message="Email bị trùng. Vui lòng nhập email khác!"; 
            include("themnguoidung.php");
            break;

        }
        else{
            $nd->themnguoidung($email,$sodienthoai,$matkhau,$hoten);
            $nguoidung = $nd->laydanhsachnguoidung();
            $message="Thêm người dùng thành công!";
            include("main.php");
            break;
        }
        
          
    case "xoanguoidung":
        $nd->xoanguoidung($_GET["id"]);    
		$nguoidung = $nd->laydanhsachnguoidung(); 
        $message="Xoá người dùng thành công!";
        include("main.php");
        break;
    case "suanguoidung":
        if(isset($_GET["id"])){ 
            $nguoidung=$nd->laynguoidungtheoid($_GET["id"]);
            include("suanguoidung.php");
        }
        else{
            $nguoidung = $nd->laydanhsachnguoidung();        
            include("main.php");            
        }
        break;
    case "xulysua":    
        $id = $_POST["id"];
        $loai = $_POST["optloai"];
       
        $nd->suanguoidung($id,$loai);
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
    case "timkiem":
        $tukhoa=$_GET["optloai"];
        $data=$nd->timkiem($tukhoa);
       
        include("search.php");
    default:
        break;
}
?>
