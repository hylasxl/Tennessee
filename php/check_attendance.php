<?

include("./dbconnect.php");
function printArr($arr)
{
    foreach ($arr as $value) {
        echo $value . " ";
    }
    echo "<br>";
}
function sliceArray($array) {
    $result = array();
    $chunks = array_chunk($array, 4);
    foreach ($chunks as $chunk) {
        array_push($result, $chunk);
    }
    return $result;
}
$data = $_GET['data'];
$data = explode("-", $data);
array_shift($data);

$arr_data = sliceArray($data);
for($index = 0; $index < count($arr_data); $index++){
    $current_arr = $arr_data[$index];
    $studentID = $current_arr[0];
    $courseID = $current_arr[1];
    $lessonID = $current_arr[2];
    $status = $current_arr[3];
    $conn->query("UPDATE attendance SET status ='$status' WHERE studentID ='$studentID' and courseID='$courseID' and lessonID = '$lessonID'");

}

header("location: ../teacher_check_attendance.php");
?>
