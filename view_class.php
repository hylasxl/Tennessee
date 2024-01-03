<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/account.style.css">
</head>

<body>
    <div class="container-fluid top-header  d-flex  justify-content-around align-items-center sticky-top">
        <div class="menu d-flex     ">
            <div class="menu-icon text-toggle">
                <div id="myNav" class="overlay">
                    <!-- Overlay content -->
                    <div class="overlay-content">
                        <a href="about.php">About Us</a>
                        <a href="enrollment.php">Enrollment</a>
                        <a href="courses.php">Courses</a>
                        <a href="contact.php">Contact Us</a>
                    </div>
                </div>


            </div>
            <div id="menu-name" class="ms-2"></div>
        </div>
        <div class="logo-container ">
            <a href="index.php"><img class="logo" src="./assets/Logo.png" alt=""></a>
        </div>

    </div>
    <div class="container-fluid under-header d-flex align-items-center justify-content-between">
        <div class="nav-text align-items-center ">
            <a href="index.php" class="text-white text-decoration-none d-none d-md-block">COURSE</a>
            <a href="index.php" class="text-white text-decoration-none d-block d-md-none">Course</a>

        </div>
        <div class="login-button me-1 me-md-5 d-flex flex-row" data-toggle="tooltip" data-placement="bottom" title="For provided accounts">

            <div class="management-session me-3">
                <a class="management" href="./account_page.php" style="text-decoration: none; color: white; opacity: 1;">Account and Management Session</a>
            </div>



            <div class="sign-in-group">
                <a href="login.php"><i class="fa-solid fa-right-to-bracket fa-xl text-white-50"></i></a>
                <a href="login.php" class="text-white-50 text-decoration-none login-tag d-none d-md-inline">Sign in</a>
            </div>
            <div class="sign-out-group">
                <a href="./php/logout.php"><i class="fa-solid fa-right-to-bracket fa-xl text-white-50"></i></a>
                <a href="./php/logout.php" class="text-white-50 text-decoration-none login-tag d-none d-md-inline">
                    <?
                    include("./php/dbconnect.php");
                    include("./php/utils.php");
                    $currentID = $_SESSION["LoginAccountID"];
                    $firstName = getDataFromTheSameTable("firstName", "account_info", "ID", "$currentID", $conn);
                    $lastName = getDataFromTheSameTable("lastName", "account_info", "ID", "$currentID", $conn);
                    $accountType = getDataFromTheSameTable("accountType", "account", "ID", "$currentID", $conn);
                    $accountName = getDataFromTheSameTable("typeName", "account_type", "ID", "$accountType", $conn);
                    $accountName = strtoupper($accountName);
                    $name = $firstName . " " . $lastName . " / " . $accountName;
                    echo $name;
                    ?>
                </a>
            </div>

        </div>
    </div>


<div class="main-content "style='margin: 0;'>
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
                            <label class='form-lable' for="name" style="width: 150px; font-weight: bold; ">Class Name: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $name ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label class='form-lable' for="name" style="width: 150px; font-weight: bold; ">Course Name: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $course  ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label class='form-lable' for="name" style="width: 150px; font-weight: bold; ">Language: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $language ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label class='form-lable' for="name" style="width: 150px; font-weight: bold; ">Shift: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $shift.' - From:'.$startWorking ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label class='form-lable' for="name" style="width: 150px; font-weight: bold; ">Total Studying Hour: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $studyingHour ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label class='form-lable' for="name" style="width: 150px; font-weight: bold; ">Lesson Duration: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $lessonDuration ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label class='form-lable' for="name" style="width: 150px; font-weight: bold; ">Quantity: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $quantity ?>'>
                        </div>
                        <div class="data-group  mb-5">
                            <label class='form-lable' for="name" style="width: 150px; font-weight: bold; ">Lecturer: </label>
                            <input readonly required type="text" id="name" name='name' style='border: none; outline: none; border-bottom: 2px solid #1a2d59; width: 400px;' value='<? echo $lecturer ?>'>
                        </div>
                        
                        <button type='button' class='type-4 btn btn-danger' onclick="
                        window.location.replace('./php/self_register.php?id=<? echo $classID;?>')">
                        Register
                        </button>
                        
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
                                    <label class='form-lable' for='name' style='width: 100px; font-weight: bold;'>Lesson $orderLesson: </label>
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







    <div class="container footer">
        <div class="quick-links d-flex flex-column justify-content-center align-items-center align-items-md-start">
            <p class="text-white quicklinks">QUICK LINKS</p>
            <div class="container-fluid links d-flex flex-md-row flex-column justify-content-md-start justify-content-center align-items-center">
                <a href="./enrollment.php" class="link">ENROLL NOW</a>
                <a href="./childsafety.php" class="link">POLICIES AND CHILD SAFETY</a>
                <a href="./contact.php" class="link">CONTACT US</a>

            </div>
        </div>
        <div class="follow">
            <div class="quick-links d-flex flex-column justify-content-center align-items-center align-items-md-start">
                <p class="text-white follow d-none d-md-block">FOLLOW US</p>
                <div class="container-fluid links d-flex flex-row justify-content-md-start justify-content-center align-items-center">
                    <img class="icon-svg" src="https://www.salesian.vic.edu.au/app/themes/sallesian-college/dist/images/images/facebook.svg" alt="">
                    <img class="icon-svg" src="https://www.salesian.vic.edu.au/app/themes/sallesian-college/dist/images/images/twitter.svg" alt="">
                    <img class="icon-svg" src="https://www.salesian.vic.edu.au/app/themes/sallesian-college/dist/images/images/instagram.svg" alt="">


                </div>
            </div>
        </div>

        <div class="desc container-fluid d-flex flex-column flex-md-row justify-content-center justify-content-md-start ">
            <p>
                The care, safety and wellbeing of all children and vulnerable people is a core and fundamental responsibility for our community.
            </p>
            <p>
                We acknowledge the Traditional Owners of the land on which our College resides and pay our respects to their Elders, past, present and future.
            </p>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/c0b68942f0.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src='./js/course.js'></script>
</body>

</html>

<?
include "./php/buttonViews.php";
?>