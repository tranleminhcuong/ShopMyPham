<?php
class DONHANG{
	// Thêm diac chỉ mới, trả về id của dòng mới thêm
	public function themdonhang($nguoidung_id,$diachi_id,$tongtien,$ghichu){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO donhang(nguoidung_id,diachi_id,tongtien,ghichu) 
			VALUES(:nguoidung_id,:diachi_id,:tongtien,:ghichu)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':nguoidung_id',$nguoidung_id);
			$cmd->bindValue(':diachi_id',$diachi_id);
			$cmd->bindValue(':tongtien',$tongtien);
            $cmd->bindValue(':ghichu',$ghichu);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	public function laydonhangtheonguoidung($nguoidung_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT *from donhang WHERE nguoidung_id=:nguoidung_id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nguoidung_id", $nguoidung_id);
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
	 // Lấy đon hàng theo id
	 public function laydonhangtheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang WHERE id=:id";
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
	// Lấy đon hàng theo địa chỉ
	public function laydonhangtheodiachi($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM diachi WHERE id=:id";
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
    // Lấy đon hàng theo địa chỉ
	public function laydonhangtheoidnguoidung($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung WHERE id=:id";
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
	// Lấy danh sách
    public function laydonhang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang";
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
    // Cập nhật 
    public function capnhattrangthai($id, $trangthai){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE donhang SET   trangthai=:trangthai
									    WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->bindValue(":trangthai", $trangthai);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function demsodonhangdangxuly(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT COUNT(*) FROM donhang WHERE trangthai=0";
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
    public function demsodonhangkhachtra(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT COUNT(*) FROM donhang WHERE trangthai=4";
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
    public function tongtienbanhang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT SUM(tongtien) AS tienbanhang FROM donhang WHERE trangthai=3";
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
    // Lấy danh sách
    public function timkiem($trangthai){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang where trangthai=:trangthai";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":trangthai", $trangthai);
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
}
?>
