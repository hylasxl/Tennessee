<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/account.style.css">
</head>

<body>
    
         <div class="navbar">
        <a href="./index.php" style='text-decoration: none; color: white; margin-left: 200px; font-weight: 600;'>HomePage</a>
        <div class="log-out-session">
            <?
            include("./php/dbconnect.php");
            include("./php/utils.php");
            $currentID = $_SESSION['LoginAccountID'];
            $data = $conn->query("SELECT * FROM account_info where accountID = '$currentID'");
            $data = $data->fetch_assoc();
            $name = $data['firstName'] . " " . $data['lastName'];
            $typeID = getDataFromTheSameTable("accountType", "account", "ID", "$currentID", $conn);
            $type = getDataFromTheSameTable("typeName", "account_type", "ID", "$typeID", $conn);
            echo "<div class='d-flex flex-row align-items-center'>
                <div class='d-flex flex-column'>
                <a href='./account_page.php'>
                    <div class='text-white text-decoration-none'>$name</div>
                    <div class='text-white text-decoration-none'>$type</div>
                </a>
                </div>
                <div>
                <a href='./php/logout.php' style='color: white; margin: 0 10px;'>Sign out</a>
                </div>
                <div>
                <a href='./php/logout.php' style='color: white; '><i class='fa-solid fa-right-to-bracket fa-xl text-white-50'></i></a>
                </div>
                </div>";
            ?>
        </div>
    </div>
    <div class="main-container">
        <div class="sidebar">
            <div class='type-1 d-none'>
                <div class='type-title'>Admin</div>
                <a href="./account_management.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-users" style="color: #ffffff;"></i>
                        <div class="title-field">Account Management</div>
                    </div>
                </a>
                <a href="./cadre_account.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-building-user" style="color: #ffffff;"></i>
                        <div class="title-field">Cadres' Accounts</div>
                    </div>
                </a>
                <a href="./student_account_request.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-code-pull-request" style="color: #ffc107;"></i>
                        <div class="title-field active-tag">Student Account Requests</div>
                    </div>
                </a>
                <a href="./lecturer_account_request.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-code-pull-request" style="color: #ffffff;"></i>
                        <div class="title-field ">Lecturer Account Requests</div>
                    </div>
                </a>
                <a href="./course_approvement.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-file-circle-plus" style="color: #ffffff;"></i>
                        <div class="title-field">Course Approvement</div>
                    </div>
                </a>
                 

            </div>
            <div class='type-2 d-none'>
                <div class='type-title'>Educational Affair</div>
                <a href="./courses_management.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-book" style="color: #ffffff;"></i>
                        <div class="title-field ">Courses</div>
                    </div>
                </a>
                <a href="./classes_management.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-graduation-cap" style="color: #ffc107;"></i>
                        <div class="title-field active-tag">Classes</div>
                    </div>
                </a>
                <a href="./students_management.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-user-graduate" style="color: #ffffff;"></i>
                        <div class="title-field">Students</div>
                    </div>
                </a>
                <a href="./edu_stu_request.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-code-pull-request" style="color: #ffffff;"></i>
                        <div class="title-field">Student's Absent Request</div>
                    </div>
                </a>
                <a href="./lecturers_management.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-chalkboard-user" style="color: #ffffff;"></i>
                        <div class="title-field">Lecturers</div>
                    </div>
                </a>
                <a href="./room_management.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-brands fa-buromobelexperte" style="color: #ffffff;"></i>
                        <div class="title-field">Rooms</div>
                    </div>
                </a>
                <a href="./events_management.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-calendar-day" style="color: #ffffff;"></i>
                        <div class="title-field">Events</div>
                    </div>
                </a>


            </div>
            <div class='type-3 d-none'>
                <div class='type-title'>Lecturer</div>
                <a href="./lecturer_classes.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-graduation-cap" style="color: #ffc017;"></i>
                        <div class="title-field active-tag">Classes</div>
                    </div>
                </a>
                <a href="./lecturer_timetable.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-calendar-week" style="color: #ffffff;"></i>
                        <div class="title-field">Timetable</div>
                    </div>
                </a>
                <a href="./lecturer_check_attendance.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-clipboard-check" style="color: #ffffff;"></i>
                        <div class="title-field">Check Attendance</div>
                    </div>
                </a>
                <a href="./lecturer_academic_transcript.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                        <div class="title-field">Academic Transcripts</div>
                    </div>
                </a>
            </div>
            <div class='type-4 d-none'>
                <div class='type-title'>Student</div>
                <a href="./student_classes.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-graduation-cap" style="color: #ffc107;"></i>
                        <div class="title-field active-tag">Classes</div>
                    </div>
                </a>
                <a href="./student_timetable.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-calendar-week" style="color: #ffffff;"></i>
                        <div class="title-field">Timetable</div>
                    </div>
                </a>
                <a href="./student_absent_request.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-code-pull-request" style="color: #ffffff;"></i>
                        <div class="title-field">Absent Requests</div>
                    </div>
                </a>
                <a href="./student_academic_transcript.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                        <div class="title-field">Academic Transcripts</div>
                    </div>
                </a>
            </div>

        </div>
        <div class="main-content ">
            <div class="page-title">Class Details</div>
            <?
                $classID = $_GET['id'];
                $data = $conn->query("SELECT * FROM class where ID = '$classID'");
                $data = $data->fetch_assoc();

                $name = $data['className'];
                $courseID = $data['courseID'];
                $course = getDataFromTheSameTable('courseName','course','ID',$courseID,$conn);
                $languageID = getDataFromTheSameTable('languageID','course','ID',$courseID,$conn);
                $language = getDataFromTheSameTable('languageName','language','ID',$languageID,$conn);
                $studyingHour = $data['totalStudyingHour'].":00:00";
                $lessonDuration = $data['numberofStudyingHourEachDay'].":00:00";
                $quantity = $data['currentQuantity']." / ".$data['maxQuantity'];
                $teacherID = $data['taughtBy'];
                $shift = $data['studyAt'];
                $startWorking = "";
                if($shift == 1){
                    $startWorking = $morning_working_hour;
                } else $startWorking = $afternoon_working_hour;
                
                $lecturer = getDataFromTheSameTable('firstName','account_info','accountID',$teacherID,$conn)." ".getDataFromTheSameTable('lastName','account_info','accountID',$teacherID,$conn);
            ?>
            <form action="./php/send_new_course_request.php" method="POST" enctype="multipart/form-data">
                <div class='d-flex flex-row justify-content-between'>
                    <div class="data-query ms-4">
                
                        <div class="data-group  mb-5">
                            <label for="name" style="width: 150px; font-weight: bold;">Class Name: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $name ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label for="name" style="width: 150px; font-weight: bold;">Course Name: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $course  ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label for="name" style="width: 150px; font-weight: bold;">Language: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $language ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label for="name" style="width: 150px; font-weight: bold;">Shift: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $shift.' - From:'.$startWorking ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label for="name" style="width: 150px; font-weight: bold;">Total Studying Hour: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $studyingHour ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label for="name" style="width: 150px; font-weight: bold;">Lesson Duration: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $lessonDuration ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label for="name" style="width: 150px; font-weight: bold;">Quantity: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $quantity ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label for="name" style="width: 150px; font-weight: bold;">Lecturer: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $lecturer ?>'>
                        </div>
                        
                        
                    </div>
                    <div class="changeable-data me-4">
                            <?php
                                $data = $conn->query("SELECT * FROM class_schedule where classID='$classID' order by orderofLesson");
                                while($row = $data->fetch_assoc()){
                                    $orderLesson = $row['orderofLesson'];
                                    $lessonName = $conn->query("SELECT lessonName from lesson where courseID = '$courseID' and orderofLesson='$orderLesson'");
                                    $lessonName = $lessonName->fetch_assoc();
                                    $lessonName = $lessonName['lessonName'];
                                    echo "<div class='data-group  mb-5'>
                                    <label for='name' style='width: 100px; font-weight: bold;'>Lesson $orderLesson: </label>
                                    <input readonly required type='text' id='name' name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 250px;' value='$lessonName'>
                                    <input readonly required type='text' id='name' name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 100px;' value='$row[date]'>
                                </div>";
                                }
                            ?>

                            
                    </div>
                </div>
            </form>
            <div class="page-title">Student List</div>
            <div class="row header-table">
                    <div class="col col-1">ID</div>
                    <div class="col col-2">FirstName</div>
                    <div class="col col-2">LastName</div>
                    <div class="col col-2">Date of Birth</div>
                    <div class="col col-1">Gender</div>
                    <div class="col col-3">Email</div>
                    <div class="col col-1">Phone</div>
                    
                    
            </div>
            <?
                $data = $conn->query("SELECT * FROM class_student_list where classID ='$classID'");
                while($row = $data->fetch_assoc()){
                    $ID = $row['studentID'];
                    $firstName = getDataFromTheSameTable('firstName','account_info','accountID',$ID,$conn);
                    $lastName = getDataFromTheSameTable('lastName','account_info','accountID',$ID,$conn);
                    $dateofBirth = getDataFromTheSameTable('dateofBirth','account_info','accountID',$ID,$conn);
                    $gender = getDataFromTheSameTable('gender','account_info','accountID',$ID,$conn);
                    $email = getDataFromTheSameTable('email','account_info','accountID',$ID,$conn);
                    $phone = getDataFromTheSameTable('phone','account_info','accountID',$ID,$conn);
                    echo "<div class='row'>
                    <div class='col col-1'>$row[studentID]</div>
                    <div class='col col-2'>$firstName</div>
                    <div class='col col-2'>$lastName</div>
                    <div class='col col-2'>$dateofBirth</div>
                    <div class='col col-1'>$gender</div>
                    <div class='col col-3'>$email</div>
                    <div class='col col-1'>$phone</div>
            </div>";
                }
            ?>
        </div>
    </div>
    

    <script src="https://kit.fontawesome.com/c0b68942f0.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./js/class_management.js"></script>
</body>

</html>

<?
include("./php/buttonViews.php");
?>