<?
$totalHour = $_POST['totalHour'];
$eachHour = $_POST['eachHour'];


if($eachHour != "" && $totalHour != ""){
    $numofLesson = ceil($totalHour/$eachHour);
    for($index = 1; $index <= $numofLesson; $index++){
        $duration = "";
        if($totalHour < $eachHour){
            $duration = $totalHour;
        } else $duration = $eachHour;
        $duration .= ":00:00";
        echo "<div class='data-group  mb-5'>
        <label for='name' style='width: 150px; font-weight: bold;'>Lesson No.$index: </label>
        <input required type='text' id='name' name='lesson-$index' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 300px;'>
        <input required readonly class='text-center' type='text' id='name' name='duration-$index' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 100px;' value='$duration'>
    </div>";
    $totalHour = $totalHour - $eachHour;
    }
}
?>