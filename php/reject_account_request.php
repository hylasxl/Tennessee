<?
include ("./dbconnect.php");

$id = $_GET['id'];

$conn->query("UPDATE lecturer_account_providing_request SET status ='rejected' WHERE ID = '$id'");
header("location: ../lecturer_account_request.php");
?>