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
$studentIDs = $_POST['student'];
$numofStudent = count($studentIDs);
$classID = $_GET['id'];
$getTeacherID = getDataFromTheSameTable('taughtBy', 'class', 'ID', $classID, $conn);
$getCourseID = getDataFromTheSameTable('courseID', 'class', 'ID', $classID, $conn);
$lessonDate = [];
$lessonTime = [];
$lessonEnd = [];
$roomsID = [];
$getLessonInfo = $conn->query("SELECT * FROM class_schedule where courseID ='$getCourseID' and classID='$classID'");
while ($row = $getLessonInfo->fetch_assoc()) {
    array_push($lessonDate, $row['date']);
    array_push($lessonTime, $row['timeStart']);
    array_push($lessonEnd,$row['timeEnd']);
    array_push($roomsID,$row['roomID']);
}



$getCurrentQuantity = getDataFromTheSameTable("currentQuantity",'class','ID',$classID,$conn);
$getMaxQuantity = getDataFromTheSameTable("maxQuantity",'class','ID',$classID,$conn);
$slots = $getMaxQuantity - $getCurrentQuantity;
if($getCurrentQuantity + $numofStudent <= $getMaxQuantity){
    for ($index = 1; $index <= $numofStudent; $index++) {
        $conn->query("UPDATE class SET currentQuantity = currentQuantity + 1 where ID = '$classID'");
        $getClassStudentListMaxID = $conn->query("SELECT max(ID) from class_student_list");
        $getClassStudentListMaxID = $getClassStudentListMaxID->fetch_assoc();
        $getClassStudentListMaxID = $getClassStudentListMaxID['max(ID)']  + 1;
        $array_index = $index - 1;
        $conn->query("INSERT INTO class_student_list VALUES ('$getClassStudentListMaxID', '$studentIDs[$array_index]', '$classID')"); 
        
        
        for($sub_index = 1; $sub_index <= count($lessonDate); $sub_index++){
            $getStudentTimeTableMaxID = $conn->query("SELECT max(ID) from student_timetable");
            $getStudentTimeTableMaxID = $getStudentTimeTableMaxID->fetch_assoc();
            $getStudentTimeTableMaxID = $getStudentTimeTableMaxID['max(ID)']  + 1;
            
            $sub_index_arr = $sub_index - 1;
            
            $conn->query("INSERT INTO student_timetable VALUES('$getStudentTimeTableMaxID', '$studentIDs[$array_index]', '$getTeacherID', '$getCourseID', '$classID', '$sub_index', '$lessonDate[$sub_index_arr]', '$lessonTime[$sub_index_arr]' , '$lessonEnd[$sub_index_arr]', '$roomsID[$sub_index_arr]','willattend')");
            $getMaxAttendance = $conn->query("SELECT max(ID) from class_attendance");
            $getMaxAttendance = $getMaxAttendance->fetch_assoc();
            $getMaxAttendance = $getMaxAttendance['max(ID)']  + 1;
            $conn->query("INSERT INTO class_attendance VALUES ('$getMaxAttendance', '$classID', '$sub_index','$studentIDs[$array_index]', '$getTeacherID', '$lessonDate[$sub_index_arr]', '0')");
        }
        $getMaxTranscript = $conn->query("SELECT max(ID) from academic_transcript");
        $getMaxTranscript = $getMaxTranscript->fetch_assoc();
        $getMaxTranscript = $getMaxTranscript['max(ID)']  + 1;
        $conn->query("INSERT INTO academic_transcript VALUES('$getMaxTranscript','$classID','$studentIDs[$array_index]','$getTeacherID','0','0','0','0','Failed')");
    
        
    }
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
        text: \" quantity exceeded\",
        className: \"info\",
        style: {
            background: \"#d31245\",
        }
    }).showToast();
    </script>";
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"$slots Slots Left.\",
        className: \"info\",
        style: {
            background: \"#d31245\",
        }
    }).showToast();
    </script>";
header("Refresh:1; url=../classes_management.php");
}


?>