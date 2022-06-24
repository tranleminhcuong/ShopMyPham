<?php
class KHACHHANG{
	// kiểm tra người dùng khách hàng hợp lệ
    public function kiemtrakhachhanghople($email,$matkhau){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND loai=3";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email",$email);
            $cmd->bindValue(":matkhau",md5($matkhau));
            $cmd->execute();
            
            return $cmd->fetch();
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function kiemtratontaiemail($email){
        $dbcon = DATABASE::connect();
        $sql = "SELECT * FROM nguoidung WHERE email=:email";
        $cmd = $dbcon->prepare($sql);
        $cmd->bindValue(":email",$email);

        $cmd->execute();
        $count=$cmd->rowCount();
        return $count;
    }
	public function laythongtinnguoidung($email){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT *from nguoidung WHERE email=:email";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->execute();
            $result=$cmd->fetch();   
            $cmd->closeCursor();         
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	// Thêm khách hàng mới, trả về khóa của dòng mới thêm
	public function themkhachhang($email,$sodt,$hoten){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,loai,trangthai) 
			VALUES(:email,:matkhau,:sodt,:hoten,3,1)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':matkhau',md5($sodt));
			$cmd->bindValue(':sodt',$sodt);
			$cmd->bindValue(':hoten',$hoten);
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
	public function kiemtraemail($email){
		$dbcon = DATABASE::connect();
        try{
            $sql = "SELECT *from nguoidung WHERE email=:email";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
			$cmd->execute();
			$valid = ($cmd->rowCount () == 1);
			$cmd->closeCursor ();
			return $valid;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
	}
	// doi mat khau 
	public function doimatkhau($id,$matkhaumoi){
		$dbcon = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung SET matkhau=:matkhaumoi
				WHERE id=:id";
			$cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":id",$id);
			$cmd->bindValue(":matkhaumoi",md5($matkhaumoi));
			$result=$cmd->execute();
			return $result;
		}
		catch(PDOException $e){
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
    // doi mat khau 
	public function capnhatmatkhaumoi($email,$matkhaumoi){
		$dbcon = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung SET matkhau=:matkhaumoi
				WHERE email=:email";
			$cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":email",$email);
			$cmd->bindValue(":matkhaumoi",md5($matkhaumoi));
			$result=$cmd->execute();
			return $result;
		}
		catch(PDOException $e){
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	// cap nhat ho so 
    public function capnhathoso($id,$email,$sodienthoai,$hoten,$hinhanh){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung 
                    SET email=:email,sodienthoai=:sodienthoai,hoten=:hoten,hinhanh=:hinhanh
                    WHERE id=:id ";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id",$id);
            $cmd->bindValue(":email",$email);
            $cmd->bindValue(":sodienthoai",$sodienthoai);
            $cmd->bindValue(":hoten",$hoten);
            $cmd->bindValue(":hinhanh",$hinhanh);
            $result= $cmd->execute();//cập nhật đc hay ko
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
