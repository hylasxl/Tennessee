<?php

include "./dbconnect.php";
include "./utils.php";
$requestID = $_GET['id'];



$conn->query("UPDATE student_absent_request SET status = 'rejected' WHERE ID ='$requestID'");
header("location: ../edu_stu_request.php");

?>