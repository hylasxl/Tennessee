
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    
</body>
</html>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php
session_start();
require "./dbconnect.php";
$username = $_POST['username'];
$email = $_POST['email'];

$findUsername_SQL = "SELECT * FROM account WHERE username = '$username'";
$findUsername = $conn->query($findUsername_SQL);
$isExistedUsername = $findUsername->num_rows;
$ID = $findUsername->fetch_assoc();
$ID = $ID['ID'];


if($isExistedUsername == 1) $isExistedUsername = true; 
else $isExistedUsername = false;

if ($isExistedUsername == false){
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Incorrect email or username\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    header("Refresh:1; url=../forgetpassword.php");
} else {
    
    $findEmail = $conn->query("SELECT email FROM account_info WHERE accountID = '$ID'");
    $findEmail = $findEmail->fetch_assoc();
    $findEmail = $findEmail['email'];
    if(trim($email)==$findEmail){
        $OTP = rand(100000,999999);
        $conn->query("INSERT INTO password_reset(username,otp,expiredAt,status) VALUE('$username','$OTP',addtime(now(),'00:02:00'),'valid')");

        header("location: ./send_otp.php?username=$username&email=$email&otp=$OTP");
    }
    else {
        echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Incorrect email or username\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    header("Refresh:1; url=../forgetpassword.php");
}
}

?>