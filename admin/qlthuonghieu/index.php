<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");
require("../../model/database.php");
require("../../model/thuonghieu.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$th = new THUONGHIEU();
$idsua = 0;

switch($action){
    case "xem":
        $thuonghieu = $th->laythuonghieu();       
        include("main.php");
        break;
    case "themthuonghieu":
        include("themthuonghieu.php");
        break;
    case "xulythem":
        $tenthuonghieu=$_POST["tenthuonghieu"];
        if(($th->kiemtratrung($tenthuonghieu))==TRUE){
            $message="Tên thương hiệu bị trùng!";
            include("themthuonghieu.php");
            break;
        }
        else
        {
        // xử lý file upload
        
        $hinhanh = "images/" . basename($_FILES["fhinh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../public/" . $hinhanh; // nơi lưu file upload
        move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);

        
       

        $th->themthuonghieu($tenthuonghieu,$hinhanh);    
		$thuonghieu = $th->laythuonghieu(); 
        $message="Thêm thương hiệu thành công!";
        include("main.php");
        break;
        }
	case "xoathuonghieu":
        $th->xoathuonghieu($_GET["id"]); 
        $thuonghieu = $th->laythuonghieu(); 
        $message="Xoá thương hiệu thành công!";
        include("main.php");
        break;
    case "suathuonghieu":
        if(isset($_GET["id"])){ 
            $t = $th->laythuonghieutheoid($_GET["id"]); 
            include("suathuonghieu.php");
        }
        else{
            $thuonghieu = $th->laythuonghieu();      
            include("main.php");            
        }
        break;
	case "xulysua":
		$id = $_POST["id"];
        $tenthuonghieu = $_POST["tenthuonghieu"];
        $hinhanh = $_POST["hinhcu"];
        
            // xử lý file upload
            // upload file mới (nếu có)
            if($_FILES["fhinh"]["name"]!=""){
                // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
                $hinhanh = "images/" . basename($_FILES["fhinh"]["name"]);// đường dẫn lưu csdl
                $duongdan = "../../public/" . $hinhanh; // đường dẫn lưu upload file        
                move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
            }      
            
            $th->suathuonghieu($id,$tenthuonghieu,$hinhanh);
            $thuonghieu = $th->laythuonghieu();       
            $message="Cập nhật thương hiệu thành công!";  
            include("main.php");
        
        
        break;  
    default:
        break;
}
?>
