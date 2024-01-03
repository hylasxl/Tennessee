<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    
</body>
</html>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?
include("./dbconnect.php");
include("./utils.php");
session_start();
$userID = $_SESSION['LoginAccountID'];
$name = $_POST['name'];
$language = $_POST['language'];
$course = $_POST['course'];
$startDate = $_POST['startDate'];
$shift = $_POST['shift'];
$lecturer = $_POST['lecturer'];
$quantity = $_POST['quantity'];
$date_lesson = [];
$lesson_duration = [];
$startWorking = "";
$roomsID = [];
if ($shift == 1) {
    $startWorking = $morning_working_hour;
} else if ($shift == 2) {
    $startWorking = $afternoon_working_hour;
}
$allRoomsID = $conn->query("SELECT * FROM room WHERE status ='accessible'");
while ($row = $allRoomsID->fetch_assoc()) {
    array_push($roomsID, $row['ID']);
}
$lessonData = $conn->query("SELECT count(ID) FROM lesson WHERE courseID = '$course'");
$lessonData = $lessonData->fetch_assoc();
$numberofLesson = $lessonData['count(ID)'];
$courseData = $conn->query("SELECT numberofStudyingHourEachLesson,numberofStudyingHour from course where ID = '$course'");
$courseData = $courseData->fetch_assoc();
$numberofEachDay = $courseData['numberofStudyingHourEachLesson'];
$totalHour = $courseData['numberofStudyingHour'];
$totalDay = ceil($totalHour / $numberofEachDay);

for ($index = 1; $index <= $numberofLesson; $index++) {
    $getDateTime = $_POST["date-{$index}"];
    $date = explode(" ", $getDateTime);
    $date = $date[0];
    array_push($date_lesson, $date);
    $lessons = $conn->query("SELECT lessonDuration from lesson where courseID = '$course' and orderofLesson ='$index'");
    $lessons = $lessons->fetch_assoc();
    $lessons = $lessons['lessonDuration'];
    array_push($lesson_duration, $lessons);
}
$daycount = $numberofLesson - 1;
$getClassMaxID = $conn->query("SELECT max(ID) from class");
$getClassMaxID = $getClassMaxID->fetch_assoc();
$getClassMaxID = $getClassMaxID['max(ID)'] + 1;
$getOrderClassByCourse = $conn->query("SELECT max(oderofClassbyCourse) from class where courseID = '$course'");
$getOrderClassByCourse = $getOrderClassByCourse->fetch_assoc();
$getOrderClassByCourse = $getOrderClassByCourse['max(oderofClassbyCourse)'] + 1;
$conn->query("INSERT INTO class VALUES ('$getClassMaxID', '$course', '$name', '$getOrderClassByCourse', '$startDate', ADD_DAYS_SKIP_SUNDAY('$startDate', '$daycount'), '$lecturer', '$quantity', '0', '$shift', '$numberofEachDay', '$totalHour', '$totalDay', 'comingsoon')");

for ($index = 1; $index <= $numberofLesson; $index++) {
    $array_index = $index - 1;
    $busyRoom = [];
    $busyOnes = $conn->query("SELECT roomID from class_schedule where date = '$date_lesson[$array_index]' AND timeStart = '$startWorking'");
    while ($row = $busyOnes->fetch_assoc()) {
        array_push($busyRoom, $row['roomID']);
    }

    $availableRooms = array_diff($roomsID,$busyRoom); 
    shuffle($availableRooms);
    $selectedRoom = end($availableRooms);
    $getMaxScheduleID = $conn->query("SELECT max(ID) from class_schedule");
    $getMaxScheduleID = $getMaxScheduleID->fetch_assoc();
    $getMaxScheduleID = $getMaxScheduleID['max(ID)'] + 1;
    
    $conn->query("INSERT INTO class_schedule VALUE('$getMaxScheduleID', '$getClassMaxID', '$course', '$index', '$date_lesson[$array_index]',' $startWorking', ADDTIME('$startWorking', '$lesson_duration[$array_index]') , $selectedRoom)");

    $getLecturerTimetableMaxID = $conn->query("SELECT max(ID) from lecturer_timetable");
    $getLecturerTimetableMaxID = $getLecturerTimetableMaxID->fetch_assoc();
    $getLecturerTimetableMaxID = $getLecturerTimetableMaxID['max(ID)'] + 1;
    
    $conn->query("INSERT INTO lecturer_timetable VALUE('$getLecturerTimetableMaxID', '$lecturer', '$course', '$getClassMaxID', '$index', '$date_lesson[$array_index]', '$startWorking', ADDTIME('$startWorking','$lesson_duration[$array_index]'), '$selectedRoom')");
    $getMaxRoomTimesheetID = $conn->query("SELECT max(ID) from room_timesheet");
    $getMaxRoomTimesheetID = $getMaxRoomTimesheetID->fetch_assoc();
    $getMaxRoomTimesheetID = $getMaxRoomTimesheetID['max(ID)'] + 1;
    $conn->query("INSERT INTO room_timesheet VALUES ('$getMaxRoomTimesheetID', '$selectedRoom', '$getClassMaxID', '$index', '$date_lesson[$array_index]', '$startWorking', ADDTIME('$startWorking','$lesson_duration[$array_index]'),'comingsoon')");
   
    if($conn->affected_rows > 0){
        echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"Added Successfully\",
            className: \"info\",
            style: {
                background: \"linear-gradient(to right, #00b09b, #96c93d)\",
            }
        }).showToast();
        </script>";
        header("Refresh:1; url=../classes_management.php");
    } else {
        echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"Your account has been restricted.\",
            className: \"info\",
            style: {
                background: \"#d31245\",
            }
        }).showToast();
        </script>";
        header("Refresh:1; url=../classes_management.php");
    }
    
}
?>