<?php
require './dbconnect.php';


$email = $_GET['email'];
$phone = $_GET['phone'];
$first_name = $_GET['firstname'];
$last_name = $_GET['lastname'];
$dateofbirth = $_GET['dateofbirth'];
$gender = $_GET['gender'];
$type = $_GET['type'];



$addNewRequest_SQL = "INSERT INTO account_providing_request (email,phone,first_name,last_name,dateofbirth,gender,status,type) VALUES ('$email',$phone,'$first_name','$last_name','$dateofbirth','$gender','pending','$type');";

$result = $conn->query($addNewRequest_SQL);


$conn->close(); 
if($type=='2'){header("location: ../teacher_management.php");}
else if($type=='4'){header("location: ../student_management.php");}

?>