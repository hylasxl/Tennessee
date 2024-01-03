<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>

</body>

</html>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?
session_start();
include("./dbconnect.php");
$id = $_GET['id'];
$userID = $_SESSION["LoginAccountID"];
$timetable = $conn->query("SELECT * FROM student_timesheet where studentID = '$userID'");
$lesson = $conn->query("SELECT * from lesson where courseID = '$id'");
function checkdateconf($timetable, $lesson)
{
  while ($row = $timetable->fetch_assoc()) {
    $date = $row['date'];
    while ($row2 = $lesson->fetch_assoc()) {
      $date2 = $row2['date'];
      if ($date == $date2) {
        return false;
      }
    }
  }
}
if ($timetable->num_rows > 0) {
  if (checkdateconf($timetable, $lesson) == false) {
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Conflicted Schedule.\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Can't register at this time.\",
        className: \"info\",
        style: {
          background: \"#d31245\",
        }
      }).showToast();
    </script>";
    header("Refresh:2; url=../courses.php");
  } else {

    while ($row = $lesson->fetch_assoc()) {
      $conn->query("INSERT INTO student_timesheet(courseID, lessonID, date, timeStart, timeEnd, roomID, studentID) values('$id', '$row[id]','$row[date]','$row[time_start]','$row[time_end]','$row[roomID]','$userID')");
      $teacherID = $conn->query("SELECT * FROM course where id ='$id'");
      $teacherID = $teacherID->fetch_assoc();
      $teacherID = $teacherID['taughtBy'];
      $conn->query("INSERT INTO attendance(courseID, lessonID, studentID, teacherID, status) values ('$id','$row[id]','$userID','$teacherID','0')");
    }


    $conn->query("INSERT INTO course_enroll(courseID, studentID) values('$id','$userID')");
    $conn->query("UPDATE course SET numofEnrollment = numofEnrollment + 1 where id ='$id'");
    echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Registered Successfully\",
        className: \"info\",
        style: {
          background: \"linear-gradient(to right, #00b09b, #96c93d)\",
        }
      }).showToast();
    </script>";
    header("Refresh:2; url=../courses.php");
  }
} else if ($timetable->num_rows == 0) {

  while ($row = $lesson->fetch_assoc()) {
    $conn->query("INSERT INTO student_timesheet(courseID, lessonID, date, timeStart, timeEnd, roomID, studentID) values('$id', '$row[id]','$row[date]','$row[time_start]','$row[time_end]','$row[roomID]','$userID')");
    $teacherID = $conn->query("SELECT * FROM course where id ='$id'");
    $teacherID = $teacherID->fetch_assoc();
    $teacherID = $teacherID['taughtBy'];
    $conn->query("INSERT INTO attendance(courseID, lessonID, studentID, teacherID, status) values ('$id','$row[id]','$userID','$teacherID','0')");
  }


  $conn->query("INSERT INTO course_enroll(courseID, studentID) values('$id','$userID')");
  $conn->query("UPDATE course SET numofEnrollment = numofEnrollment + 1 where id ='$id'");
  echo "<script  type=\"text/javascript\">
    Toastify({
        text: \"Registered Successfully\",
        className: \"info\",
        style: {
          background: \"linear-gradient(to right, #00b09b, #96c93d)\",
        }
      }).showToast();
    </script>";
  header("Refresh:2; url=../courses.php");
}


?>