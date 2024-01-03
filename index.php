
<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

$_SESSION["LoginStatus"];
$_SESSION["LoginAccountID"];
$_SESSION["AccountType"];

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
            <a href="index.php" class="text-white text-decoration-none d-none d-md-block" >HOME</a>
            <a href="index.php" class="text-white text-decoration-none d-block d-md-none" >Home</a>
            
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

    <!-- <?
        include("./php/dbconnect.php");
        $conn->query("SET SQL_SAFE_UPDATES=0");
        $conn->query("UPDATE course set status ='ongoing' where now() between startDate and ADD_DAYS_SKIP_SUNDAY(startDate,numoflesson)");
        $conn->query("UPDATE course set status ='completed' where DATEDIFF(ADD_DAYS_SKIP_SUNDAY(startDate,numoflesson),now()) < 0 ");
    ?> -->
    <div class="main-image">
        <img src="./assets/main-img.jpeg" class="w-100 h-auto position-relative" alt="">

    </div>



    <div class="container-fluid" style="margin-top: 40px !important; background-color: #fafafa;">
        <div class="row">
            <div class="col col-12 col-md-6 d-flex align-items-start align-items-md-center">
                <div class="ms-3">
                    <p class="line-index">ABOUT US</p>
                    <p class="about-desc">Explore more about our stragies and history.</p>
                    <a href="./about.php"><button class="index-btn " style="margin-top: 30px !important; margin-bottom: 20px !important;">LEARN MORE</button></a>
                </div>
            </div>
            <div class="col col-12 col-md-6">
                <img src="./assets/leadership.jpg" style="width: 100%; height: auto;" alt="">
            </div>
        </div>
    </div>

    <div class="priciple-img mt-5">
        <img src="./assets/salesian-tour-class2-e1520480848317-1904x771.jpg" style="width: 100%; height: auto;" alt="">
    </div>

    <div class="container-fluid message d-flex flex-column align-items-center justify-content-center">
        <div class="book-tour-form-title">A MESSAGE FROM THE PRINCIPLE</div>
        <div class="message-content"><p class="fst-italic">Tennessee Language Center is a welcoming Catholic community renowned for its integrity and creative learning approaches that bring out the best in boys. Our rich Tennessee charism underpinned by the educational principles of founder, St John Bosco, provides the foundation of a future focused pedagogical vision.</p>
        </div>
        <div class="img-message d-flex flex-row mt-3 mb-3">
            <img class="img-message2" src="./assets/SalesianImage-300x300.jpg" style="border-radius: 50%; width: 150px; height: 150px;" alt="">
            <div class="name d-flex flex-column ms-3 justify-content-center">
                <p class="fw-bold fs-5">Mark Ashmore</p>
                <p class="" style="color:#d31245; font-weight: 700;">Principle</p>
            </div>
        </div>
    </div> 


    <div class="about3 container">
        <div class="row ">
            <div class="col col-12 col-md-6 d-flex justify-content-center flex-column p-5 order-1 order-md-1">
                <p class="title-about text-color1">WHY YOU SHOULD CHOOSE US?</p>
                <p class="about-desc">We're committed to recognising the contributions our past pupils make. Explore the digital Honour Roll profiles or contribute any information you might have about past students.</p>
                <button class="learn-more-btn">LEARN MORE</button>
            </div>
            <div class="col col-12 col-md-6 order-0 order-md-0">
                <img src="./assets/contact.jpg"  id="about-img" alt="">
            </div>
        </div>
    </div>

    <div class="about2 container">
        <div class="row ">
            <div class="col col-12 col-md-6 d-flex justify-content-center flex-column p-5 order-1 order-md-0">
                <p class="title-about text-color1">EMPLOYMENT</p>
                <p class="about-desc">We are committed to recruiting staff who embody our community’s high expectations, and who support our mission to develop our students’ intellectual, physical, spiritual and artistic skills.</p>
                <button class="learn-more-btn">LEARN MORE</button>
            </div>
            <div class="col col-12 col-md-6 order-0 order-md-1">
                <img src="./assets/employment.jpg"  id="about-img" alt="">
            </div>
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
</body>
<script src="https://kit.fontawesome.com/c0b68942f0.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</html>

<?php
    require "php/buttonView.php";
?>