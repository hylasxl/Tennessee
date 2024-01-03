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

$id = $_GET['id'];
$name = $_GET['name'];
$time = $_GET['time'];
$duration = $_GET['duration'];
$state = $_GET['status'];

$data = $mysqli->query("UPDATE event SET 
name = '$name',
time = '$time',
duration = '$duration',
status = '$state',
end_time = ADDTIME('$time','$duration')
WHERE id = '$id'");



if($mysqli->affected_rows=="1"){
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Updated Successfully\",
        className: \"info\",
        style: {
          background: \"linear-gradient(to right, #00b09b, #96c93d)\",
        }
      }).showToast();
    </script>";
    header("Refresh:1; url=../event.php");
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
    header("Refresh:1; url=../event.php");
}
?>