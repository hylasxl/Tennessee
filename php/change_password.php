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
<?
include ('./dbconnect.php');
include ('./utils.php');
session_start();
$userID = $_SESSION['LoginAccountID'];
$old = $_POST['old'];
$new = $_POST['new'];
$re = $_POST['re'];
$oldPass = getDataFromTheSameTable('password','account','ID',$userID,$conn);
if(md5($old) != $oldPass){
    echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"Incorrect Password \",
            className: \"info\",
            style: {
                background: \"#d31245\",
            }
        }).showToast();
        </script>";
    header("Refresh:1; url=../account_page.php");
} else {
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    if(preg_match($password_regex,$new) == 0){
        echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"Password must contain more than 8 digits, at least 1 special character, 1 uppercase English letter, 1 lowercase English letter and 1 digit. \",
            className: \"info\",
            style: {
                background: \"#d31245\",
            }
        }).showToast();
        </script>";
        header("Refresh:2; url=../account_page.php");
    } else {
        if($new != $re){
            echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"Confirm password does not match \",
            className: \"info\",
            style: {
                background: \"#d31245\",
            }
        }).showToast();
        </script>";
        header("Refresh:1; url=../account_page.php");
        } else {
            $new = md5($new);
            $conn->query("UPDATE account SET password = '$new' WHERE ID ='$userID' ");
            echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"Password changed successfully\",
            className: \"info\",
            style: {
                background: \"linear-gradient(to right, #00b09b, #96c93d)\",
            }
        }).showToast();
        </script>";
        header("Refresh:1; url=../account_page.php");
        }
    }
}

?>