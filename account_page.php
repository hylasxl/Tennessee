<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
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
        <button type="button" class="btn btn-primary"  id='send_request' >Save Change</button>
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
                    $GetInfo_SQL = "SELECT * FROM account_info WHERE accountID = '$account_id'";
                    $GetInfo = $conn->query($GetInfo_SQL);
                    $GetInfo = $GetInfo->fetch_assoc();
                    $firstname  = $GetInfo["firstName"];
                    $lastname = $GetInfo["lastName"];

                    echo $firstname." ".$lastname;
                    ?>
                    </div>
                    <div class="avatar-role name-and-role">
                    <?php
                    require "./php/dbconnect.php";
                    

                    $account_type = $_SESSION["AccountType"];
                    
                    $GetAccountType_SQL = "SELECT * FROM account_type  WHERE id = '$account_type' ";
                    $GetAccountType = $conn->query($GetAccountType_SQL);
                    $GetAccountType = $GetAccountType->fetch_assoc();
                    $account_type = $GetAccountType['typeName'];
                    
                    echo $account_type;
                    $conn->close();
                ?>
                    </div>
                </div>
            </div>
            <div class="sidebar-topic d-flex flex-column ps-3 mt-5">
                    <div class="tag-group">
                        <i  class="fa-solid fa-house me-2" style="color: #ffffff;"></i>
                        <a href="index.php" class="active-tag">Home</a>
                    </div>

                    <p class="tag-department mt-3 mb-3">ACCOUNT MANAGEMENT</p>

                    <div class="tag-group">
                        <i  class="fa-solid fa-user-tie me-2" style="color: #ffffff;"></i>
                        <a href="./account_page.php" style="opacity: 1; text-decoration: underline;" class="">Profile</a>
                    </div>

                    <p class="tag-department mt-3 mb-3 ofstudent d-none fs-6">STUDENT</p>

                    <div class="tag-group ofstudent d-none">
                        <i  class="fa-solid fa-calendar me-2" style="color: #ffffff;"></i>
                        <a href="./student_calendar.php" class="">Calendar</a>
                    </div>

                    <div class="tag-group ofstudent d-none mt-3 ">
                        <i  class="fa-solid fa-person-chalkboard me-2" style="color: #ffffff;"></i>
                        <a href="./student_course.php" class="" >Courses</a>
                    </div>
                    
                    <p class="tag-department mt-3 mb-3 ofteacher d-none fs-6">TEACHER</p>

                    <div class="tag-group ofteacher d-none">
                        <i  class="fa-solid fa-calendar me-2" style="color: #ffffff;"></i>
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
                    
                    <hr class="w-100 ms-0 ps-0 mt-2" >

                    <div class="d-flex flex-row mt-2 justify-content-end me-3">
                        <a href="./php/logout.php"><i class="fa-solid fa-right-to-bracket fa-xl text-white-50"></i></a>
                                        <a href="./php/logout.php" class="text-white-50 text-decoration-none login-tag d-none d-md-inline ms-2">Sign out</a>
                    </div>
            </div>
        </div>

        <div class="content">
            
            <div class="title-content w-100 d-flex justify-content-center fs-3 fw-bold mt-2 mb-2">My Profile</div>
            <hr>
            <div class="personal_information" style='margin-left: 125px !important; margin-top: 80px !important;'>
                <div class="title" style='font-weight: bold; font-size: 20px;'>Personal Infomation</div>
                <div class="info" style='margin-left: 125px !important; margin-top: 30px !important;'>
                    <?php
                        include ("./php/dbconnect.php");
                        $id = $_SESSION['LoginAccountID'];
                        $data = $conn->query("SELECT * FROM account_info where accountID = '$id'");
                        $data = $data->fetch_assoc();
                        $gender = $data['gender'];
                        $address = ucwords(trim($data['address']));
                        $email = trim($data['email']);
                        $phone = trim($data['phone']);
                        $dateofbirth = trim($data['date_of_birth']);
                        $lastname = trim($data['lastName']);
                        $firstname = trim($data['firstName']);
                        $gender_str = " <div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>Gender: </p>
                            <select required  name='gender' class='field-input-acc ' style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 150px; padding-left: 20px !important;' onchange=\"this.setAttribute('value',this.value);\" value='{$data['gender']}' >
                            </select>
                    </div>";
                    if($gender =="Male"){
                        $gender_str =  " <div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>Gender: </p>
                            <select required  name='gender' class='field-input-acc ' style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 250px; padding-left: 20px !important;' onchange=\"this.setAttribute('value',this.value);\" value='{$data['gender']}' >
                            <option value='M' selected>Male</option>
                            <option value='F'>Female</option>
                            <option value='O'>Other</option>
                            </select>
                    </div>";
                    } else if($gender == "Female"){
                        $gender_str =  " <div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>Gender: </p>
                            <select required  name='gender' class='field-input-acc ' style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 250px; padding-left: 20px !important;' onchange=\"this.setAttribute('value',this.value);\" value='{$data['gender']}' >
                            <option value='F' selected>Female</option>
                            <option value='M' >Male</option>
                            <option value='O'>Other</option>
                            </select>
                    </div>";
                    } else if($gender == "Other"){
                        $gender_str =  " <div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>Gender: </p>
                            <select required  name='gender' class='field-input-acc ' style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 250px; padding-left: 20px !important;' onchange=\"this.setAttribute('value',this.value);\" value='{$data['gender']}' >
                            <option value='O' selected>Other</option>
                            <option value='M' >Male</option>
                            <option value='F' >Female</option>
                            </select>
                    </div>";
                    }
                        echo "<form action='./php/update_account_info.php' method='POST'>
                            <input autocomplete='off' name='id' value='$id' readonly class='d-none' />
                            <div class='d-flex flex-row'>
                                <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>First name: </p>
                                    <input autocomplete='off' required  name='firstname' class='field-input-acc ' style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 250px; padding-left: 20px !important;' onkeyup=\"this.setAttribute('value',this.value);\" value='{$firstname}' />
                            </div>
                            <div class='d-flex flex-row mt-4'>
                                <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>Last name: </p>
                                    <input autocomplete='off' required  name='lastname' class='field-input-acc ' style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 250px; padding-left: 20px !important;' onkeyup=\"this.setAttribute('value',this.value);\" value='{$lastname}' />
                            </div>
                            <div class='d-flex flex-row mt-4'>
                                <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>Date of Birth: </p>
                                    <input autocomplete='off' required id='dateofbirth' name='dateofbirth' class='field-input-acc ' style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 250px; padding-left: 20px !important;' onchange=\"this.setAttribute('value',this.value);\" value='{$dateofbirth}' />
                            </div>
                            $gender_str
                            <div class='d-flex flex-row mt-4'>
                                <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>Phone: </p>
                                    <input autocomplete='off' required type='number' id='' name='phone' class='field-input-acc' style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 250px; padding-left: 20px !important;' onkeyup=\"this.setAttribute('value',this.value);\" value='{$phone}' />
                            </div>
                            <div class='d-flex flex-row mt-4'>
                                <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>Email: </p>
                                    <input autocomplete='off' required type='email' id='' name='email' class='field-input-acc ' style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 250px; padding-left: 20px !important;' onkeyup=\"this.setAttribute('value',this.value);\" value='{$email}' />
                            </div>
                            <div class='d-flex flex-row mt-4'>
                                <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>Address: </p>
                                    <input autocomplete='off' required type='text' id='' name='address' class='field-input-acc ' style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 650px; padding-left: 20px !important;' onkeyup=\"this.setAttribute('value',this.value);\" value='{$address}' />
                            </div>

                            <button type='submit' style='margin-top: 30px !important; margin-left: 400px !important; border: none; outline: none; color: white; background-color: #1a2d59; height: 35px; width: 150px; display: none;' id='update_acc_info_btn'>
                                Save Changes
                            </button>
                        </form>
                        ";
                    ?>
                </div>
            </div>
            <div class="course_information  ofedu d-none" style='margin-left: 125px !important; margin-top: 50px !important; margin-bottom: 100px;'>
                <div class="title" style='font-weight: bold; font-size: 20px;'>Working Infomation</div>
                <div class="info" style='margin-left: 125px !important; margin-top: 30px !important;'>
                    <?
                        include ("./php/dbconnect.php");
                        $id = $_SESSION['LoginAccountID'];
                        $data = $conn->query("SELECT * FROM account_info where account_id = '$id'");
                        $event_count = $conn->query("SELECT count(id) FROM event where createdBy = '$id'");
                        $event_count = $event_count->fetch_assoc();
                        $event_count = $event_count['count(id)'];
                        $course_count = $conn->query("SELECT count(id) FROM course where addedBy = '$id'");
                        $course_count = $course_count->fetch_assoc();
                        $course_count = $course_count['count(id)'];
                        $data = $data -> fetch_assoc();
                        $createdAt = $data['createdAt'];
                        $days = $conn->query("SELECT DATEDIFF(now(),'$createdAt') as days");
                        $days = $days ->fetch_assoc();
                        $days = $days['days'];
                        echo "<div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>Days of Work: </p>
                        <input autocomplete='off' readonly  type='text' id='' name='address'  style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 150px; padding-left: 20px !important;' value='{$days} Days' />
                    </div>
                    <div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 250px; '>Number of created events: </p>
                        <input autocomplete='off' readonly  type='text' id='' name='address'  style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 150px; padding-left: 20px !important;' value='{$event_count} Events' />
                    </div>
                    <div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 250px; '>Number of created courses: </p>
                        <input autocomplete='off' readonly  type='text' id='' name='address'  style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 150px; padding-left: 20px !important;' value='{$course_count} Courses' />
                    </div>";
                    ?>
                </div>
            </div>

            <div class="course_information  ofteacher d-none " style='margin-left: 125px !important; margin-top: 50px !important; margin-bottom: 100px;'>
                <div class="title" style='font-weight: bold; font-size: 20px;'>Working Infomation</div>
                <div class="info" style='margin-left: 125px !important; margin-top: 30px !important;'>
                    <?
                        include ("./php/dbconnect.php");
                        $id = $_SESSION['LoginAccountID'];
                        
                        $data = $conn->query("SELECT * FROM account_info where account_id = '$id'");
                        $data = $data->fetch_assoc();
                        $createdAt = $data['createdAt'];
                        $days = $conn->query("SELECT DATEDIFF(now(),'$createdAt') as days");
                        $days = $days ->fetch_assoc();
                        $days = $days['days'];
                        $teach_count = $conn->query("SELECT count(id), sum(numofhour),sum(numoflesson) FROM course where taughtBy = '$id'");
                        $teach_count = $teach_count->fetch_assoc();
                        $hour = $teach_count['sum(numofhour)'];
                        $course_count = $teach_count['count(id)'];
                        $lesson = $teach_count['sum(numoflesson)'];
                        echo "<div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 150px;'>Days of Work: </p>
                        <input autocomplete='off' readonly  type='text' id='' name='address'  style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 150px; padding-left: 20px !important;' value='{$days} Days' />
                    </div>
                    <div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 250px; '>Number of courses: </p>
                        <input autocomplete='off' readonly  type='text' id='' name='address'  style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 150px; padding-left: 20px !important;' value='{$course_count} Courses' />
                    </div>
                    <div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 250px; '>Total courses' duration: </p>
                        <input autocomplete='off' readonly  type='text' id='' name='address'  style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 150px; padding-left: 20px !important;' value='{$hour} Hours' />
                    </div>
                    <div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 250px; '>Total courses' duration: </p>
                        <input autocomplete='off' readonly  type='text' id='' name='address'  style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 150px; padding-left: 20px !important;' value='{$lesson} Lessons' />
                    </div>
                    ";
                    ?>
                </div>
            </div>
            <div class="course_information  ofstudent d-none " style='margin-left: 125px !important; margin-top: 50px !important; margin-bottom: 100px;'>
                <div class="title" style='font-weight: bold; font-size: 20px;'>Learning Infomation</div>
                <div class="info" style='margin-left: 125px !important; margin-top: 30px !important;'>
                    <?
                        include ("./php/dbconnect.php");
                        $id = $_SESSION['LoginAccountID'];
                        
                        $course = $conn->query("SELECT count(id) from course_enroll where studentID ='$id'");
                        $course = $course->fetch_assoc();
                        $course = $course['count(id)'];
                        echo "<div class='d-flex flex-row mt-4'>
                        <p class='field-name-acc' style='font-style: italic; font-weight: bold; width: 250px;'>Amount if registered course: </p>
                        <input autocomplete='off' readonly  type='text' id='' name='address'  style='border: none; outline: none; border-bottom: solid 1px #1a2d59; color: #d31245; width: 150px; padding-left: 20px !important;' value='{$course} Courses' />
                    </div>
                    
                    ";
                    ?>
                </div>
            </div>
            <div class="changePassword mb-5">
                <button style='margin-left: 900px; margin-top:30px; border:none; outline: none; width: 200px; height: 40px; color: white; background-color: #d31245;'  data-bs-toggle="modal" data-bs-target="#changepass">Change password</button>
            </div>
        </div>

        


    </div>
        <script src="./lib/datetimepicker/jquery.js"></script>
        <script src='./js/profile.js'></script>
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