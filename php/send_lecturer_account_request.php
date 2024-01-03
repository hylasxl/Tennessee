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
session_start();

include ("./dbconnect.php");

$currentID = $_SESSION['LoginAccountID'];

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dateofBirth = $_POST['dateofBirth'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$createdBy = $_SESSION['LoginAccountID'];
$language = $_POST['language'];
$academicLevel = $_POST['level'];



$maxID = $conn->query("SELECT max(ID) from lecturer_account_providing_request");
$maxID = $maxID->fetch_assoc();
$nextID = $maxID['max(ID)'] + 1;


$conn->query("INSERT INTO lecturer_account_providing_request VALUE('$nextID','$firstName','$lastName','$email','$phone','$dateofBirth','$gender','$language','$academicLevel','pending','$currentID',NULL)");
echo $conn->error;
if($conn->affected_rows > 0){
    echo "<script  type=\"text/javascript\">
Toastify({
    text: \"Sent Successfully\",
    className: \"info\",
    style: {
        background: \"linear-gradient(to right, #00b09b, #96c93d)\",
    }
}).showToast();
</script>";
header("Refresh:1; url=../students_management.php");
} else {
    
}




?>