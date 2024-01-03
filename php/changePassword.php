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
    include("./dbconnect.php");
    $old = $_GET['old'];
    $new = $_GET['new'];
    $id = $_GET['id'];

    $data = $conn->query("SELECT * from account where account_id = '$id'");
    $data = $data->fetch_assoc();
    $password = $data['password'];

    if(md5($old) != $password){
        echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Incorrect Password\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    header("Refresh:1; url=../account_page.php");
    } else {

        $newpass = md5($new);
        $conn->query("UPDATE account set password ='$newpass' where account_id = '$id' ");

        echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"Changed Successfully\",
            className: \"info\",
            style: {
              background: \"linear-gradient(to right, #00b09b, #96c93d)\",
            }
          }).showToast();
        </script>";
        header("Refresh:1; url=../account_page.php");
    }
    
?>