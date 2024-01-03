<?
include ("./dbconnect.php");
include ("./utils.php");

$ID = $_GET['id'];
$date = $_POST['date'];
$class = $_POST['class'];
$room = $_POST['room'];

$length = count($date);

for($index = 1; $index <= $length; $index++){
    $array_index = $index - 1;
    $conn->query("UPDATE room_timesheet SET roomID = $room[$array_index] WHERE classID = '$class[$array_index]' AND date = '$date[$array_index]' ");
    
    $conn->query("UPDATE student_timetable SET roomID = $room[$array_index] WHERE classID = '$class[$array_index]' AND date = '$date[$array_index]' ");
    
    $conn->query("UPDATE lecturer_timetable SET roomID = $room[$array_index] WHERE classID = '$class[$array_index]' AND date = '$date[$array_index]' ");
    
    $conn->query("UPDATE class_schedule SET roomID = $room[$array_index] WHERE classID = '$class[$array_index]' AND date = '$date[$array_index]' ");
    
}

$conn->query("UPDATE room SET status = 'maintaining' WHERE ID ='$ID' ");
header("location: ../room_management.php");

?>