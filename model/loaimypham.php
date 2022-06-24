<?php
class LOAIMYPHAM{
    private $id;
    private $tenloai;

    public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }

    public function gettenloai(){
        return $this->tenloai;
    }

    public function settenloai($value){
        $this->tenloai = $value;
    }

    // Lấy danh sách
    public function layloaimypham(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM loaimypham";
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

    // Thêm mới
    public function themloaimypham($tenloai){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO loaimypham(tenloai) VALUES(:tenloai)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenloai", $tenloai);
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
    public function xoaloaimypham($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM loaimypham WHERE id=:id";
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
    public function kiemtratrung($tenloai){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM loaimypham WHERE tenloai=:tenloai";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenloai",$tenloai);
           
            $cmd->execute();
            
            return $cmd->fetch();
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function sualoaimypham($id, $tenloai){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE loaimypham SET tenloai=:tenloai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenloai", $tenloai);
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

    // Lấy loại mỹ phẩm theo id
    public function layloaimyphamtheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM loaimypham WHERE id=:id";
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

}
?>
