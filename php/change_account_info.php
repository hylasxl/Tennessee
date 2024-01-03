<?
session_start();

include ("./dbconnect.php");
include ("./utils.php");


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dateofBirth = $_POST['dateofBirth'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$id = $_POST['id'];


$conn->query("UPDATE account_info SET firstName = '$firstName', lastName = '$lastName',
dateofBirth = '$dateofBirth', gender = '$gender', phone = '$phone', email = '$email', address = '$address' where accountID = '$id'");
header("location: ../account_page.php");







?>