<?php
class DIACHI{
	// Thêm diac chỉ mới, trả về id của dòng mới thêm
	public function themdiachi($nguoidung_id,$diachi){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO diachi(nguoidung_id,diachi,macdinh) 
			VALUES(:nguoidung_id,:diachi,1)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':nguoidung_id',$nguoidung_id);
			$cmd->bindValue(':diachi',$diachi);
			
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
	// Lấy danh sách
    public function laydiachi(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM diachi";
            $cmd = $dbcon->prepare($sql);
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
