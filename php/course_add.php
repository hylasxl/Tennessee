<?php
    include ("./dbconnect.php");
    include ("./utils.php");
    session_start();
    $currentLoginID = $_SESSION['LoginAccountID'];
    $numOfDays = $_POST['days'];
    $name = $_POST['name'];
    $hour = $_POST['hour'];
    $startDate = $_POST['date'];
    $teacherID = $_POST['teacherID'];
    $lessonNames = array();
    $lessonDate = array();
    $lessonDuration = array();
    $price = $_POST['price'];
    for($index = 1; $index <= $numOfDays; $index++){ 
        array_push($lessonNames,$_POST["lesson-{$index}"]);
        array_push($lessonDate,$_POST["date-{$index}"]);
        array_push($lessonDuration,$_POST["duration-{$index}"]);
    }
    $courseID = $conn->query("SELECT max(id) FROM course");
    $courseID = $courseID ->fetch_assoc();
    $courseID = $courseID['max(id)'] + 1;
    $data = $mysqli->query("INSERT INTO course  (name,addedBy,numofhour,numoflesson,numofEnrollment,taughtBy,status,startDate,price) VALUES ('$name','$currentLoginID','$hour','$numOfDays','0','$teacherID','comingsoon','$startDate','$price')");
    
    for($index = 1; $index <= $numOfDays; $index++){ 

        $arr_index = $index -1;
        $room = array();
        $roomtaken = array();
        
        $roomID = $conn->query("SELECT * FROM room where status ='usable'");
        while($row = $roomID->fetch_array()){
            array_push($room,$row['id']);
            
        }
        $noroomtaken = 0;
        $roomtakenID = $conn->query("SELECT * from room_timesheet WHERE date = '$lessonDate[$arr_index]'");
        while($row = $roomtakenID->fetch_array()){
            array_push($roomtaken,$row['id']);
            
        }
        
        $array_diffe = array_diff($room,$roomtaken);
        shuffle($array_diffe);
        $selectedRoom = array_shift(array_values($array_diffe));
        $lessonID = $conn->query("SELECT max(id) FROM lesson");
        $lessonID = $lessonID->fetch_assoc();
        $lessonID = $lessonID['max(id)'] + 1;
        

        $lesson = $conn->query("INSERT INTO lesson(id,courseID,name,orderLes,roomID,time_start,time_end,date,duration) VALUES('$lessonID','$courseID','$lessonNames[$arr_index]','$index','$selectedRoom','$start_working_hour',addtime('$start_working_hour','$lessonDuration[$arr_index]'),'$lessonDate[$arr_index]','$lessonDuration[$arr_index]')");
       $room_timesheet = $conn->query("INSERT INTO room_timesheet(roomID,startTime,endTime,lessonID,date) VALUES ('$selectedRoom','$start_working_hour',addtime('$start_working_hour','$lessonDuration[$arr_index]'),'$lessonID','$lessonDate[$arr_index]')");
    $lecturer_timetable = $conn->query("INSERT INTO lecturer_timetable (lecturerID,date,startTime,endTime,courseID, lessonID, roomID) values ('$teacherID','$lessonDate[$arr_index]', '$start_working_hour',addtime('$start_working_hour','$lessonDuration[$arr_index]'), '$courseID','$lessonID','$selectedRoom' )");
        header("location: ../course_management.php");
  
    }
?>