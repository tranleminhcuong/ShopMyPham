<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/loaimypham.php");
require("../../model/mypham.php");
require("../../model/thuonghieu.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$l = new LOAIMYPHAM();
$mp = new MYPHAM();
$t = new THUONGHIEU();

switch($action){
    case "xem":
        $mypham = $mp->laymypham();
        $thuonghieu = $t->laythuonghieu();
        $loaimypham = $l->layloaimypham();
		include("main.php");
        break;
	case "them":
		$loaimypham = $l->layloaimypham();
        $thuonghieu = $t->laythuonghieu();
		include("themmypham.php");
        break;
	case "xulythem":	

        $tenmypham = $_POST["tenmypham"];
        $mota = $_POST["mota"];
		$giagoc = $_POST["giagoc"];
		$giaban = $_POST["giaban"];
		$soluongton = $_POST["soluongton"];
		$loaimypham_id = $_POST["optloaimypham"];
        $thuonghieu_id = $_POST["optthuonghieu"];
        if(($mp->kiemtratrung($tenmypham))==TRUE){
            $error_message="Tên mỹ phẩm bị trùng. Vui lòng nhập tên khác!";
            $loaimypham = $l->layloaimypham();
            $thuonghieu = $t->laythuonghieu();
            include("themmypham.php");
            break;
        }
        else{
		
		// xử lý file upload
		$hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../public/" . $hinhanh; // nơi lưu file upload
		move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
		// xử lý thêm		
		
        
        
		$mp->themmypham($tenmypham,$mota,$giagoc,$giaban,$soluongton,$thuonghieu_id,$loaimypham_id,$hinhanh);
		$loaimypham = $l->layloaimypham();
        $mypham = $mp->laymypham();
        $message="Thêm mỹ phẩm thành công!";
		include("main.php");
        break;
        }
	case "xoa":
		if(isset($_GET["id"]))
			$mp->xoamypham($_GET["id"]);
        $loaimypham = $l->layloaimypham();
		$mypham = $mp->laymypham();
        $message="Xoá mỹ phẩm thành công!";
		include("main.php");
		break;	
    case "sua":
        if(isset($_GET["id"])){ 
            $m = $mp->laymyphamtheoid($_GET["id"]);
            $loaimypham = $l->layloaimypham(); 
            $thuonghieu = $t->laythuonghieu(); 
            include("suamypham.php");
        }
        else{
            $loaimypham = $l->layloaimypham();
            $mypham = $mp->laymypham();        
            include("main.php");            
        }
        break;
    case "xulysua":
        $id = $_POST["id"];
        $tenmypham = $_POST["tenmypham"];
        $mota = $_POST["mota"];
        $giagoc = $_POST["giagoc"];
        $giaban = $_POST["giaban"];
        $soluongton = $_POST["soluongton"];
        $loaimypham_id = $_POST["optloaimypham"];
        $thuonghieu_id = $_POST["optthuonghieu"];
        $hinhanh = $_POST["hinhcu"];
        $luotxem = $_POST["luotxem"];
        $luotmua = $_POST["luotmua"];
        
            // upload file mới (nếu có)
            if($_FILES["filehinhanh"]["name"]!=""){
                // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
                $hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]);// đường dẫn lưu csdl
                $duongdan = "../../public/" . $hinhanh; // đường dẫn lưu upload file        
                move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
            }

            // sửa mặt hàng
            $mp->suamypham($id, $tenmypham,$mota,$giagoc,$giaban,$soluongton,$thuonghieu_id,$loaimypham_id,$hinhanh,$luotxem,$luotmua);         

            // hiển thị ds mặt hàng
            $loaimypham = $l->layloaimypham();
            $mypham = $mp->laymypham();
            $message="Cập nhật mỹ phẩm thành công!";    
            include("main.php");
            break;
        
        
    case "timkiem":
        $tukhoa=$_GET["otploaimypham"];
        $data=$mp->timkiem($tukhoa);
        $mypham = $mp->laymypham();
        $thuonghieu = $t->laythuonghieu();
        $loaimypham = $l->layloaimypham();
        include("search.php");
        break;
    default:
        break;
}

?>
