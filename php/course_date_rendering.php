<?
    include ("./dbconnect.php");
    include ("./utils.php");

    $courseID = $_POST['courseID'];
    $date = $_POST['date'];
    $shift = $_POST['shift'];

    if($courseID != "" && $date != "" && $shift != ""){
        $currentDate = $date;
      
        
        $startWorking = "";
        if($shift == 1){
            $startWorking = $morning_working_hour;
        } else if ($shift == 2){
            $startWorking = $afternoon_working_hour;
        }

        $numofLesson = $conn->query("SELECT count(ID) from lesson where courseID ='$courseID'");
        $numofLesson = $numofLesson->fetch_assoc();
        $numofLesson = $numofLesson['count(ID)'];

        for($index = 1; $index <= $numofLesson; $index++){
            
            if($index == 1){
                $currentDate = date('Y-m-d', strtotime($date.'+0 day'));
            } else {
                $currentDate = date('Y-m-d', strtotime($currentDate.'+1 day'));
                if(isWeekend($currentDate)){
                    $currentDate = date('Y-m-d', strtotime($currentDate.'+1 day'));
                }
            }
            $datetime_str = $currentDate." ".$startWorking;
            echo"<div class='data-group  mb-5'>
            <input readonly required type='text' id='name' name='date-$index' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 170px;' class='text-center' value='$datetime_str'>
            </div>";

        }
    } else {
        echo "<script>$('.lessonTime').empty()</script>";
    }
?>