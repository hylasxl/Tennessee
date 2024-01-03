<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style_event.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="./lib/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" href="./lib/datetimepicker/build/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="./lib/animated-calendar-event-gc/src/calendar-gc.css">
    
</head>

<body>
    

    <div class="main-content-container d-flex flex-row ">

        <div class="sidebar d-flex flex-column position-fixed" style="width: 230px !important;
    height: 100vh;
    background-color: #1a2d59 !important;">
            <div class="avatar d-flex justify-content-center align-items-center mt-3" sytle="position: relative;">
                <img src="./assets//user_profile_img/360_F_549983970_bRCkYfk0P6PP5fKbMhZMIb07mCJ6esXL.jpg" alt="" class="user_avatar" style="width: 40px;
    height: 40px;
    border-radius: 50%;">

                <div class="ms-3 d-flex flex-column">
                    <div class="avatar-name name-and-role" style=" font-size: 12px;
    font-weight: 600;">
                        <?php
                        require "./php/dbconnect.php";
                        $account_id = $_SESSION["LoginAccountID"];
                        $GetInfo_SQL = "SELECT * FROM account_info WHERE account_id = '$account_id'";
                        $GetInfo = $conn->query($GetInfo_SQL);
                        $GetInfo = $GetInfo->fetch_assoc();
                        $firstname  = $GetInfo["first_name"];
                        $lastname = $GetInfo["last_name"];

                        echo $firstname . " " . $lastname;
                        ?>
                    </div>
                    <div class="avatar-role name-and-role">
                        <?php
                        require "./php/dbconnect.php";


                        $account_type = $_SESSION["AccountType"];
                        $GetAccountType_SQL = "SELECT * FROM account_type  WHERE id = '$account_type' ";
                        $GetAccountType = $conn->query($GetAccountType_SQL);
                        $GetAccountType = $GetAccountType->fetch_assoc();
                        $account_type = $GetAccountType['name'];

                        echo $account_type;
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>

            <div class="sidebar-topic d-flex flex-column ps-3 mt-5">
                <div class="tag-group">
                    <i class="fa-solid fa-house me-2" style="color: #ffffff;"></i>
                    <a href="index.php" class="active-tag">Home</a>
                </div>

                <p class="tag-department mt-3 mb-3">ACCOUNT MANAGEMENT</p>

                <div class="tag-group">
                    <i class="fa-solid fa-user-tie me-2" style="color: #ffffff;"></i>
                    <a href="./account_page.php" class="">Profile</a>
                </div>

                <p class="tag-department mt-3 mb-3 ofstudent d-none fs-5">STUDENT</p>

                <div class="tag-group ofstudent d-none">
                    <i class="fa-solid fa-calendar me-2" style="color: #ffffff;"></i>
                    <a href="./student_calendar.php" class="">Calendar</a>
                </div>

                <div class="tag-group ofstudent d-none mt-3 ">
                    <i class="fa-solid fa-person-chalkboard me-2" style="color: #ffffff;"></i>
                    <a href="./student_course.php" class="">Courses</a>
                </div>

                <p class="tag-department mt-3 mb-3 ofteacher d-none fs-5">TEACHER</p>

                <div class="tag-group ofteacher d-none">
                    <i class="fa-solid fa-calendar me-2" style="color: #ffffff;"></i>
                    <a href="./teacher_classes.php" class="">Classes</a>
                </div>

                <div class="tag-group ofteacher d-none mt-3">
                    <i class="fa-solid fa-hourglass-start me-2" style="color: #ffffff;"></i>
                    <a href="./teaching_schedule.php" class="">Teaching Schedule</a>
                </div>

                <p class="tag-department mt-3 mb-3 ofedu d-none fs-6">EDUCATIONAL AFFAIR</p>

                <div class="tag-group ofedu d-none">
                    <i class="fa-solid fa-pen-nib me-2" style="color: #ffffff;"></i>
                    <a href="./course_management.php" class="">Courses</a>
                </div>

                <div class="tag-group ofedu d-none mt-3">
                    <i class="fa-solid fa-file-circle-plus me-2" style="color: #ffffff;"></i>
                    <a href="./add_new_course.php" class="">Add a new course</a>
                </div>

                <div class="tag-group ofedu d-none mt-3">
                    <i class="fa-solid fa-person-booth me-2" style="color: #ffffff;"></i>
                    <a href="./room.php" class=""  style="opacity: 1; text-decoration: underline;">Rooms - Timesheet</a>
                </div>


                <div class="tag-group ofedu d-none mt-3">
                    <i class="fa-solid fa-calendar-day me-2" style="color: #ffffff;"></i>
                    <a href="./event.php" class="">Events</a>
                </div>
                <div class="tag-group ofedu d-none mt-3">
                    <i class="fa-solid fa-table-list me-2" style="color: #ffffff;"></i>
                    <a href="./absence_request.php" class="">Absence Request</a>
                </div>


                <p class="tag-department mt-3 mb-3 ofadmin d-none fs-5">Admin</p>

                <div class="tag-group ofedu d-none">
                    <i class="fa-solid fa-chalkboard-user me-2" style="color: #ffffff;"></i>
                    <a href="./teacher_management.php" class="">Teachers</a>
                </div>

                <div class="tag-group ofedu d-none mt-3">
                    <i class="fa-solid fa-graduation-cap me-2" style="color: #ffffff;"></i>
                    <a href="./student_management.php" class="">Students</a>
                </div>

                <div class="tag-group ofadmin d-none mt-3">
                    <i class="fa-solid fa-user me-2" style="color: #ffffff;"></i>
                    <a href="./account_management.php" class="">Accounts</a>
                </div>


                <div class="tag-group ofadmin d-none mt-3">
                    <i class="fa-solid fa-user-plus me-2" style="color: #ffffff;"></i>
                    <a href="./account_providing_request.php " class="">Account providing request</a>
                </div>

                <hr class="w-100 ms-0 ps-0 mt-2">

                <div class="d-flex flex-row mt-2 justify-content-end me-3">
                    <a href="./php/logout.php"><i class="fa-solid fa-right-to-bracket fa-xl text-white-50"></i></a>
                    <a href="./php/logout.php" class="text-white-50 text-decoration-none login-tag d-none d-md-inline ms-2">Sign out</a>
                </div>
            </div>
        </div>

        <div class="content" style="width: 95% !important; padding-left: 230px !important;">

            <div class="title-content w-100 d-flex justify-content-center fs-3 mt-2 fw-bold">
                <?
                    include("./php/dbconnect.php");
                    $id = $_GET['id'];
                    $name = $conn->query("SELECT * FROM room where id='$id'");
                    $name = $name->fetch_assoc();
                    $name = $name['name'];
                    echo $name;
                ?>
            </div>
            <hr>
            <div id="calendar">
               
            </div>
            
            

        </div>
        
        <script src='./js/room.js'></script>
        <script src="./lib/datetimepicker/jquery.js"></script>
        <script src="./lib/datetimepicker/build/jquery.datetimepicker.min.js"></script>
        <script src="./lib/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
        <script src="./lib/datetimepicker/build/jquery.datetimepicker.full.js"></script>
        <script src="./lib/datetimepicker/jquery.datetimepicker.js"></script>
        <script src="./js/timepicker.js"></script>
        <script src ="./lib/animated-calendar-event-gc/src/calendar-gc.js"></script>
        <script src="./lib/animated-calendar-event-gc/minify.mjs"></script>
        <!-- <script src='./js/calendar.js'></script> -->
        <?
                    
                    include("./php/dbconnect.php");
                   
                    $id = $_GET['id'];
                    echo "<script>var calendar = $('#calendar').calendarGC({
       
                    })
                    var events =[
                        
                    ];
                    
                    calendar.setDate(new Date())</script>";
                    $event = $conn->query("SELECT * from room_timesheet where roomID='$id'");
                    function trimStr ($string){
                        if (strlen($string) >= 20) {
                            return substr($string, 0, 20). " ... ";
                        } else return $string;
                    }
                    while($row=$event->fetch_assoc()){
                        $date = $row['date'];
                        $timeStart = $row['startTime'];
                        $timeEnd = $row['endTime'];
                        $lessonID = $row['lessonID'];
                        $lesson = $conn->query("SELECT * FROM lesson where id = '$lessonID'");
                        $lesson = $lesson->fetch_assoc();
                        $lessonName = $lesson['name'];
                        $courseID = $lesson['courseID'];
                        $course = $conn->query("SELECT * FROM course where id ='$courseID'");
                        $course = $course->fetch_assoc();
                        $courseName = $course['name'];
                        $courseName = trimStr($courseName);
                        $lessonName = trimStr($lessonName);
                        $eventName = "$courseName  <br> $lessonName <br> $timeStart <br> $timeEnd";

                        echo "<script>
                        
                        events.push({
                            eventName: '$eventName',
                            date : new Date('$date'),
                        })
                        calendar.setEvents(events);
                        calendar.setDate(new Date())
                        </script>";
                        
                    }

                   
                ?>
        
</body>
<script src="https://kit.fontawesome.com/c0b68942f0.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</html>

<?php
require "php/buttonView.php";




?>

