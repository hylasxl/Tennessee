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
    <link rel="stylesheet" href="./css/style_account.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="./lib/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" href="./lib/datetimepicker/build/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="./lib/animated-calendar-event-gc/src/calendar-gc.css">
</head>

<body>
    <?

    ?>
    <div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="passForm">
                        <input type="text" class='d-none' id='userID' readonly value='<?
                                                                                        echo $_SESSION["LoginAccountID"];
                                                                                        ?>'>
                        <div class="mb-3">
                            <label for="oldpass" class="col-form-label">Old password:</label>
                            <input autocomplete='off' required type="text" class="form-control" id="oldpass">
                        </div>
                        <div class="mb-3">
                            <label for="newpass" class="col-form-label">New password:</label>
                            <input autocomplete='off' required type="text" class="form-control" id="newpass">
                        </div>
                        <div class="mb-3">
                            <label for="repass" class="col-form-label">Input new password again:</label>
                            <input autocomplete='off' required type="text" class="form-control" id="repass">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='send_request'>Save Change</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid main-content-container d-flex flex-md-row">

        <div class="sidebar d-flex flex-column position-fixed ">
            <div class="avatar d-flex justify-content-center align-items-center mt-3">
                <img src="./assets//user_profile_img/360_F_549983970_bRCkYfk0P6PP5fKbMhZMIb07mCJ6esXL.jpg" alt="" class="user_avatar">

                <div class="ms-3 d-flex flex-column">
                    <div class="avatar-name name-and-role">
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

                <p class="tag-department mt-3 mb-3 ofstudent d-none fs-6">STUDENT</p>

                <div class="tag-group ofstudent d-none">
                    <i class="fa-solid fa-calendar me-2" style="color: #ffffff;"></i>
                    <a href="./student_calendar.php" class="">Calendar</a>
                </div>

                <div class="tag-group ofstudent d-none mt-3 ">
                    <i class="fa-solid fa-person-chalkboard me-2" style="color: #ffffff;"></i>
                    <a href="./student_course.php" style="opacity: 1; text-decoration: underline;" class="">Courses</a>
                </div>
                
                <p class="tag-department mt-3 mb-3 ofteacher d-none fs-6">TEACHER</p>

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
                    <a href="./room.php" class="">Rooms</a>
                </div>


                <div class="tag-group ofedu d-none mt-3">
                    <i class="fa-solid fa-calendar-day me-2" style="color: #ffffff;"></i>
                    <a href="./event.php" class="">Events</a>
                </div>
                <div class="tag-group ofedu d-none mt-3">
                    <i class="fa-solid fa-table-list me-2" style="color: #ffffff;"></i>
                    <a href="./absence_request.php" class="">Absence Request</a>
                </div>


                <p class="tag-department mt-3 mb-3 ofadmin d-none fs-6  ">Admin</p>

                <div class="tag-group ofedu d-none mt-3">
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
                    <a href="./account_providing_request.php" class="">Account providing request</a>
                </div>

                <hr class="w-100 ms-0 ps-0 mt-2">

                <div class="d-flex flex-row mt-2 justify-content-end me-3">
                    <a href="./php/logout.php"><i class="fa-solid fa-right-to-bracket fa-xl text-white-50"></i></a>
                    <a href="./php/logout.php" class="text-white-50 text-decoration-none login-tag d-none d-md-inline ms-2">Sign out</a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="title-content w-100 d-flex justify-content-center fs-3 mt-2 fw-bold">
                Courses
            </div>
            <hr>
            <div class="data-row container w-100 justify-content-center ms-3 me-3">
                <div class="row mt-2">
                    <div style="background-color: #1a2d59; color: white;" class="col col-1  text-center border border-2 ">ID</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-2  text-center border border-2 ">Name</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-2 text-center border border-2 ">Lecturer</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">No. of Lesson</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">Duration</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">Status</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-2 text-center border border-2 ">Start At</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">Action</div>

                </div>
                <div class="data-query">
                    <?php
                    require "./php/utils.php";
                    require "./php/dbconnect.php";
                    $id = $_SESSION["LoginAccountID"];
                    $data = $conn->query("SELECT * FROM course_enroll where studentID ='$id'");
                    while ($row = $data->fetch_assoc()) {
                        $courseID = $row['courseID'];
                        $data = $conn->query("SELECT * FROM course where id = '$courseID'");
                        
                        while ($row = $data->fetch_assoc()) {

                            $duration = $row['duration'];

                            $courseID = $row['id'];
                            $status = ucwords($row['status']);
                            $teacherID = $row['taughtBy'];
                            $teacher = $conn->query("SELECT * FROM account_info where account_id = '$teacherID'");
                            $teacher = $teacher->fetch_assoc();
                            $teacherName = $teacher['first_name']." ".$teacher['last_name'];

                            echo ("<div class=\"row mt-2 border border-top-0 border-start-0 border-end-0 pb-2 border-bottom-1\">
                            
                    <div class=\"col text-center col-1 \">$row[id]</div>
                    <div class=\"col  text-center col-2 fw-bold  \">$row[name]</div>
                    <div class=\"col text-center col-2 \">$teacherName</div>
                    <div class=\"col text-center col-1 \">$row[numoflesson]</div>
                    <div class=\"col text-center col-1 \">$row[numofhour]</div>
                    <div class=\"col text-center col-1 \">$status</div>
                    <div class=\"col text-center col-2 \">$row[startDate]</div>
                    <div class=\"col text-center col-1 \">
                        <button id='$courseID' style='width: 90%; border: none; background-color: #d31245; color: white;'  class='view_btn'>View Lessons</button>
                    </div>
                    </div>
                ");
                        }
                    }

                    echo "<script src='./js/student_classes.js'></script>";
                    $conn->close();
                    ?>
                </div>
            </div>




        </div>
        <script src='./js/student_classes.js'></script>
        <script src="./lib/datetimepicker/jquery.js"></script>
        <script src="./lib/datetimepicker/build/jquery.datetimepicker.min.js"></script>
        <script src="./lib/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
        <script src="./lib/datetimepicker/build/jquery.datetimepicker.full.js"></script>
        <script src="./lib/datetimepicker/jquery.datetimepicker.js"></script>
        <script src="./js/timepicker.js"></script>
        <script src="./lib/animated-calendar-event-gc/src/calendar-gc.js"></script>
        <script src="./lib/animated-calendar-event-gc/minify.mjs"></script>



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