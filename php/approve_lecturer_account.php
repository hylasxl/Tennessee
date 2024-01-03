<?php
session_start();
include ("./utils.php");
include ("./dbconnect.php");

$id = $_GET['id'];
$currentID = $_SESSION['LoginAccountID'];
$data = $conn->query("SELECT * FROM lecturer_account_providing_request WHERE ID = '$id'");
$data = $data -> fetch_assoc();

$firstName = $data['firstName'];
$lastName = $data['lastName'];
$email = $data['email'];
$phone = $data['phone'];
$dateofBirth = $data['dateofBirth'];
$gender = $data['gender'];
$languageID = $data['languageID'];
$levelOfAcademic = $data['levelOfAcademic'];
$createdBy = $data['createdBy'];


$conn->query("UPDATE lecturer_account_providing_request SET status ='approved', approveBy = '$currentID' WHERE ID = '$id'");
$maxID = $conn->query("SELECT max(ID) from account");
$maxID = $maxID->fetch_assoc();
$nextID = $maxID['max(ID)'] + 1;
$name = $firstName." ".$lastName;
$username = stripVN($firstName.$lastName.uniqid());
$password = uniqid();
$hashedPassword = md5($password);
echo "INSERT INTO account VALUE ('$nextID','$username','$hashedPassword','3','accessible')";
$conn->query("INSERT INTO account VALUE ('$nextID','$username','$hashedPassword','3','accessible')");
$conn->query("INSERT INTO account_info VALUE('$nextID','$nextID','$firstName','$lastName','$dateofBirth','$gender','$phone','$email','$address','0',now(),'$createdBy')");
$conn->query("INSERT INTO lecturer_academic_level(lecturerID,academicLevelID) VALUE('$nextID','$levelOfAcademic')");
$conn->query("INSERT INTO lecturer_language(lecturerID,languageID) VALUE('$nextID','$languageID')");
header("location: ../sendmail.php?username=$username&password=$password&email=$email&name=$name ");

?>