<?
    include ("./dbconnect.php");
    $id = $_GET['id'];
    $conn->query("UPDATE room SET status ='usable' WHERE id = '$id'");
    header("location: ../room.php");
?>