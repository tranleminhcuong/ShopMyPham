<?php
class DONHANGCT{
	// Thêm dhct mới, trả về id của dòng mới thêm
	public function themchitietdonhang($donhang_id,$mypham_id,$dongia,$soluong,$thanhtien){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO chitietdonhang(donhang_id,mypham_id,dongia,soluong,thanhtien) 
			VALUES(:donhang_id,:mypham_id,:dongia,:soluong,:thanhtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':donhang_id',$donhang_id);
			$cmd->bindValue(':mypham_id',$mypham_id);
			$cmd->bindValue(':dongia',$dongia);
			$cmd->bindValue(':soluong',$soluong);
			$cmd->bindValue(':thanhtien',$thanhtien);
			//có thể return execute() true/flase
			//hoặc
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

	   // Lấy danh sách chi tiết đơn hàng
	   public function laychitietdonhang($donhang_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM chitietdonhang WHERE donhang_id=:donhang_id" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":donhang_id",$donhang_id);
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
	// Lấy danh sách chi tiết theo mỹ phẩm
	public function laychitiettheodonhang($donhang_id){
		$dbcon = DATABASE::connect();
		try{
			$sql = "SELECT ct.*,mp.hinhanh, mp.tenmypham FROM chitietdonhang ct, mypham mp WHERE ct.donhang_id=:donhang_id and ct.mypham_id=mp.id" ;
			$cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":donhang_id",$donhang_id);
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

}
?>
