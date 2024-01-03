<?
include "./dbconnect.php";
include "./utils.php";
$languageID = $_POST['value'];
$date = $_POST['date'];
$shift = $_POST['shift'];
$courseID = $_POST['courseID'];

if ($date != "" && $languageID != "" && $shift != "" && $courseID != "") {
    $startWorking = "";
    $allLecturerFromLanguageID = [];
    $busyLecturers = [];
    $currentDate = $date;
    $numofLesson = $conn->query("SELECT count(ID) from lesson where courseID ='$courseID'");
    $numofLesson = $numofLesson->fetch_assoc();
    $numofLesson = $numofLesson['count(ID)'];
    if ($shift == 1) $startWorking = "7:00:00";
    else $startWorking = "13:00:00";
    $lecturerIDs = $conn->query("SELECT lecturerID FROM lecturer_language WHERE languageID = '$languageID'");
    while ($row = $lecturerIDs->fetch_assoc()) {
        array_push($allLecturerFromLanguageID, $row['lecturerID']);
    }
    for ($index = 1; $index <= $numofLesson; $index++) {
        if ($index == 1) {
            $currentDate = date('Y-m-d', strtotime($currentDate . '+0 day'));
        } else {
            $currentDate = date('Y-m-d', strtotime($currentDate . '+1 day'));
            if (isWeekend($currentDate)) {
                $currentDate = date('Y-m-d', strtotime($currentDate . '+1 day'));
            }
        }
        $busyOnes = $conn->query("SELECT * FROM lecturer_timetable WHERE date='$currentDate' and timeStart = '$startWorking'");
        while ($row = $busyOnes->fetch_assoc()) {
            array_push($busyLecturers, $row['lecturerID']);
        }
    }
    $busyLecturers = array_unique($busyLecturers);
    $availableOnes = array_diff($allLecturerFromLanguageID,$busyLecturers);
    echo "<label for='lecturer-selects' style='width: 150px; font-weight: bold;'>Lecturer: </label>
    <select required id='lecturer-selects' name='lecturer' style='width: 250px; border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 350px;'>
        <option selected disabled></option>";
    for($index = 0; $index < count($availableOnes); $index++){
        $ID = $availableOnes[$index];
        $firstname = getDataFromTheSameTable('firstName','account_info','accountID',$ID,$conn);
        $lastname = getDataFromTheSameTable('lastName','account_info','accountID',$ID,$conn);
        $fullName = $firstname." ".$lastname;
        echo "<option value='$ID'>$fullName</option>";
    }
    echo "</select>";


} else {
    echo "
    <label for='lecturer-selects' style='width: 150px; font-weight: bold;'>Lecturer: </label>
    <select required id='lecturer-selects' name='lecturer' style='width: 250px; border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 350px;'>
        <option selected disabled></option>
    </select>
";
}
?>