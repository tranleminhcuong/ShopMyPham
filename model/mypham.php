<?php
class MYPHAM{
    // khai báo các thuộc tính - SV tự bổ sung
    
    public function demtongsomypham(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT COUNT(*) FROM mypham";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchColumn();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    //lấy danh sách mặt hàng trong khoảng chỉ định
    public function laymyphamtrongkhoang($batdau, $soluong){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT m.*, l.tenloai 
            FROM mypham m, loaimypham l 
            WHERE l.id=m.loaimypham_id 
            ORDER BY id DESC 
            LIMIT $batdau, $soluong";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy danh sách
    public function laymypham(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mypham";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            rsort($result); // sắp xếp giảm thay cho order by desc
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	    // Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laymyphamtheoloaimypham($loaimypham_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mypham WHERE loaimypham_id=:loaimypham_id" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":loaimypham_id",$loaimypham_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
        // Lấy danh sách mỹ phẩm thuộc 1 thương hiệu
        public function laymyphamtheothuonghieu($thuonghieu_id){
            $dbcon = DATABASE::connect();
            try{
                $sql = "SELECT * FROM mypham WHERE thuonghieu_id=:math" ;
                $cmd = $dbcon->prepare($sql);
                $cmd->bindValue(":math",$thuonghieu_id);
                $cmd->execute();
                $result = $cmd->fetchAll();
                return $result;
            }
            catch(PDOException $e){
                $error_message = $e->getMessage();
                echo "<p>Lỗi truy vấn: $error_message</p>";
                exit();
            }
        }
    // Lấy mặt hàng theo id
    public function laymyphamtheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mypham WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật lượt xem
    public function tangluotxem($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mypham SET luotxem=luotxem+1 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
     // Cập nhật lượt mua
     public function tangluotmua($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mypham SET luotmua=luotmua+1 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật số lượng tồn
    public function capnhatsoluong($id, $soluong){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mypham SET soluongton= soluongton - :soluong WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->bindValue(":soluong", $soluong);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    
    // huỷ Cập nhật số lượng tồn
    public function huydoncapnhatsoluong($id, $soluong){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mypham SET soluongton= soluongton + :soluong WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->bindValue(":soluong", $soluong);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	
	// Thêm mới
    public function themmypham($tenmypham,$mota,$giagoc,$giaban,$soluongton,$thuonghieu_id,$loaimypham_id,$hinhanh){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO mypham(tenmypham,mota,giagoc,giaban,soluongton,thuonghieu_id,loaimypham_id,hinhanh) 
				VALUES(:tenmypham,:mota,:giagoc,:giaban,:soluongton,:thuonghieu_id,:loaimypham_id,:hinhanh)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmypham", $tenmypham);
			$cmd->bindValue(":mota", $mota);
			$cmd->bindValue(":giagoc", $giagoc);
			$cmd->bindValue(":giaban", $giaban);
			$cmd->bindValue(":soluongton", $soluongton);
            $cmd->bindValue(":thuonghieu_id", $thuonghieu_id);
			$cmd->bindValue(":loaimypham_id", $loaimypham_id);
			$cmd->bindValue(":hinhanh", $hinhanh);
            $result = $cmd->execute();   
            return $result;

        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoamypham($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM mypham WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suamypham($id, $tenmypham,$mota,$giagoc,$giaban,$soluongton,$thuonghieu_id,$loaimypham_id,$hinhanh,$luotxem,$luotmua){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mypham SET   tenmypham=:tenmypham,
										mota=:mota,
										giagoc=:giagoc,
										giaban=:giaban,
										soluongton=:soluongton,
                                        thuonghieu_id=:thuonghieu_id,
										loaimypham_id=:loaimypham_id,
										hinhanh=:hinhanh,
										luotxem=:luotxem,
										luotmua=:luotmua
										WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->bindValue(":tenmypham", $tenmypham);
			$cmd->bindValue(":mota", $mota);
			$cmd->bindValue(":giagoc", $giagoc);
			$cmd->bindValue(":giaban", $giaban);
			$cmd->bindValue(":soluongton", $soluongton);
            $cmd->bindValue(":thuonghieu_id", $thuonghieu_id);
			$cmd->bindValue(":loaimypham_id", $loaimypham_id);
			$cmd->bindValue(":hinhanh", $hinhanh);
			$cmd->bindValue(":luotxem", $luotxem);
			$cmd->bindValue(":luotmua", $luotmua);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy mặt hàng nổi bật top 6 có lượt xem cao nhất
    public function laymyphamnoibat(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT m.*, d.tenloai FROM mypham m, loaimypham d WHERE d.id=m.loaimypham_id ORDER BY luotxem DESC LIMIT 0, 12";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy mặt hàng nổi bật top 6 có lượt xem cao nhất
    public function laymyphambanchaynhat(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT m.*, d.tenloai FROM mypham m, loaimypham d WHERE d.id=m.loaimypham_id ORDER BY luotmua DESC LIMIT 0, 12";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
     // Lấy mặt hàng top 12 giá thấp nhất
     public function laymyphamgiathap(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT m.*, d.tenloai FROM mypham m, loaimypham d WHERE d.id=m.loaimypham_id ORDER BY giaban ASC LIMIT 0, 12";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy mặt hàng top 12 giá thấp cao
    public function laymyphamgiacao(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT m.*, d.tenloai FROM mypham m, loaimypham d WHERE d.id=m.loaimypham_id ORDER BY giaban DESC LIMIT 0, 12";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy danh sách
    public function timkiem($loaimypham_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mypham where loaimypham_id=:loaimypham_id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":loaimypham_id", $loaimypham_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            rsort($result); // sắp xếp giảm thay cho order by desc
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy danh sách
    public function timkiemmypham($tukhoa){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mypham where tenmypham like '%{$tukhoa}%'";
            $cmd = $dbcon->prepare($sql);
           // $cmd->bindValue(":tukhoa", $tukhoa);
            $cmd->execute();
            $result = $cmd->fetchAll();
            rsort($result); // sắp xếp giảm thay cho order by desc
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function kiemtratrung($tenmypham){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mypham WHERE tenmypham=:tenmypham";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmypham",$tenmypham);
           
            $cmd->execute();
            
            return $cmd->fetch();
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
  
}
?>
