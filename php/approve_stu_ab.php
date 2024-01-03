<?php

include "./dbconnect.php";
include "./utils.php";
$requestID = $_GET['id'];

$data = $conn->query("SELECT * FROM student_absent_request WHERE ID = '$requestID'");
$data = $data->fetch_assoc();
$from = $data['fromDate'];
$to = $data['toDate'];
$class = $data['classID'];
$studentID = $data['studentID'];

$dates = [];
$rows = $conn->query("SELECT * FROM class_schedule WHERE (date BETWEEN '$from' AND '$to') AND classID='$class'");
    while($row = $rows->fetch_assoc()){
        array_push($dates,$row['date']);
}



for($index = 0; $index < count($dates); $index++){
    $conn->query("UPDATE class_attendance SET status = '-1' where classID ='$class' AND studentID = '$studentID' AND date = '$dates[$index]'");
    
}

$conn->query("UPDATE student_absent_request SET status = 'approved' WHERE ID ='$requestID'");
header("location: ../edu_stu_request.php");
?>