<?
include "./dbconnect.php";
include "./utils.php";
function sliceArray($array) {
    $result = array();
    $chunks = array_chunk($array, 4);
    foreach ($chunks as $chunk) {
        array_push($result, $chunk);
    }
    return $result;
}
$data = $_GET['data'];
$data_array = explode("/",$data);
array_shift($data_array);

$arr_arr = sliceArray($data_array);

$arr_arr_cnt = count($arr_arr);
$classID = $arr_arr[0][3];
for($index = 0; $index < $arr_arr_cnt; $index++){
    $current_arr = $arr_arr[$index];
    $value = $current_arr[0];
    $studentID = $current_arr[1];
    $order = $current_arr[2];
    $class = $current_arr[3];
    
    $conn->query("UPDATE class_attendance SET status = '$value' WHERE studentID = '$studentID' and classID ='$classID' and orderofLesson = '$order'");
    // echo "UPDATE class_attendance SET status = '$value' WHERE studentID = '$studentID' and classID ='$class' and orderofLesson = '$order'<br>";
    

}

$studentbyClass = $conn->query("SELECT distinct(studentID) from class_attendance where classID = '$classID'");
$students = [];
while($row = $studentbyClass->fetch_assoc()){
    array_push($students,$row['studentID']);
}

for($index = 0; $index < count($students); $index++){
    $currentStudent = $students[$index];
    $totalDay = $conn->query("SELECT count(ID) FROM class_attendance where classID = '$classID' and studentID = '$currentStudent'");
    $totalDay = $totalDay->fetch_assoc();
    $totalDay = $totalDay['count(ID)'];
    // echo $totalDay." ";
    $countAttended = $conn->query("SELECT count(ID) from class_attendance where  classID = '$classID' and studentID = '$currentStudent' and status ='1'");
    $countAttended = $countAttended->fetch_assoc();
    $countAttended = $countAttended['count(ID)'];
    // echo $countAttended." ";
    $attendanceRate =  ceil($countAttended/$totalDay*100);
    $conn->query("UPDATE academic_transcript SET attendanceRate = '$attendanceRate' WHERE classID = '$classID' and studentID = '$currentStudent'");
}

header("location: ../lecturer_check_table.php?id=$classID");
?>