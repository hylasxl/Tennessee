<?php
include ("./dbconnect.php");

$date = $_POST["date"];
$hour = $_POST["hour"];
$id = $conn->query("select distinct(acc.account_id) from account as acc  join lecturer_timetable as lec on acc.account_id = lec.lecturerID where acc.account_type = 2 and date <> '$date'");
echo "<div class=\"input-element d-flex flex-row\">
<p class='fw-bold' style='width: 150px;'>Teacher: </p>
<select name='teacher' require name=\"teacher\" id=\"\" style=\"width: 350px; height: 30px; border: none; outline: none; border-bottom: 1px solid #1a2d59; padding-left: 20px;\" placeholdder=\"Please select\">";
if($date!==""&&$hour!==""){
    $allTeacher = $conn->query("SELECT account_id from account where account_type = 2");
    $days = ceil($hour/4);
    $day_minus1 = $days-1;
    while($row = $allTeacher->fetch_assoc()){
    $id = $row['account_id'];
    $available = $conn->query("SELECT * FROM lecturer_timetable where lecturerID = '$id' and date = '$date'");
    $prevDate = $conn->query("SELECT * FROM lecturer_timetable where lecturerID = '$id' and (date between '$date' and ADD_DAYS_SKIP_SUNDAY('$date', $day_minus1) )");
    
    if($available->num_rows>0 || $prevDate->num_rows>0){
        continue;
    }
    else{
        $teacherName = $conn->query("SELECT * FROM account_info WHERE account_id='$id'");
        $teacherName = $teacherName->fetch_assoc();
        $teacherName = $teacherName['first_name']." ".$teacherName['last_name'];
        echo "<option value='$id'>$teacherName</option>";
    }
}
}
echo "</select>
</div>";
?>



                            