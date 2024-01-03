
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

$data = $conn->query("UPDATE account SET account_state = 'restricted' WHERE account_id = '$id'");
echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Account has been restriced.\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"This user has no longer used this account.\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    header("Refresh:2; url=../account_management.php");
?>