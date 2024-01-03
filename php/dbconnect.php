<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$servername = "localhost";
$database = "tennessee";
$username = "root";
$password = "Viet2003";

$conn = mysqli_connect($servername, $username, $password, $database);
$mysqli = new mysqli($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>