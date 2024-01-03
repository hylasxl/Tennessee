<?
include ("./dbconnect.php");
$courseID = $_POST['id'];
if($courseID == "0" || $courseID == "") echo "<div></div>";
$data = $conn->query("SELECT * FROM course WHERE ID = '$courseID'");
$data = $data->fetch_assoc();
$noLesson = ceil($data['numberofStudyingHour']/$data['numberofStudyingHourEachLesson']);
echo "<div class='data-group  mb-5' style='margin-right: 40px;'>
<label for='name' style='width: 170px; font-weight: bold;'>Studying Duration: </label>
<input readonly required type='text' id='name' name='courseDuration' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 80px;' class='text-center' value='$data[numberofStudyingHour]:00:00'>
</div>
<div class='data-group  mb-5' style='margin-right: 10px;'>
<label for='name' style='width: 170px; font-weight: bold;'>Lesson Duration: </label>
<input readonly required type='text' id='name' name='lessonDuration' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 80px;' class='text-center' value='$data[numberofStudyingHourEachLesson]:00:00'>
</div>

";
?>