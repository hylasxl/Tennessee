<?
include ("./dbconnect.php");
$languageID = $_POST['value'];
$data = $conn->query("SELECT * FROM course where languageID = '$languageID'");
if($data->num_rows == 0){
    echo "
    <label for='course' style='width: 150px; font-weight: bold;'>Course: </label>
    <select required id='course' name='course' style='width: 250px; border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 350px;'>
        <option selected disabled></option>

    </select>
    <script>
    
    $('.hourInfo').empty()
    $('.lessonName').empty()
    
    </script>";
} else {
    echo "
    <label for='course-select' style='width: 150px; font-weight: bold;'>Course: </label>
    <select required id='course-select' name='course' style='width: 250px; border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 350px;' onchange=\"
    courseID = this.value;
    $('.hourInfo').load('./php/course_info_rendering.php',{
        id : courseID
    });
    $('.lessonName').load('./php/course_lesson_rendering.php',{
        id : courseID
    })
    \" >";
    echo "<option selected disabled></option>";
    while($row = $data->fetch_assoc()){
        echo "<option value ='$row[ID]'>$row[courseName]</option>";
    }
    echo "</select>";
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="./js/class_management.js"></script>