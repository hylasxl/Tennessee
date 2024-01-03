<?
include ("./dbconnect.php");
include ("./utils.php");
$id = $_GET['id'];

$conn->query("UPDATE room SET status ='accessible' WHERE ID ='$id'");

header("location: ../room_management.php");
?>