<?php

class GOIMAIL{
    function guimatkhaumoi($email,$matkhau)
    {
        require "PHPMailer-master/src/PHPMailer.php"; 
        require "PHPMailer-master/src/SMTP.php"; 
        require 'PHPMailer-master/src/Exception.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug
            $mail->isSMTP();  
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'nutycosmestic@gmail.com'; // SMTP username
            $mail->Password = 'Nutyshop123';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
            $mail->Port = 465;  // port to connect to                
            $mail->setFrom('nutycosmestic@gmail.com', 'NuTyShop' ); 
            $mail->addAddress($email); 
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Đổi mật khẩu';
            $noidungthu = "<p>Bạn nhận được thư này, do bạn hoặc ai đó yêu cầu đổi mật khẩu từ website nuty.vn</p>
                Mật khẩu của bạn là: {$matkhau}"; 
            $mail->Body = $noidungthu;
            $mail->smtpConnect( array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Error: ', $mail->ErrorInfo;
            return false;
        }
    }
}
    
?>