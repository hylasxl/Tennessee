
<?php
session_start();
$_SESSION['isSentEmail'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                             
$username = $_GET['username'];
$password = $_GET['password'];
$email = $_GET['email'];
$name = $_GET['name'];


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
    $mail->addAddress($email, $name);     
    
    $mail->isHTML(true);                                  
    $mail->Subject = 'Tennessee Language Center';                                                 
    $mail->Body= "
        <h2>New account has been created for $name</h2>
        <p>You can change your password if neccessary</p>
        <p style='font-weight: bold;'>Username: <span style='font-weight: normal'>$username</span></p>
        <p style='font-weight: bold;'>Password: <span style='font-weight: normal'>$password</span></p>
        <p>Please remember your account infomation and <span style='font-weight: bold'>DO NOT</span> delete this email for interal use.</p>
    "; 

    $mail->send();
    header("location: account_providing_request.php?emailsent=1");

} catch (Exception $e) {
    header("location: account_providing_request.php?emailsent=-1");
}
?>