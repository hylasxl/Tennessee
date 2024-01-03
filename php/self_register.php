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

$classID = $_GET['id'];
$classInfo = $conn->query("SELECT * FROM class WHERE ID = '$classID'");
$getTeacherID = getDataFromTheSameTable('taughtBy', 'class', 'ID', $classID, $conn);
$getCourseID = getDataFromTheSameTable('courseID', 'class', 'ID', $classID, $conn);
$classInfo = $classInfo->fetch_assoc();
$lessonDates = [];
$lessonTimes = [];
$lessonEnds = [];
$roomIDs = [];
$getDuplicate = $conn->query("SELECT * FROM class_student_list where studentID = '$userID' and classID = '$classID'");
if ($getDuplicate->num_rows == 1) {
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"You`re already added to this class\",
        className: \"info\",
        style: {
            background: \"#d31245\",
        }
    }).showToast();
    </script>";
    header("Refresh:1; url=../view_class.php?id=$classID");
} else {
    if ($classInfo['currentQuantity'] == $classInfo['maxQuantity']) {
        echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"Maximum quantity exceeded\",
            className: \"info\",
            style: {
                background: \"#d31245\",
            }
        }).showToast();
        </script>";
        header("Refresh:1; url=../view_class.php?id=$classID");
    } else {
        $classSchedule = $conn->query("SELECT * FROM class_schedule  WHERE classID = '$classID'");
        while ($row = $classSchedule->fetch_assoc()) {
            array_push($lessonDates, $row['date']);
            array_push($lessonTimes, $row['timeStart']);
            array_push($lessonEnds,$row['timeEnd']);
            array_push($roomIDs,$row['roomID']);
        }
        for ($index = 0; $index < count($lessonDates); $index++) {
            $test = $conn->query("SELECT * FROM student_timetable WHERE studentID = '$userID' and date = '$lessonDates[$index]' and timeStart = '$lessonTimes[$index]'");
            if ($test->num_rows == 1) {
                echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"Conflicted Schedules\",
            className: \"info\",
            style: {
                background: \"#d31245\",
            }
        }).showToast();
        </script>";
                header("Refresh:1; url=../view_class.php?id=$classID");
                return;
            }
        }

        $getClassStudentListMaxID = $conn->query("SELECT max(ID) from class_student_list");
        $getClassStudentListMaxID = $getClassStudentListMaxID->fetch_assoc();
        $getClassStudentListMaxID = $getClassStudentListMaxID['max(ID)']  + 1;
        $conn->query("INSERT INTO class_student_list VALUES ('$getClassStudentListMaxID', '$userID', '$classID')"); 

        for($index = 1; $index <= count($lessonDates); $index++){
            $array_index = $index - 1;
            $getStudentTimeTableMaxID = $conn->query("SELECT max(ID) from student_timetable");
            $getStudentTimeTableMaxID = $getStudentTimeTableMaxID->fetch_assoc();
            $getStudentTimeTableMaxID = $getStudentTimeTableMaxID['max(ID)']  + 1;
            $conn->query("INSERT INTO student_timetable VALUES('$getStudentTimeTableMaxID', '$userID', '$getTeacherID', '$getCourseID', '$classID', '$index', '$lessonDates[$array_index]', '$lessonTimes[$array_index]' , '$lessonEnds[$array_index]', '$roomIDs[$array_index]','willattend')");
            $getMaxAttendance = $conn->query("SELECT max(ID) from class_attendance");
            $getMaxAttendance = $getMaxAttendance->fetch_assoc();
            $getMaxAttendance = $getMaxAttendance['max(ID)']  + 1;
            $conn->query("INSERT INTO class_attendance VALUES ('$getMaxAttendance', '$classID', '$index','$userID', '$getTeacherID', '$lessonDates[$array_index]', '0')");
            
            
        }
        $getMaxTranscript = $conn->query("SELECT max(ID) from academic_transcript");
        $getMaxTranscript = $getMaxTranscript->fetch_assoc();
        $getMaxTranscript = $getMaxTranscript['max(ID)']  + 1;
        $conn->query("INSERT INTO academic_transcript VALUES('$getMaxTranscript','$classID','$userID','$getTeacherID','0','0','0','0','Failed')");
        $conn->query("UPDATE class set currentQuantity = currentQuantity + 1 WHERE ID = '$classID'");
        echo "<script  type=\"text/javascript\">
        Toastify({
            text: \"Register Successfully\",
            className: \"info\",
            style: {
                background: \"linear-gradient(to right, #00b09b, #96c93d)\",
            }
        }).showToast();
        </script>";
        header("Refresh:1; url=../view_class.php?id=$classID");

    }
}



?>