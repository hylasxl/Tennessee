<?
include ("./dbconnect.php");
$courseID = $_POST['id'];
$data = $conn->query("SELECT * FROM lesson WHERE courseID = '$courseID'");

while($row = $data->fetch_assoc()){
    echo "<div class='data-group  mb-5' style='margin-right: 40px;'>
    <label for='name' style='width: 100px; font-weight: bold;'>Lesson No$row[orderofLesson]: </label>
    <input readonly required type='text' id='name' name='lessonName' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 300px;'  value='$row[lessonName]'>
    </div>";
}


?>