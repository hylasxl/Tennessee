<?
    include ("./dbconnect.php");
    $id = $_GET['id'];
    $conn->query("UPDATE room SET status ='maintenance' WHERE id = '$id'");
    header("location: ../room.php");

?>