
<?php
session_start();
$_SESSION["LoginAccountID"] = 0;
$_SESSION["AccountType"] = 0;
$_SESSION["LoginStatus"] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
            <a href="index.php" class="text-white text-decoration-none d-none d-md-block" >HOME</a>
            <img src="./assets/arrow.png" class="ms-4 me-4 d-none d-md-block">
            <a href="#" class="text-white text-decoration-none d-none d-md-block" >RESET PASSWORD</a>
            <a href="#" class="text-white text-decoration-none d-block d-md-none" >Login form</a>
        </div>
        
    </div>
 
    <div class="container-fluid w-100 d-flex justify-content-center mt-4">
        <div class="login-form w-100 border border-4 p-2  ">
            <p class="text-center fw-bold  fs-5">Tennessee Language Center</p>
            <p class="text-center fw-bold fst-italic fs-4">OTP</p>
            <p class="text-center fw-bold fst-italic fs-4"><?php
              $username = $_GET['username'];
              echo $username;
            ?></p>
            <form action="./php/otp_confirm.php?username=<?php echo $username?>" method="POST">
                <div class="mb-3 ms-3 me-3">
                    <p>We've sent you an OTP via email. Please check your inbox.</p>

                    <input autocomplete='off' type="number" name="otp" class="form-control" id="accountID" aria-describedby="emailHelp">
                    <div id="emailHelp"  class="form-text">We'll never share your private account with anyone else.</div>
                  </div>
                <div class="mb-3 ms-3 me-3">

                  
                    
                  <div class="login d-flex">
                    <button class="resetpass-btn w-100">CONFIRM</button>
                  </div>
            </form>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="js/main.js"></script>
</html>