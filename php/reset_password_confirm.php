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
    include("./dbconnect.php");
    $new = $_POST['new'];
    $confirm = $_POST['confirm'];
    $username = $_GET['username'];
    $hashedPassword = md5($new);
    echo $new." ".$confirm;
    if($new != $confirm){
        echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Passwords don't match.\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    header("Refresh:1; url=../reset_password_form.php?username=$username");
    }   else {
        $conn->query("UPDATE account set password = '$hashedPassword' WHERE username = '$username'");
        echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"Changed Successfully\",
            className: \"info\",
            style: {
              background: \"linear-gradient(to right, #00b09b, #96c93d)\",
            }
          }).showToast();
        </script>";
        header("Refresh:1; url=../login.php");
    }
    
?>