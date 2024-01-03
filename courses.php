
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
    
    <link rel="stylesheet" href="css/style.css">
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
        <a href="booking.php" class="booking-text d-none d-md-block ">
            BOOK A TOUR
        </a>
    </div>
    <div class="container-fluid under-header d-flex align-items-center justify-content-between">
        <div class="nav-text align-items-center ">
            <a href="index.php" class="text-white text-decoration-none d-none d-md-block" >COURSE</a>
            <a href="index.php" class="text-white text-decoration-none d-block d-md-none" >Course</a>
            
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
                    <?php
                    require "./php/dbconnect.php";
                    $account_id = $_SESSION["LoginAccountID"];
                    $GetInfo_SQL = "SELECT * FROM account_info WHERE accountID = '$account_id'";
                    $GetInfo = $conn->query($GetInfo_SQL);
                    $GetInfo = $GetInfo->fetch_assoc();
                    $firstname  = $GetInfo["firstName"];
                    $lastname = $GetInfo["lastName"];

                    $account_type = $_SESSION["AccountType"];
                    $GetAccountType_SQL = "SELECT * FROM account_type  WHERE ID = '$account_type' ";
                    $GetAccountType = $conn->query($GetAccountType_SQL);
                    $GetAccountType = $GetAccountType->fetch_assoc();
                    $account_type = $GetAccountType['typeName'];

                    echo $firstname." ".$lastname,"/".$account_type;
                    $conn->close();
                ?>
                </a>
            </div>

        </div>
    </div>
<!-- 
    <?php
        // include("./php/dbconnect.php");
        // $conn->query("SET SQL_SAFE_UPDATES=0");
        // $conn->query("UPDATE course set status ='ongoing' where now() between startDate and ADD_DAYS_SKIP_SUNDAY(startDate,numoflesson)");
        // $conn->query("UPDATE course set status ='completed' where DATEDIFF(ADD_DAYS_SKIP_SUNDAY(startDate,numoflesson),now()) < 0 ");
    ?> -->
    <div class="main-image">
        <img src="./assets/Teaching-English-as-a-foreign-language-you-will-have-chance-to-learn-a-new-language.png" class="w-100 h-auto position-relative" alt="">

    </div>

    <div class="main-content" style=" margin: 100px 100px;">

        <div class="courses  d-flex flex-row w-100 flex-wrap justify-content-around"  >

                <?php
                    include ("./php/dbconnect.php");
                    $courses = $conn->query("SELECT * from class where status = 'comingsoon'");
                    while($row = $courses->fetch_assoc()){
                        $userID = $_SESSION["LoginAccountID"];
                        $id = $row['ID'];
                        $title = $row['className'];
                        $teacherID = $row['taughtBy'];
                        $teacher = $conn->query("SELECT * FROM account_info where accountID = '$teacherID'");
                        $teacher = $teacher -> fetch_assoc();
                        $teacherName = $teacher['firstName']." ".$teacher['lastName'];
                        $hour = $row['totalStudyingHour'];
                        $lesson = 3;
                        $price = 45;
                        $start = $row['startDate'];
                        $btn_str = " <button id='$id' class='register_btn ofstudent d-none' style=\"position: absolute; right: 20px; bottom: 20px; width: 100px; border:none; outline: none; background-color: #1a2d59; color: white; height: 30px;\">Register</button>";
                        
                        
                            $btn_str = "<button id='$id' class='ofstudent d-none' style=\"position: absolute; right: 20px; bottom: 20px; width: 100px; border:none; outline: none; background-color: #d31245; color: white; height: 30px;\">Registerd</button>";
                        }
                        echo "<div class=\"course\" style=\"width: 350px; height: 500px; background-color: #f7f9fa;  margin-top: 25px; color: black; position:relative;\">
                        <div class=\"img\">
                            <img src=\"./assets/about2.jpg\" alt=\"\" class=\"w-100\" style='height: 200px;'>
                        </div>
                        <p class=\"course-title fw-bold  \" style=\"margin: 20px; font-size: 20px; color: black;\"><a href=\"./course_showlesson.php?id={$id}\">$title</a></p>
                        <p class=\"  \" style=\"margin:  10px 20px; color: black;\"><span style='color: #d31245; font-weight: bold;'>Lecturer: </span>$teacherName</p>
                        <p class=\"  \" style=\"margin: 10px 20px ; color: black;\"><span style='color: #d31245; font-weight: bold;'>Duration: </span>$hour:00:00</p>
                        <p class=\"  \" style=\"margin: 10px 20px; color: black;\"><span style='color: #d31245; font-weight: bold;'>Amount of lessons: </span>$lesson Lessons</p>
                        <p class=\"  \" style=\"margin:  10px 20px; color: black;\"><span style='color: #d31245; font-weight: bold;'>Price: </span><span>$</span>$price</p>
                        <p class=\"  \" style=\"margin:  10px 20px; color: black;\"><span style='color: #d31245; font-weight: bold;'>Start at: </span>$start</p>
                       $btn_str
                    </div>";
                    
                ?>

                
                    
                
                
                
        </div>

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
                    <img  class="icon-svg" src="https://www.salesian.vic.edu.au/app/themes/sallesian-college/dist/images/images/facebook.svg" alt="">
                    <img  class="icon-svg" src="https://www.salesian.vic.edu.au/app/themes/sallesian-college/dist/images/images/twitter.svg" alt="">
                    <img  class="icon-svg" src="https://www.salesian.vic.edu.au/app/themes/sallesian-college/dist/images/images/instagram.svg" alt="">
                    
                    
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

<?php
    require "php/buttonView.php";
?>