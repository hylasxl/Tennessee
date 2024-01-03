<?
include './dbconnect.php';

$name = $_POST['name'];

$sql = " WHERE true ";


$name_filter = "";
if ($name != "") {
    $name_filter = " AND name LIKE '%$name%' ";
}

if ($name_filter == "") $sql = "";

$sql = $sql.$name_filter;
$data = $conn->query("SELECT * FROM course".$sql);
                    while($row = $data->fetch_assoc()){
                        $status = ucwords($row['status']);
                        $teacherID = $row['taughtBy'];
                        $teacherName = $conn->query("SELECT * FROM account_info WHERE account_id='$teacherID'");
                        $teacherName = $teacherName->fetch_assoc();
                        $teacherName = $teacherName['first_name']." ".$teacherName['last_name'];
                        echo ("<div class=\"row mt-2 border border-top-0 border-start-0 border-end-0 pb-2 border-bottom-1\">
                            
                        <div class=\"col text-center col-1 \">$row[id]</div>
                        <div class=\"col text-center col-2 fw-bold  \">$row[name]</div>
                        <div class=\"col text-center col-2 \">$row[startDate]</div>
                        <div class=\"col text-center col-1 \">$row[numofhour]</div>
                        <div class=\"col text-center col-1 \">$row[numoflesson]</div>
                        <div class=\"col text-center col-1 \">$row[numofEnrollment]</div>
                        <div class=\"col text-center col-2 \">$teacherName</div>
                        <div class=\"col text-center col-1 \">$status</div>

                        <div class=\"col text-center col-1 \">
                        <button id='$row[id]' class='lesson-course-page' style='border: none; outline: none;  background-color: #f0d500;'>Lessons</button>
                        </div>
                    </div>
                    ");
                    }


                    echo "<script src='./js/course.js'></script>";
                    $conn->close();
?>