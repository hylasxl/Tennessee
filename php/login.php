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
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$password = md5($password);
$login_SQL = "SELECT * FROM account where username = '$username' and password = '$password'";

$result = $conn->query($login_SQL);

if($result->num_rows>0){
    
    $result = $result->fetch_assoc();
    if($result['accountState']=='restricted'){
      echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Your account has been restricted.\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    header("Refresh:1; url=../login.php");
    return;
    }
    $_SESSION["LoginAccountID"] = $result["ID"];
    $_SESSION["AccountType"] = $result["accountType"];
    $_SESSION["LoginStatus"] = 1;
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Login Successfully\",
        className: \"info\",
        style: {
          background: \"linear-gradient(to right, #00b09b, #96c93d)\",
        }
      }).showToast();
    </script>";
    
    header("Refresh:1; url=../index.php");
}
else{
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Incorrect password or username\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    header("Refresh:1; url=../login.php");
}
?>