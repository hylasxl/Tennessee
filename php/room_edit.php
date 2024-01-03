
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
    include ("./dbconnect.php");
    $name = $_GET['name'];
    $id = $_GET['id'];
    $mysqli->query("UPDATE room set name ='$name' where id = '$id'");
    
if($mysqli->affected_rows>"0"){
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Updated Successfully\",
        className: \"info\",
        style: {
          background: \"linear-gradient(to right, #00b09b, #96c93d)\",
        }
      }).showToast();
    </script>";
    header("Refresh:1; url=../room.php");
} else {
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Error\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    header("Refresh:1; url=../room.php");
}
?>