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
        <div class="nav-text align-items-center d-flex">
            <a href="login.php" class="text-white text-decoration-none d-none d-md-block" >HOME</a>
            <img src="./assets/arrow.png" class="ms-4 me-4 d-none d-md-block">
            <a href="#" class="text-white text-decoration-none d-none d-md-block" >ABOUT US</a>
            <a href="#" class="text-white text-decoration-none d-block d-md-none" >About us</a>
        </div>
        <div class="login-button me-1 me-md-5 d-flex flex-row " data-toggle="tooltip" data-placement="bottom" title="For provided accounts">

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
                    $GetInfo_SQL = "SELECT * FROM account_info WHERE account_id = '$account_id'";
                    $GetInfo = $conn->query($GetInfo_SQL);
                    $GetInfo = $GetInfo->fetch_assoc();
                    $firstname  = $GetInfo["first_name"];
                    $lastname = $GetInfo["last_name"];

                    $account_type = $_SESSION["AccountType"];
                    $GetAccountType_SQL = "SELECT * FROM account_type  WHERE id = '$account_type' ";
                    $GetAccountType = $conn->query($GetAccountType_SQL);
                    $GetAccountType = $GetAccountType->fetch_assoc();
                    $account_type = $GetAccountType['name'];

                    echo $firstname." ".$lastname,"/".$account_type;
                    $conn->close();
                ?>
                </a>
            </div>
        </div>
    </div>

    <div class="main-picture-about position-relative">
        <img src="./assets/about-main.jpg" class="">
        <p class=" text-white text-in-main-picture position-absolute">ABOUT US</p>
    </div>
 
    <div class="about1">
        <p class="title-about-1">ABOUT TENNESSEE LANGUAGE CENTER</p>
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-7">
                    <p class="about-desc">Tennessee Language Center welcomes all students and their families, celebrates diversity and promotes relationships built on mutual respect.</p>
                    <p class="about-desc text-color2 fw-bold">Who are we?</p>
                    <p class="about-desc">
                        Tennessee Language Center is a language school with over 1,141 students, each with their own individual story. A Tennessee education is a journey that draws its inspiration from the spirituality and educational principles of our founder, St John Bosco. With two campuses either side of the Monash Freeway, we have been located on 25 acres in the heart of Nashville since 1957.
                    </p>
                </div>
                <div class="col col-12 col-md-5 d-flex justify-content-center">
                    <img src="./assets/about1.jpg" id="about-img" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="about2 container">
        <div class="row ">
            <div class="col col-12 col-md-6 d-flex justify-content-center flex-column p-5 order-1 order-md-0">
                <p class="title-about text-color1">VISIONS AND VALUES</p>
                <p class="about-desc">Celebrating diversity and promoting relationships built on mutual respect is at the heart of all we do at Tennessee Language Center.</p>
                <button class="learn-more-btn">LEARN MORE</button>
            </div>
            <div class="col col-12 col-md-6 order-0 order-md-1">
                <img src="./assets/about2.jpg"  id="about-img" alt="">
            </div>
        </div>
    </div>
    
    <div class="about3 container">
        <div class="row ">
            <div class="col col-12 col-md-6 d-flex justify-content-center flex-column p-5 order-1 order-md-1">
                <p class="title-about text-color1">A TENNESSEE DIFFERENCE</p>
                <p class="about-desc">The Tennessee education aims to equip boys with the knowledge, skills and attitudes to become good Christians and honest citizens.</p>
                <button class="learn-more-btn">LEARN MORE</button>
            </div>
            <div class="col col-12 col-md-6 order-0 order-md-0">
                <img src="./assets/about3.jpg"  id="about-img" alt="">
            </div>
        </div>
    </div>
    
    <div class="about2 container">
        <div class="row ">
            <div class="col col-12 col-md-6 d-flex justify-content-center flex-column p-5 order-1 order-md-0">
                <p class="title-about text-color1">HISTORY</p>
                <p class="about-desc">In 1957, a group of dedicated people with a clear vision brought St John Bosco’s pastoral vision to Nashville.</p>
                <button class="learn-more-btn">LEARN MORE</button>
            </div>
            <div class="col col-12 col-md-6 order-0 order-md-1">
                <img src="./assets/history.png"  id="about-img" alt="">
            </div>
        </div>
    </div>
    
    
    <div class="about3 container">
        <div class="row ">
            <div class="col col-12 col-md-6 d-flex justify-content-center flex-column p-5 order-1 order-md-1">
                <p class="title-about text-color1">LEADERSHIP AND GOVERNANCE</p>
                <p class="about-desc">Tennessee Language Center is owned and operated by the Tennessee' of Don Bosco who delegate the positions of our dedicated Leadership Team.</p>
                <button class="learn-more-btn">LEARN MORE</button>
            </div>
            <div class="col col-12 col-md-6 order-0 order-md-0">
                <img src="./assets/leadership.jpg"  id="about-img" alt="">
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