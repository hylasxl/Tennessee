<?
session_start();
include "./dbconnect.php";

$name = $_POST['name'];
$language = $_POST['language'];
$totalhour = $_POST['totalhour'];
$lessonhour = $_POST['lessonhour'];
$price = $_POST['price'];
$days = ceil($totalhour/$lessonhour);
$lesson_array = [];
$duration_array = [];


for ($index = 1; $index <= $days; $index++) {
    $lesson_str = "lesson"."-".$index;
    $lesson = $_POST["$lesson_str"];
    $duration_str = "duration-".$index;
    $duration = $_POST["$duration_str"];
    
    array_push($lesson_array,$lesson);
    array_push($duration_array,$duration);
}



//Files 
$fileName = $_FILES["image"]["name"];
$tmpName = $_FILES["image"]["tmp_name"];


$imgExtension = explode('.',$fileName);
$imgExtension = strtolower(end($imgExtension));
$newImgName = uniqid();
$newImgName .= '.'.$imgExtension;
move_uploaded_file($tmpName,"../assets/course_img/".$newImgName);
$currentID =  $currentID = $_SESSION['LoginAccountID'];



$getmaxID = $conn->query("SELECT max(ID) from course_image");
$getmaxID = $getmaxID->fetch_assoc();
$getmaxID = $getmaxID['max(ID)'] + 1;
$getmaxCourseID = $conn->query("SELECT max(ID) from course");;
$getmaxCourseID = $getmaxCourseID->fetch_assoc();
$getmaxCourseID = $getmaxCourseID['max(ID)']+1;
$conn->query("INSERT INTO course_image VALUES ('$getmaxID','$getmaxCourseID','$newImgName')");

$conn->query("INSERT INTO course VALUE('$getmaxCourseID','$name','$language','$totalhour','$lessonhour','$price','$getmaxID','$currentID','pending',NULL, 'operating')");

for($index = 1; $index <= $days; $index++){
    $array_index = $index-1;
   $lessonGetMaxID = $conn->query("SELECT max(ID) from lesson");
   $lessonGetMaxID = $lessonGetMaxID->fetch_assoc();
   $lessonGetMaxID = $lessonGetMaxID['max(ID)'] + 1;
   $currentLesson = $lesson_array[$array_index];
   $currentDuration = $duration_array[$array_index];

   $conn->query("INSERT INTO lesson VALUES ('$lessonGetMaxID','$getmaxCourseID','$index','$currentLesson','$currentDuration','$currentID')");


}

header("location: ../courses_management.php");
?>