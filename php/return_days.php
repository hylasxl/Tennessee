<?
include "./dbconnect.php";
include "./utils.php";

$class = $_POST['class'];
$from = $_POST['from'];
$to = $_POST['to'];
$dates = [];
if($class != "" && $to != "" && $from != ""){
    $data = $conn->query("SELECT * FROM class_schedule WHERE (date BETWEEN '$from' AND '$to') AND classID='$class'");
    while($row = $data->fetch_assoc()){
        array_push($dates,$row['date']);
    }
    if(count($dates) > 0){
        echo "<p class='fw-bold mt-5'> You'll be absent in ";
        echo "<span style='color: #d31245;'>";
        for($index = 0; $index < count($dates); $index++){
            echo $dates[$index].", ";
        }
        echo "</span>";
        echo " this class.</p>";
    } else echo "<p class='fw-bold mt-5'>There is no lesson in this period.</p>";
}
else echo "<script>$('#notification').empty()</script>"
?>