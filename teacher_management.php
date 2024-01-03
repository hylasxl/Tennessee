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

</head>

<body>
    <?php
    include("./php/dbconnect.php");
    $today = date("Y-m-d H:i:s");
    $conn->query("UPDATE event set status ='cancelled' WHERE DATEDIFF(time,NOW()) < 0 AND status ='delayed'");
    $conn->query("UPDATE event set status ='ongoing' WHERE DATEDIFF(time,NOW()) = 0 AND status ='pending'");
    $conn->query("UPDATE event set status ='celebrated' WHERE DATEDIFF(time,NOW()) < 0 AND status ='ongoing'");

    ?>

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
                    <i class="fa-solid fa-check me-2" style="color: #ffffff;"></i>
                    <a href="./teacher_check_attendance.php" class="">Check Attendance</a>
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


                <p class="tag-department mt-3 mb-3 ofadmin d-none fs-5">Admin</p>

                <div class="tag-group ofedu d-none mt-3">
                    <i class="fa-solid fa-chalkboard-user me-2" style="color: #ffffff;"></i>
                    <a href="./teacher_management.php"  style="opacity: 1; text-decoration: underline;" class="">Teachers</a>
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


        <!-- Modals -->

        <div class="modal fade" id="addTeacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Account Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="mb-3">
            <label for="firstname" class="col-form-label">Firstname:</label>
            <input autocomplete='off' required type="text" class="form-control" id="firstname">
          </div>
          <div class="mb-3">
            <label for="lastname" class="col-form-label">Lastname:</label>
            <input autocomplete='off' required type="text" class="form-control" id="lastname">
          </div>
          <div class="mb-3">
            <label for="email" class="col-form-label">Email:</label>
            <input autocomplete='off' required type="email" class="form-control" id="email">
          </div>
          <div class="mb-3">
            <label for="phone" class="col-form-label">Phone:</label>
            <input autocomplete='off' required type="number" class="form-control" id="phone">
          </div>
          <div class="mb-3">
            <label for="gender" class="col-form-label">Gender:</label>
            <select class='form-control' id='gender' required>
                <option value='O' selected>Other</option>
                <option value='F' >Female</option>
                <option value='M'>Male</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="dateofbirth" class="col-form-label">Date of Birth:</label>
            <input autocomplete='off' required type="text" class="form-control" id="dateofbirth">
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id='send_request' onclick="
        firstname = $('#firstname').val().trim();
        lastname = $('#lastname').val().trim();
        email = $('#email').val().trim();
        phone = $('#phone').val().trim();
        gender = $('#gender').val().trim();
        dateofbirth = $('#dateofbirth').val().trim();
        
        if(firstname==''||lastname==''||email==''||phone==''||gender==''||dateofbirth==''){

        } else window.location.replace(`./php/send_account_request.php?firstname=${firstname}&lastname=${lastname}&email=${email}&phone=${phone}&gender=${gender}&dateofbirth=${dateofbirth}&type=${2}`);
        
        ">Send Request</button>
      </div>

    </div>
  </div>
</div>
        <!-- End Modals -->

        <div class="content" style="width: 95% !important; padding-left: 230px !important;">

            <div class="title-content w-100 d-flex justify-content-center fs-3 fw-bold mb-2" style='margin-top: 15px !important;'>
                Lecturer Records

                
                    <button style='width: 160px; height: 40px; margin-left: 500px;  font-size: 1rem; border: none; outline: none; color: white; background-color: #11772d;' data-bs-toggle="modal" data-bs-target="#addTeacher">+Add new lecturer</button>
                   
            
            </div>
            <hr>

            <div class="filter-container ps-4 pt-4 d-flex flex-row align-items-center mb-4 ">
                <p class="fw-bold me-3 fs-4">Filter:</p>
                
                <div class="filter-group ms-3 d-flex flex-row">
                    
                </div>

            </div>

            <hr>



            <div class="data-row container w-100 justify-content-center ms-3 me-3">
                <div class="row mt-2">
                    <div style="background-color: #1a2d59; color: white;" class="col col-1  text-center border border-2 ">ID</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-3  text-center border border-2 ">Full Name</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-2 text-center border border-2 ">Date of birth</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">Gender</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">No of Course</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">No of Lesson</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">No of Hour</div>
                    

                </div>
                <div class="data-query">
                    <?php
                    require "./php/utils.php";
                    require "./php/dbconnect.php";
                    $data = $conn->query("SELECT acc.account_id, acci.first_name, acci.last_name, acci.date_of_birth, acci.gender FROM account_info as acci inner join account as acc on acc.account_id = acci.account_id where acc.account_type = '2'");
                    while($row = $data->fetch_assoc()){
                        $courseData = $conn->query("select count(id),sum(numofhour), sum(numoflesson) from course where taughtBy = '$row[account_id]'");
                        $gender = "O";
                        if($row["gender"] == "F"){
                            $gender = "Female";
                        } else if ($row["gender"] == "M"){
                            $gender = "Male";
                        } else if ($row["gender"] == "O"){
                            $gender = "Other";
                        }
                        $courseData = $courseData->fetch_assoc();
                        $course = $courseData['count(id)'];
                        $lesson = $courseData['sum(numoflesson)'];
                        $hour = $courseData['sum(numofhour)'];
                        if($lesson=="") $lesson = 0;
                        if($hour=="") $hour = 0;
                        echo ("<div class=\"row mt-2 border border-top-0 border-start-0 border-end-0 pb-2 border-bottom-1\">
                            
                        <div class=\"col text-center col-1 \">$row[account_id]</div>
                        <div class=\"col text-center col-3 \">$row[first_name] $row[last_name]</div>
                        <div class=\"col text-center col-2 \">$row[date_of_birth]</div>
                        <div class=\"col text-center col-1 \">$gender</div>
                        <div class=\"col text-center col-1 \">$course</div>
                        <div class=\"col text-center col-1 \">$lesson</div>
                        <div class=\"col text-center col-1 \">$hour:00:00</div>
                    
                    </div>
                ");
                    }
                   ?>
                </div>
            </div>
            

        </div>

        
        <script src="./lib/datetimepicker/jquery.js"></script>

        <script src="./lib/datetimepicker/build/jquery.datetimepicker.min.js"></script>
        <script src="./lib/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
        <script src="./lib/datetimepicker/build/jquery.datetimepicker.full.js"></script>
        <script src="./lib/datetimepicker/jquery.datetimepicker.js"></script>
        <script src="./js/timepicker.js"></script>
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