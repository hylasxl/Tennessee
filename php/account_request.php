<?php
require './dbconnect.php';


$email = $_POST['email_type'];
$phone = $_POST['phone'];
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$dateofbirth = $_POST['dateofbirth'];
$gender = $_POST['gender'];
if($gender == "male"){
    $gender = "M";
}
else if($gender=="female"){
    $gender = "F";
}
else if($gender == "other"){
    $gender = "O";
}



$addNewRequest_SQL = "INSERT INTO account_providing_request (email,phone,first_name,last_name,dateofbirth,gender,status,type) VALUES ('$email',$phone,'$first_name','$last_name','$dateofbirth','$gender','pending','4');";

$result = $conn->query($addNewRequest_SQL);


$conn->close(); 

header("location: ../enrollment.php");
?>