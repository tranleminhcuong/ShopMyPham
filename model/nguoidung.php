<?php
class NGUOIDUNG{
    
    // kiểm tra người dùng hợp lệ
    public function kiemtranguoidunghople($email,$matkhau){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND (loai=1 OR loai=2)";
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
    public function laynguoidungtheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT *from nguoidung WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
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
    //cap nhat trang thai

    public function capnhattrangthai($id,$trangthai){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung 
                    SET trangthai=:trangthai
                    WHERE id=:id ";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id",$id);
            $cmd->bindValue(":trangthai",$trangthai);
            return $cmd->execute();
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // them nguoi dung 
    public function themnguoidung($email,$sodienthoai,$matkhau,$hoten){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO nguoidung(email,sodienthoai,matkhau,hoten,loai)
                    VALUES(:email,:sodienthoai,:matkhau,:hoten,2)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email",$email);
            $cmd->bindValue(":sodienthoai",$sodienthoai);
            $cmd->bindValue(":matkhau",md5($matkhau));
            $cmd->bindValue(":hoten",$hoten);

            $result= $cmd->execute();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function kiemtratrungemail($email){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung WHERE email=:email";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email",$email);
           
            $cmd->execute();
            
            return $cmd->fetch();
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // nguoi dung dang ky moi
    public function nguoidungdangkymoi($email,$sodienthoai,$matkhau,$hoten){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO nguoidung(email,sodienthoai,matkhau,hoten,loai)
                    VALUES(:email,:sodienthoai,:matkhau,:hoten,3)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email",$email);
            $cmd->bindValue(":sodienthoai",$sodienthoai);
            $cmd->bindValue(":matkhau",md5($matkhau));
            $cmd->bindValue(":hoten",$hoten);
            
            $result= $cmd->execute();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // cap nhat nguoi dung 
    public function capnhatnguoidung($id,$email,$sodienthoai,$hoten,$hinhanh){
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
     // doi mat khau 
    public function doimatkhau($email,$matkhau){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung SET matkhau=:matkhaumoi
                WHERE email=:email ";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email",$email);
            $cmd->bindValue(":matkhaumoi",md5($matkhau));
            $result=$cmd->execute();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // lấy danh sách người dùng 
    public function laydanhsachnguoidung(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung ";
            $cmd = $dbcon->prepare($sql);
            $result=$cmd->execute();
            $result=$cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function suanguoidung($id,$loai)
		{
			$db = DATABASE::connect();
			
			try
			{
				$sql = "UPDATE	nguoidung
						SET		loai=:loai
                                
						WHERE	id = :id";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(":id", $id);
				
				$cmd->bindValue(":loai", $loai);

				return $cmd->execute();
			}
			catch(PDOException $e)
			{
				$error_message = $e->getMessage();
                echo "<p>Lỗi truy vấn: $error_message</p>";
                exit();
			}
		}
        public function xoanguoidung($id){
            $dbcon = DATABASE::connect();
            try{
                $sql = "DELETE FROM nguoidung WHERE id=:id";
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

        public function ktxn_quenmatkhau($email,$sodienthoai){
            $dbcon = DATABASE::connect();
            try{
                $sql = "SELECT *from nguoidung WHERE email=:email and sodienthoai=:sodienthoai";
                $cmd = $dbcon->prepare($sql);
                $cmd->bindValue(":email", $email);
                $cmd->bindValue(":sodienthoai", $sodienthoai);
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
         // Lấy danh sách
    public function timkiem($loai){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung where loai=:loai";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":loai", $loai);
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