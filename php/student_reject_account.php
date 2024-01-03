<?
include ("./dbconnect.php");

$id = $_GET['id'];

$conn->query("UPDATE student_account_providing_request SET status ='rejected' WHERE ID = '$id'");
header("location: ../student_account_request.php");
?>