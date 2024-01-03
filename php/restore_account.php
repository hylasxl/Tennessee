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
    include ("./dbconnect.php");
    $id = $_GET['id'];

    $conn->query("UPDATE account SET accountState ='accessible' where ID = '$id'");
    echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"This account function has been restored.\",
            className: \"info\",
            style: {
                background: \"linear-gradient(to right, #00b09b, #96c93d)\",
            }
        }).showToast();
        </script>";
    header("refresh: 1; url = ../account_management.php");
?>