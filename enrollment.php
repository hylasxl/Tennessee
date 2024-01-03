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
            <a href="#" class="text-white text-decoration-none d-none d-md-block" >ENROLLMENT</a>
            <a href="#" class="text-white text-decoration-none d-block d-md-none" >Enrollment</a>
            
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
        <img src="./assets/enroll.jpg" class="">
        <p class=" text-white text-in-main-picture position-absolute">APPLY</p>
    </div>

    <div class="about1">
        <p class="title-about-1">APPLY FOR TENNESSEE LANGUAGE CENTER</p>
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-7">
                    <p class="about-desc">If you are interested in enrolling your child at Tennessee Language Center, it is important to be aware of key dates to avoid disappointment.</p>
                    <p class="about-desc text-color2 fw-bold">Applications for Years 8-12 and Above</p>
                    <p class="about-desc">
                        Please contact our College Registrar, Mrs Michelle Collins if you are interested in enrolling your child in Years 8 to 12 and Above. Places are subject to availability.
                    </p>
                    <p class="about-desc text-color2 fw-bold">Applications for Years 7</p>
                    <p class="about-desc">
                        The enrolment closing date for <b>Year 7, 2025</b> applications is <b>Friday 18 August 2023.</b>
                    </p>
                    <p class="about-desc">If you have not yet applied, but would like to, please note at this time we are still accepting applications.</p>
                    <p class="about-desc">In <b>August, September or October</b> following applications, you and your son will be invited to the Center to attend a Family Interview. This interview provides us with the opportunity to get to know your family and understand your child's goals and needs. We are also able to answer any questions you may have and discuss your child's specific circumstance in confidence at this time.</p>
                    <p class="about-desc">If you receive an offer of enrolment for your son, you have until <b>10 November 2023</b> to accept or to notify us of your decision. Once your child's place at our center has been secured, he will be invited to participate in our Year 7 <u>Becchi Transition Program.</u></p>
                </div>
                <div class="col col-12 col-md-5 d-flex justify-content-center">
                    <img src="./assets/about1.jpg" id="about-img" alt="" style="width: 100% !important; height: 00px !important;">
                </div>
            </div>
        </div>
    </div>


    <div class="booktourtitle container d-flex flex-column justify-content-center align-items-center">
        <p class="book-tour-form-title text-color1 fw-bold">Register to be one of us</p>
        <form action="./php/account_request.php" method="POST">
            <div class="container-fluid complaint-form d-flex flex-column ">
                <div class="row complaint-row-form mb-5">
                    <div class="col col-12 col-md-4 ">
                        <p>First Name <span class="req">*</span></p>
                    </div>
                    <div class="col col-12 col-md-8 mb-1">
                        <input autocomplete='off' type="text" name="firstname" required placeholder="First Name">
                    </div>
                </div>
                <div class="row complaint-row-form mb-5">
                    <div class="col col-12 col-md-4 ">
                        <p>Last Name<span class="req">*</span></p>
                    </div>
                    <div class="col col-12 col-md-8 mb-1">
                        <input autocomplete='off' type="text" name="lastname" required placeholder="Last Name">
                    </div>
                </div>
                <div class="row complaint-row-form mb-5">
                    <div class="col col-12 col-md-4 ">
                        <p>Phone<span class="req">*</span></p>
                    </div>
                    <div class="col col-12 col-md-8 mb-1">
                        <input autocomplete='off' type="number" name="phone" required placeholder="Phone Number">
                    </div>
                </div>
                <div class="row complaint-row-form mb-5">
                    <div class="col col-12 col-md-4 ">
                        <p>Email<span class="req">*</span></p>
                    </div>
                    <div class="col col-12 col-md-8 mb-1">
                        <input autocomplete='off' type="email" name="email_type" required placeholder="Email">
                    </div>
                </div>
                <div class="row complaint-row-form mb-5 " style="border: none;">
                    <div class="floating-label">      
                        <input autocomplete='off' class="floating-input ps-3"  name="dateofbirth" required type="text" onclick="(this.type='date')" placeholder=" ">
                        <span class="highlight"></span>
                        <label class="ms-3">Date of birth <span class="req">*</span></label>
                      </div>
                </div>
                <div class="row complaint-row-form mb-3" style="border: none;">
                    <div class="floating-label">  
                        <select class="floating-select" name="gender" required onclick="this.setAttribute('value', this.value);" value="">
                          <option value=""></option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="other">Other</option>
                        </select>
                        <label class="ms-3">Gender <span class="req">*</span></label>
                        
                    </div>
                </div>
               
            </div>

            <div class="container d-flex w-100 justify-content-center"><button type="submit" class="submit-btn" style="width: 200px; ">SUBMIT</button></div>

        </form>
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