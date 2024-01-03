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
            <a href="#" class="text-white text-decoration-none d-none d-md-block" >CONTACT US</a>
            <a href="#" class="text-white text-decoration-none d-block d-md-none" >Contact us</a>
            
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
        <img src="./assets/contact.jpg" class="">
        <p class=" text-white text-in-main-picture position-absolute">CONTACT US</p>
    </div>

    <div class="container-fluid location">
        <div class="row">
            <div class="col col-12 col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3219.937323923115!2d-86.80010602447838!3d36.19240610172535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8864671477193e93%3A0x48fa2f3b70351081!2sTennessee%20Language%20Center!5e0!3m2!1svi!2s!4v1693714121019!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col col-12 col-md-6">
                <p class="text-color1 fw-bold our-location mb-2">OUR LOCATION</p>
                <p class="mt-4 mb-4 text-color2 fw-bold" style="font-size: 24px;">Where are we?</p>
                <div class="d-flex flex-row mt-4 mb-4">
                    <i class="fa-solid fa-location-dot fa-lg"></i>
                    <p class="contact-address" style="margin-top: -11px; margin-left: 10px;">220 French Landing Dr Suite 1B, Nashville, TN 37228, America</p>
                </div>
                <p class="mt-4 mb-4 text-color2 fw-bold" style="font-size: 24px;">Contact us</p>
                <div class="d-flex flex-row mt-4 mb-4">
                    <i class="fa-solid fa-phone fa-lg"></i>
                    <p class="contact-address" style="margin-top: -11px; margin-left: 10px;">+1 615-741-7579</p>
                </div>
                <p class="mt-4 mb-4 text-color2 fw-bold" style="font-size: 24px;">Reception Hour</p>
                <div class="d-flex flex-row mt-4 mb-4">
                    
                    <p class="contact-address">8:15am – 4:15pm Monday – Friday</p>
                </div>
            </div>
        </div>
    </div>

<!-- FORM -->
<div class="booktourtitle container d-flex flex-column justify-content-center align-items-center">
    <p class="book-tour-form-title text-color1 fw-bold">ENQUIRY FORM</p>
    <p class="text-color1 fw-bold" style="font-size: 30px;">CONTACT OUR OFFICE</p>
    <form action="">
        <div class="container-fluid complaint-form d-flex flex-column ">
            <div class="row complaint-row-form mb-5">
                <div class="col col-12 col-md-4 ">
                    <p>First Name <span class="req">*</span></p>
                </div>
                <div class="col col-12 col-md-8 mb-1">
                    <input autocomplete='off' type="text" required placeholder="First Name">
                </div>
            </div>
            
            <div class="row complaint-row-form mb-5">
                <div class="col col-12 col-md-4 ">
                    <p>Surname <span class="req">*</span></p>
                </div>
                <div class="col col-12 col-md-8 mb-1">
                    <input autocomplete='off' type="text" required placeholder="Surname">
                </div>
            </div>
            <div class="row complaint-row-form mb-5">
                <div class="col col-12 col-md-4 ">
                    <p>Email address <span class="req">*</span></p>
                </div>
                <div class="col col-12 col-md-8 mb-1">
                    <input autocomplete='off' type="email" required placeholder="Email address">
                </div>
            </div>
            <div class="row complaint-row-form mb-5">
                <div class="col col-12 col-md-4 ">
                    <p>Subject</p>
                </div>
                <div class="col col-12 col-md-8 mb-1">
                    <input autocomplete='off' type="text"placeholder="Subject">
                </div>
            </div>
            <div class="row complaint-row-form mb-5">
                <div class="col col-12 col-md-4 ">
                    <p>Enquiry</p>
                </div>
                <div class="col col-12 col-md-8 mb-1">
                    <input autocomplete='off' type="text"  placeholder="Enquiry">
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button class="complaint-form-submit-btn">SEND</button>
        </div>
    </form>
    
</div>

<!-- END FORM -->



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