<?
    include ("./dbconnect.php");
    include ("./utils.php");

    $classID = $_GET['id'];
    $students = [];
    $studentbyClass = $conn->query("SELECT * FROM class_student_list where classID = '$classID' ");
    while($row = $studentbyClass->fetch_assoc()){
        array_push($students,$row['studentID']);
    }

    for($index = 0; $index < count($students); $index++ ){
        $studentID = $students[$index];
        $midterm = $_POST["mid-".$studentID];
        $finaltest = $_POST['final-'.$studentID];
        $conn->query("UPDATE academic_transcript SET midTermTest = '$midterm', finalTest ='$finaltest' WHERE classID = '$classID' AND studentID = '$studentID'");

    }
    header("location: ../lecturer_class_transcript.php?id=$classID");
?>