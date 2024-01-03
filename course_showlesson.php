
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
            <a href="index.php" class="text-white text-decoration-none d-none d-md-block" >COURSE SYLLABUS</a>
            <a href="index.php" class="text-white text-decoration-none d-block d-md-none" >Course Syllabus</a>
            
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

    <?php
        // include("./php/dbconnect.php");
        // $conn->query("SET SQL_SAFE_UPDATES=0");
        // $conn->query("UPDATE course set status ='ongoing' where now() between startDate and ADD_DAYS_SKIP_SUNDAY(startDate,numoflesson)");
        // $conn->query("UPDATE course set status ='completed' where DATEDIFF(ADD_DAYS_SKIP_SUNDAY(startDate,numoflesson),now()) < 0 ");
    ?>
   

    <div class="main-content" style=" margin: 100px 200px;">

        <?php
            include ("./php/dbconnect.php");
            $id = $_GET['id'];
            $data = $conn->query("SELECT * FROM class where ID ='$id'");
            $row = $data->fetch_assoc();
                $title = $row['className'];
                $teacherID = $row['taughtBy'];
                $teacher = $conn->query("SELECT * FROM account_info where accountID = '$teacherID'");
                $teacher = $teacher -> fetch_assoc();
                $teacherName = $teacher['firstName']." ".$teacher['lastName'];
                $hour = $row['totalStudyingHour'];
                $lesson = 3;
                $price = 4;
                $start = $row['startDate'];
                $dateleft =$conn->query("SELECT DATEDIFF('$start',now()) as day");
                $day = $dateleft->fetch_assoc();
                $enroll = $row['currentQuantity'];
                $day = $day['day'];
                
                echo "
                    <p style='font-size: 32px; font-weight: bold;'>$title</p>
                    <p style='font-size: 18px;'>$teacherName - $hour:00:00 - $lesson Lessons</p>
                    <p style='font-size: 16px;'>$enroll students have enrolled in so far.</p>
                    <p style='font-size: 16px; margin-bottom: 40px;'><i class=\"fa-solid fa-calendar-days fa-sm\" style=\"color: #1d283a;\"></i> $start ($day day/s left)</p>
                ";
                
                echo "<p style='font-size: 32px; font-weight: bold; '>Course's Syllabus</p>";
                $lessons = $conn->query("SELECT * FROM lesson where courseID = '$id'");
                while($row = $lessons->fetch_assoc()){
                    echo "<div style='border-bottom: 1px solid #d31245; margin-top: 30px;'>
                        <div class='d-flex flex-row' style='margin-left: 100px;'>
                            <p class='fw-bold' style='font-size: 18px; font-style: oblique; width: 175px;'>Lesson No.$row[orderofLesson]:</p>
                            <p style='text-decoration: underline; font-weight: 600; color: #1a2d59;'>$row[lessonName]</p>
                        
                        </div>
                        
                        <div class='d-flex flex-row' style='margin-left: 275px;'>
                            <p class='fw-bold' style='font-size: 18px; font-style: oblique; width: 100px;'>Duration:</p>
                            <p>$row[lessonDuration]
                        </div>
                    </div>
                    ";
                }

                echo "<button id='$id' style='margin-top: 50px; margin-left: 800px; border: none; background-color: #d31245; color: white; width: 120px; height: 40px;' class='ofstudent d-none register_btn'>Register $ $price</button>"
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