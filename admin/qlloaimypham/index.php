<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");
require("../../model/database.php");
require("../../model/loaimypham.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$l = new LOAIMYPHAM();
$idsua = 0;

switch($action){
    case "xem":
        $loaimypham = $l->layloaimypham();       
        include("main.php");
        break;
    case "themloaimypham":
        $tenloai=$_POST["tenloai"];
        if(($l->kiemtratrung($tenloai))==TRUE){
            $error_message="Tên loại mỹ phẩm bị trùng!";
            $loaimypham = $l->layloaimypham();
            include("main.php");
            break;
        }
        else
        {
            $l->themloaimypham($tenloai);    
            $loaimypham = $l->layloaimypham(); 
            $message="Thêm loại mỹ phẩm thành công!";   
            include("main.php");
            break;
        }
       
	case "xoaloaimypham":
        $l->xoaloaimypham($_GET["id"]);    
		$loaimypham = $l->layloaimypham(); 
        $message="Xoá loại mỹ phẩm thành công!";   
        include("main.php");
        break;
	case "sualoaimypham":
		$idsua = $_GET["id"];
        $loaimypham = $l->layloaimypham();       
        include("main.php");
        break;
	case "capnhat":
		$l->sualoaimypham($_POST["id"], $_POST["tenloai"]);
        $loaimypham = $l->layloaimypham(); 
        $message="Cập nhật loại mỹ phẩm thành công!";          
        include("main.php");
        break;
    default:
        break;
}
?>
