<?php
class THUONGHIEU{
    private $id;
    private $tenthuonghieu;

    public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }

    public function gettenthuonghieu(){
        return $this->tenthuonghieu;
    }

    public function settenthuonghieu($value){
        $this->tenthuonghieu = $value;
    }

    // Lấy danh sách
    public function laythuonghieu(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM thuonghieu";
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
    public function themthuonghieu($tenth,$hinhanh){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO thuonghieu(tenthuonghieu,hinhanh) VALUES(:tenthuonghieu,:hinhanh)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenthuonghieu", $tenth);
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
    public function xoathuonghieu($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM thuonghieu WHERE id=:id";
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
    public function suathuonghieu($id, $tenth, $hinhanh){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE thuonghieu SET tenthuonghieu=:tenthuonghieu, hinhanh=:hinhanh WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenthuonghieu", $tenth);
            $cmd->bindValue(":hinhanh", $hinhanh);
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

    // Lấy thương hiệu theo id
    public function laythuonghieutheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM thuonghieu WHERE id=:id";
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
    public function kiemtratrung($tenthuonghieu){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM thuonghieu WHERE tenthuonghieu=:tenthuonghieu";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenthuonghieu",$tenthuonghieu);
           
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
