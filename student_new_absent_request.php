<?php
session_start();
$userID = $_SESSION['LoginAccountID'];
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
                        <div class="title-field ">Account Management</div>
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
                <a href="./event_approvement.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-calendar-plus" style="color: #ffffff;"></i>
                        <div class="title-field">Event Approvement</div>
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
                


            </div>
            <div class='type-3 d-none'>
                <div class='type-title'>Lecturer</div>
                <a href="./lecturer_classes.php" class="field-tag">
                    <div class="field-group">
                        <i class="fa-solid fa-graduation-cap" style="color: #ffc107;"></i>
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
                        <i class="fa-solid fa-code-pull-request" style="color: #ffc107;"></i>
                        <div class="title-field  active-tag">Absent Requests</div>
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
        <div class="main-content">
            <div class="page-title">Create New Absent Request</div>
            <form action="./php/student_absent.php" method="POST">
                <div class='d-flex flex-row'>
                    <div class="input-gr">
                        <label for="class" class='fw-bold'> Class:</label>
                        <select required name="class" style='border: none; outline: none; width: 300px; border-bottom: 2px solid #1a2d59;' id="class" onchange="
                        from = $('#from-date-ab').val()
                        to = $('#to-date-ab').val()
                        classID = $('#class').val()
                        $('#notification').load('./php/return_days.php',{
                            from:from,
                            to:to,
                            class:classID
                        })
                        ">
                            <option disabled selected></option>
                            <?
                            $userID = $_SESSION['LoginAccountID'];
                            $data = $conn->query("SELECT * FROM class_student_list WHERE studentID = '$userID'");
                            while ($row = $data->fetch_assoc()) {
                                $classID = $row['classID'];
                                $classInfo = $conn->query("SELECT * FROM class WHERE ID = '$classID' AND status ='operating'");
                                if ($classInfo->num_rows == 1) {
                                    $classInfo = $classInfo->fetch_assoc();
                                    $className = $classInfo['className'];
                                    $classID = $classInfo['ID'];
                                    echo "<option value='$classID'>$className</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-gr ms-5 me-5">
                        <label for="from-date-ab" class='fw-bold'> From:</label>
                        <input name='from' required id='from-date-ab' style='border: none; outline: none; width: 240px; border-bottom: 2px solid #1a2d59;' onchange="
                        from = this.value
                        to = $('#to-date-ab').val()
                        classID = $('#class').val()
                        $('#to-date-ab').datetimepicker({
                            timepicker: false,
                            format: 'Y-m-d',
                            minDate: new Date(`${this.value}`),
                            closeOnDateSelect:true,
                            disabledWeekDays: [0],
                        })
                        $('#notification').load('./php/return_days.php',{
                            from:from,
                            to:to,
                            class:classID
                        })
                        ">
                    </div>
                    <div class="input-gr ms-5 me-5">
                        <label for="to-date-ab" class='fw-bold'> To:</label>
                        <input name='to' required id='to-date-ab' style='border: none; outline: none; width: 240px; border-bottom: 2px solid #1a2d59;' onchange="from = $('#from-date-ab').val()
                        to = $('#to-date-ab').val()
                        classID = $('#class').val()
                        $('#notification').load('./php/return_days.php',{
                            from:from,
                            to:to,
                            class:classID
                        })">
                    </div>
                </div>
                <div id='notification'>

                </div>
                <div class="div" style='margin-top: 100px;'>
                    <div class="input-gr">
                        <label for="reason" class='fw-bold'> Reason:</label>
                        <textarea minlength="10" required name="reason" id="reason" cols="70" rows="2"></textarea>
                    </div>
                </div>

                <button class='btn btn-primary mt-5 ms-5'>Submit</button>
            </form>

        </div>
    </div>


    <script src="https://kit.fontawesome.com/c0b68942f0.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./js/class_management.js"></script>
    <script src="./js/jquery.datetimepicker.full.js"></script>
    <script src="./js/jquery.datetimepicker.min.js"></script>
    <script src="./js/datetimepicker.js"></script>
</body>

</html>

<?
include("./php/buttonViews.php");
?>