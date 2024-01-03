<?
include './dbconnect.php';

$from = $_POST['from'];
$to = $_POST['to'];
$name = trim($_POST['name']);
$status = $_POST['status'];

$sql = " WHERE true ";

$time_diff = "";
if ($from == "" || $to == "") {
    $time_diff = "";
} else if ($from != "" && $to != "") {

    $time_diff = " and time BETWEEN '$from' AND '$to'";
}

$name_filter = "";
if ($name != "") {
    $name_filter = " AND name LIKE '%$name%' ";
}

$status_filter = "";
if ($status != '0') {
    $status_filter = " AND status = '$status' ";
}

if ($time_diff == "" && $name_filter == "" && $status_filter == "") $sql = "";

$sql = $sql . $time_diff . $name_filter . $status_filter;

$data = $conn->query("SELECT * FROM event".$sql." AND state='visible'");
if($data->num_rows < 1){
    echo "<p class='mt-3 ms-5'>No recorded data.</p>";
}
while ($row = $data->fetch_assoc()) {
    $button_str = "<button class='event-edit-btn' id='$row[id]' style='width: 80%; border: none; color: white; background-color: #0d47a1;'>Edit</button>
    <button class='event-edit-btn d-none' id='$row[id]' style='width: 80%; border: none; color: white; background-color: #d31245;'>Reschedule</button>
    <button class='event-info-btn mt-2' id='$row[id]' style='width: 80%; border: none; color: white; background-color: #053B50;'>Info</button>
    
    ";
    if($row['status'] == 'delayed'){
        $button_str="<button class='event-edit-btn d-none' id='$row[id]' style='width: 80%; border: none; color: white; background-color: #0d47a1;'>Edit</button>
        <button class='event-edit-btn' id='$row[id]' style='width: 80%; border: none; color: white; background-color: #d31245;'>Edit</button>
        <button class='event-info-btn mt-2' id='$row[id]' style='width: 80%; border: none; color: white; background-color: #053B50;'>Info</button>";
    } else if($row['status']=='cancelled'){
        $button_str="<button class='event-edit-btn d-none' id='$row[id]' style='width: 80%; border: none; color: white; background-color: #0d47a1;'>Edit</button>
        <button class='event-edit-btn d-none' id='$row[id]' style='width: 80%; border: none; color: white; background-color: #d31245;'>Edit</button>
        <button class='event-info-btn mt-2' id='$row[id]' style='width: 80%; border: none; color: white; background-color: #053B50;'>Info</button>";
    }
    
    $duration = $row['duration'];
    $time = $row['time'];
    $status = ucwords($row['status']);
    $end_time = $row['end_time'];

    echo ("<div class=\"row mt-2 border border-top-0 border-start-0 border-end-0 pb-2 border-bottom-1\">
                            
                    <div class=\"col text-center col-1 \">$row[id]</div>
                    <div class=\"col  col-3 fw-bold  \">$row[name]</div>
                    <div class=\"col text-center col-2 \">$time $end_time</div>
                    <div class=\"col text-center col-1 \">$row[no_enroll]</div>
                    <div class=\"col text-center col-1 \">$duration</div>
                    <div class=\"col text-center col-1 \">$status</div>
                    <div class=\"col text-center col-2 \">$row[createdAt]</div>
                    <div class=\"col text-center col-1 \">
                        $button_str
                    </div>
                    </div>
                </div>");
}

echo "<script src='./js/event.js'></script>";
$conn->close();
?>