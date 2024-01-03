
<?php
session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                             
$username = $_GET['username'];

$email = $_GET['email'];
$OTP = $_GET['otp'];


try {

    
    $mail->SMTPDebug = 2;                                 
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';                   
    $mail->SMTPAuth = true;                              
    $mail->Username = 'tennesseelanguagecenter@gmail.com';           
    $mail->Password = 'ethrfvehyztzuagc';                        
    $mail->SMTPSecure = 'none';                            
    $mail->SMTPAutoTLS = false;
    $mail->SMTPSecure = 'tls';  
    $mail->Port = 587;
    
    $mail->setFrom('tennesseelanguagecenter@gmail.com', 'Tennessee Language Center');           
    $mail->addAddress($email);     
    
    $mail->isHTML(true);                                  
    $mail->Subject = 'Tennessee Language Center';                                                 
    $mail->Body= "
        <h2>Password Reset Request</h2>
        <p>This can only be used once. Please DO NOT share you private OTP with anyone else.</p>
        
        <p style='font-weight: bold;'>OTP: <span style='font-weight: normal; font-size: 30px;'>$OTP</span></p>
        <p>Please remember your account infomation and <span style='font-weight: bold'>DO NOT</span> delete this email for interal use.</p>
    "; 
   
    $mail->send();
    header("location: ../otp_input.php?username=$username&email=$email");

} catch (Exception $e) {
    
}
?>