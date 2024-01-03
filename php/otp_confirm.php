
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
$username = $_GET['username'];
$otp = $_POST['otp'];
$conn->query("UPDATE password_reset set status ='invalid' WHERE timediff(now(),expiredAt) > 0 ");
$findOTP = $conn->query("SELECT * FROM  password_reset WHERE username = '$username' and status = 'valid'");
if($findOTP->num_rows == 0){
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"There is no valid OTP at the moment.\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    header("Refresh:2; url=../otp_input.php?username=$username");
}

$exactOTP = $findOTP->fetch_assoc();
$exactOTP = $exactOTP['otp'];

if($exactOTP != $otp){
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Your inputted OTP is not exact or no longer valid.\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    header("Refresh:2; url=../otp_input.php?username=$username");
} else {
    header("location: ../reset_password_form.php?username=$username");
}


?>