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
    <script>
        function gotoLecturerRendering(languageID, shift, date) {
            $('.lecturer-select').load('./php/course_teacher_rendering.php', {
                value: languageID,
                shift: shift,
                date: date
            })
        }
    </script>
    
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
        <div class="main-content">
            <div class="page-title">Add New Class</div>
            <form action="./php/class_create.php" method="POST">
                <div class="data d-flex flex-row justify-content-between">
                    <div class="data-query ms-4">
                        <div class="data-group  mb-5">
                            <label for="name" style="width: 150px; font-weight: bold;">Name: </label>
                            <input required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 350px;'>
                        </div>
                        <div class="data-group  mb-5">
                            <label for="language" style="width: 150px; font-weight: bold;">Language: </label>
                            <select required id='language' name='language' style='width: 250px; border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 350px;' onchange="
                                languageID = this.value
                                date = $('#select-start-date').val();
                                lshift = $('#shift').val();
                                courseID = $('#course-select').val()
                                $('.select-course').load('./php/course_rendering.php',{
                                    value : languageID
                                });
                                $('.lecturer-select').load('./php/course_teacher_rendering.php',{
                                value : languageID,
                                shift:lshift,
                                date: date
                                })
                                console.log(lshift)
                                ">
                                <option selected disabled> </option>
                                <?
                                $language = $conn->query("SELECT * FROM language");
                                while ($row = $language->fetch_assoc()) {
                                    echo "<option value='$row[ID]'>$row[languageName]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="data-group  mb-5 select-course">
                            <label for="course-select" style="width: 150px; font-weight: bold;">Course: </label>
                            <select required id='course-select' name='course' style='width: 250px; border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 350px;'>
                                <option selected disabled></option>
                            </select>
                        </div>
                        <div class="data-group  mb-5 select-date">
                            <label for="course-select" style="width: 150px; font-weight: bold;">Date: </label>
                            <input required type="text" id='select-start-date' name='startDate' style='width: 250px; border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 350px;' onchange="
                                courseID = $('#course-select').val()
                                languagueID = $('#language').val()
                                date = $('#select-start-date').val()
                                lshift = $('#shift').find(':selected').val()
                                $('.lessonTime').load('./php/course_date_rendering.php',{
                                    date: date,
                                    shift: lshift,
                                    courseID: courseID
                                })
                                $('.lecturer-select').load('./php/course_teacher_rendering.php',{
                                value : languageID,
                                shift:lshift,
                                date: date,
                                courseID: courseID
                                })

                                console.log(lshift)
                                ">
                        </div>
                        <div class="data-group  mb-5 shift-select">
                            <label for="course-select" style="width: 150px; font-weight: bold;">Class Shift: </label>
                            <select required id='shift' name='shift' style='width: 250px; border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 350px;' onchange="
                                languageID = $('#language').val()
                                courseID = $('#course-select').val()
                                lshift = this.value
                                date = $('#select-start-date').val()
                                $('.lessonTime').load('./php/course_date_rendering.php',{
                                    date: date,
                                    shift: lshift,
                                    courseID: courseID
                                })
                                $('.lecturer-select').load('./php/course_teacher_rendering.php',{
                                value : languageID,
                                shift:lshift,
                                date: date,
                                courseID: courseID
                                })
                                console.log(lshift)
                                ">
                                <option selected disabled></option>
                                <option value='1'>Morning ( 7:00 - 11:00 )</option>
                                <option value='2'>Afternoon ( 13:00 - 17:00 )</option>
                            </select>
                        </div>
                        <div class="data-group  mb-5 lecturer-select">
                            <label for="lecturer-selects" style="width: 150px; font-weight: bold;">Lecturer: </label>
                            <select required id='lecturer-selects' name='lecturer' style='width: 250px; border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 350px;'>
                                <option selected disabled></option>
                            </select>
                        </div>
                        <div class="data-group  mb-5">
                            <label for="quantity" style="width: 150px; font-weight: bold;">No. Students: </label>
                            <input required type="number" min="1" max="40" id="quantity" name='quantity' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 350px;' placeholder="Maximum: 40 students per class">
                        </div>
                    </div>
                    <div class="changeable-data me-4">
                        <div class="hourInfo d-flex flex-row flex-wrap">

                        </div>
                        <div class="nameAndTimeInfo d-flex">
                            <div class="lessonName"></div>
                            <div class="lessonTime"></div>
                        </div>
                    </div>
                </div>

                <button class='btn btn-success' style='margin-left: 400px;'>Submit</button>
            </form>
        </div>
    </div>


    <script src="https://kit.fontawesome.com/c0b68942f0.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./js/jquery.datetimepicker.full.js"></script>
    <!-- <script src="./js/jquery.datetimepicker.min.js"></script> -->
    <script src="./js/class_management.js"></script>
    <script src="./js/datetimepicker.js"></script>
</body>

</html>

<?
include("./php/buttonViews.php");
?>