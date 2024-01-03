<?
include "./dbconnect.php";
include "./utils.php";
session_start();
$userID = $_SESSION['LoginAccountID'];
$class = $_POST['class'];
$from = $_POST['from'];
$to = $_POST['to'];
$reason = $_POST['reason'];
$dates = [];
if ($class != "" && $to != "" && $from != "" &&$reason != "") {
    $getMaxRequest = $conn->query("SELECT max(ID) from student_absent_request");
    $getMaxRequest = $getMaxRequest->fetch_assoc();
    $getMaxRequest = $getMaxRequest['max(ID)'] + 1;
    $conn->query("INSERT INTO student_absent_request VALUES ('$getMaxRequest','$userID','$class','$from','$to','$reason','pending')");
    
    header("location: ../student_absent_request.php");
    

    
}
?>