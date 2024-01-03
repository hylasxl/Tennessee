<?php
session_start();


$_SESSION["LoginAccountID"] = 0;
$_SESSION["AccountType"] = 0;
$_SESSION["LoginStatus"] = 0;
header("location: ../index.php");
$conn->close();

?>
