<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/mypham.php");
require("../../model/donhang.php");
require("../../model/donhangct.php");
require("../../model/nguoidung.php");
require("../../model/diachi.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$dh = new DONHANG();
$mp = new MYPHAM();
$ctdh = new DONHANGCT();
$nd = new NGUOIDUNG();
$dc = new DIACHI();

switch($action){
    case "xem":
        $mypham = $mp->laymypham();
        $nguoidung=$nd->laydanhsachnguoidung();
        $diachi = $dc->laydiachi();
        //$loaimypham = $l->laymypham();
        $donhang=$dh->laydonhang();
		include("main.php");
        break;
	case "xemchitiet":
        $donhang_id=$_GET["id"];
        $dhang=$dh->laydonhangtheoid($donhang_id);
        $nguoidung=$dh->laydonhangtheoidnguoidung($dhang["nguoidung_id"]);
        
        $diachi=$dh->laydonhangtheodiachi($dhang["diachi_id"]);
        $tendiachi=$diachi["diachi"];
        
        $ctdonhang=$ctdh->laychitiettheodonhang($donhang_id);
        
        include("ctdonhang.php");
        break;
    case "capnhattrangthai":
        $trangthai=$_POST["opttrangthai"];
        $id=$_POST["id"];
      
        $dh->capnhattrangthai($id,$trangthai);
        //chuyển đến trang ct đơn hàng
        $dhang=$dh->laydonhangtheoid($id);
        $nguoidung=$dh->laydonhangtheoidnguoidung($dhang["nguoidung_id"]);
        
        $diachi=$dh->laydonhangtheodiachi($dhang["diachi_id"]);
        $tendiachi=$diachi["diachi"];
        
        $ctdonhang=$ctdh->laychitiettheodonhang($id);
        include("ctdonhang.php");
        break;
        
    case "huydon":
        $trangthai=$_GET["trangthai"];
        $id=$_GET["id"];
        $dh->capnhattrangthai($id,$trangthai);
        //chuyển đến trang ql đơn hàng
        $mypham = $mp->laymypham();
        $nguoidung=$nd->laydanhsachnguoidung();
        $diachi = $dc->laydiachi();
        $donhang=$dh->laydonhang();
        $message="Đã huỷ đơn hàng thành công!";
        include("main.php");
        break;
    case "timkiem":
        $tukhoa=$_GET["opttrangthai"];
        $data=$dh->timkiem($tukhoa);
        $mypham = $mp->laymypham();
        $nguoidung=$nd->laydanhsachnguoidung();
        $diachi = $dc->laydiachi();
        //$loaimypham = $l->laymypham();
        
        include("search.php");
        break;
    default:
        break;
}

?>
