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
    <link rel="stylesheet" href="./css/jquery.datetimepicker.min.css">
</head>

<body>
    
         <div class="navbar">
        <a href="./index.php" style='text-decoration: none; color: white; margin-left: 200px; font-weight: 600;'>HomePage</a>
        <div class="log-out-session">
        <?
                include ("./php/dbconnect.php");
                include ("./php/utils.php");
                $currentID = $_SESSION['LoginAccountID'];
                $data = $conn->query("SELECT * FROM account_info where accountID = '$currentID'");
                $data = $data->fetch_assoc();
                $name = $data['firstName']." ".$data['lastName'];
                $typeID = getDataFromTheSameTable("accountType","account","ID","$currentID",$conn);
                $type = getDataFromTheSameTable("typeName","account_type","ID","$typeID",$conn);
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
                        <i class="fa-solid fa-building-user" style="color: #ffc107;"></i>
                        <div class="title-field active-tag">Cadres' Accounts</div>
                    </div>
                </a>
                <a href="./student_account_request.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-code-pull-request" style="color: #ffffff;"></i>
                        <div class="title-field">Student Account Requests</div>
                    </div>
                </a>
                <a href="./lecturer_account_request.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-code-pull-request" style="color: #ffffff;"></i>
                        <div class="title-field">Lecturer Account Requests</div>
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
                        <div class="title-field">Courses</div>
                    </div>
                </a>
                <a href="./classes_management.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i>
                        <div class="title-field">Classes</div>
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
                        <i class="fa-solid fa-chalkboard-user" style="color: #ffc107;"></i>
                        <div class="title-field active-tag">Lecturers</div>
                    </div>
                </a>
                <a href="./room_management.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-brands fa-buromobelexperte" style="color: #ffffff;"></i>
                        <div class="title-field">Rooms</div>
                    </div>
                </a>
                


            </div>
            <div class='type-3 d-none'>
                <div class='type-title'>Lecturer</div>
                <a href="./lecturer_classes.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i>
                        <div class="title-field">Classes</div>
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
                        <i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i>
                        <div class="title-field">Classes</div>
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
        <div class="main-content view-info-account-management d-flex">
            <div class="data-query">
                <div class="page-title">Send New Lecturer Account Request</div>

                <form action="./php/send_lecturer_account_request.php" method="POST">
                    <input class='d-none' name='type' value='<? echo $type; ?>'>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">First and last name</span>
                        </div>
                        <input accept-charset="utf-8" required autocomplete="off" type="text" name='firstName' class="form-control">
                        <input accept-charset="utf-8" required autocomplete="off" type="text" name='lastName' class="form-control">
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                        <select required class="form-select" id="inputGroupSelect01" name='gender'>
                            <option value="Other" selected>Other</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Date of Birth</span>
                        </div>
                        <input style='padding-left: 5px;' required id='dateofBirthforOver18' autocomplete='off' name ='dateofBirth'/>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <label class="input-group-text" for="inputGroupSelect01">Language</label>
                        <select required class="form-select" id="inputGroupSelect01" name='language'>
                            <?
                                $lang = $conn->query("SELECT * FROM language");
                                while($row = $lang->fetch_assoc()){
                                    echo "<option value = '$row[ID]'>$row[languageName]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <label class="input-group-text" for="inputGroupSelect01">Academic Level</label>
                        <select required class="form-select" id="inputGroupSelect01" name='level'>
                            <?
                                $lang = $conn->query("SELECT * FROM academic_level order by levelRank desc");
                                while($row = $lang->fetch_assoc()){
                                    echo "<option value = '$row[ID]'>$row[levelName]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Phone</span>
                        </div>
                        <input required autocomplete="off" type="number" name='phone' class="form-control">
                        
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Email</span>
                        </div>
                        <input required autocomplete="off" type="email" name='email' class="form-control">
                        
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Address</span>
                        </div>
                        <input autocomplete="off" type="text" name='address' class="form-control">
                        
                    </div>

                    <button style='margin-left: 400px; margin-top: 20px;' class='btn btn-primary'>Send Request</button>
                </form>
            </div>
        </div>


        <script src="https://kit.fontawesome.com/c0b68942f0.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="./js/account_management.js"></script>
        <script src="./js/jquery.datetimepicker.full.js"></script>
        <script src="./js/jquery.datetimepicker.min.js"></script>
        <script src="./js/datetimepicker.js"></script>
</body>

</html>

<?
include("./php/buttonViews.php");
?>