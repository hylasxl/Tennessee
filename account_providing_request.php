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
    <link rel="stylesheet" href="./css/style_account.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="./lib/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" href="./lib/datetimepicker/build/jquery.datetimepicker.min.css">
</head>
<body>
    

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="mb-3">
            <label for="type" class="col-form-label">Type:</label>
            <input autocomplete='off' required readonly type="text" class="form-control" id="type">
          </div>
          <div class="mb-3">
            <label for="firstname" class="col-form-label">Firstname:</label>
            <input autocomplete='off' required type="text" class="form-control" id="firstname">
          </div>
          <div class="mb-3">
            <label for="lastname" class="col-form-label">Lastname:</label>
            <input autocomplete='off' required type="text" class="form-control" id="lastname">
          </div>
          <div class="mb-3">
            <label for="email" class="col-form-label">Email:</label>
            <input autocomplete='off' required type="email" class="form-control" id="email">
          </div>
          <div class="mb-3">
            <label for="phone" class="col-form-label">Phone:</label>
            <input autocomplete='off' required type="number" class="form-control" id="phone">
          </div>
          <div class="mb-3">
            <label for="gender" class="col-form-label">Gender:</label>
            <select class='form-control' id='gender' required>
                <option value='O' selected>Other</option>
                <option value='F' >Female</option>
                <option value='M'>Male</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="dateofbirth" class="col-form-label">Date of Birth:</label>
            <input autocomplete='off' required type="text" class="form-control" id="dateofbirth">
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id='send_request' onclick="
        firstname = $('#firstname').val().trim();
        lastname = $('#lastname').val().trim();
        email = $('#email').val().trim();
        phone = $('#phone').val().trim();
        gender = $('#gender').val().trim();
        dateofbirth = $('#dateofbirth').val().trim();
        atype = $('#type').val().trim();
        
        if(firstname==''||lastname==''||email==''||phone==''||gender==''||dateofbirth==''){

        } else window.location.replace(`./php/add_admin_account.php?firstname=${firstname}&lastname=${lastname}&email=${email}&phone=${phone}&gender=${gender}&dateofbirth=${dateofbirth}&type=${atype}`);
        
        ">Save</button>
      </div>

    </div>
  </div>
</div> 





    <div class="container-fluid main-content-container d-flex flex-row ">

        <div class="sidebar d-flex flex-column position-fixed">
            <div class="avatar d-flex justify-content-center align-items-center mt-3">
                <img src="./assets//user_profile_img/360_F_549983970_bRCkYfk0P6PP5fKbMhZMIb07mCJ6esXL.jpg" alt="" class="user_avatar">
                
                <div class="ms-3 d-flex flex-column">
                    <div class="avatar-name name-and-role">
                    <?php
                    require "./php/dbconnect.php";
                    $account_id = $_SESSION["LoginAccountID"];
                    $GetInfo_SQL = "SELECT * FROM account_info WHERE account_id = '$account_id'";
                    $GetInfo = $conn->query($GetInfo_SQL);
                    $GetInfo = $GetInfo->fetch_assoc();
                    $firstname  = $GetInfo["first_name"];
                    $lastname = $GetInfo["last_name"];

                    echo $firstname." ".$lastname;
                    ?>
                    </div>
                    <div class="avatar-role name-and-role">
                    <?php
                    require "./php/dbconnect.php";
                    

                    $account_type = $_SESSION["AccountType"];
                    $GetAccountType_SQL = "SELECT * FROM account_type  WHERE id = '$account_type' ";
                    $GetAccountType = $conn->query($GetAccountType_SQL);
                    $GetAccountType = $GetAccountType->fetch_assoc();
                    $account_type = $GetAccountType['name'];

                    echo $account_type;
                    $conn->close();
                ?>
                    </div>
                </div>
            </div>
            <?php
                    
                    if(isset($_GET['emailsent'])){
                        
                    }

                ?>
            <div class="sidebar-topic d-flex flex-column ps-3 mt-5">
            <div class="tag-group">
                        <i  class="fa-solid fa-house me-2" style="color: #ffffff;"></i>
                        <a href="index.php" class="active-tag">Home</a>
                    </div>

                    <p class="tag-department mt-3 mb-3">ACCOUNT MANAGEMENT</p>

                    <div class="tag-group">
                        <i  class="fa-solid fa-user-tie me-2" style="color: #ffffff;"></i>
                        <a href="./account_page.php" class="">Account</a>
                    </div>

                    <p class="tag-department mt-3 mb-3 ofstudent d-none fs-5">STUDENT</p>

                    <div class="tag-group ofstudent d-none">
                        <i  class="fa-solid fa-calendar me-2" style="color: #ffffff;"></i>
                        <a href="./student_calendar.php" class="">Calendar</a>
                    </div>

                    <div class="tag-group ofstudent d-none mt-3 ">
                        <i  class="fa-solid fa-person-chalkboard me-2" style="color: #ffffff;"></i>
                        <a href="./student_course.php" class="" >Courses</a>
                    </div>

                    <p class="tag-department mt-3 mb-3 ofteacher d-none fs-5">TEACHER</p>

                    <div class="tag-group ofteacher d-none">
                        <i  class="fa-solid fa-calendar me-2" style="color: #ffffff;"></i>
                        <a href="./teacher_classes.php" class="">Classes</a>
                    </div>

                    <div class="tag-group ofteacher d-none mt-3">
                        <i class="fa-solid fa-hourglass-start me-2" style="color: #ffffff;"></i>
                        <a href="./teaching_schedule.php" class="">Teaching Schedule</a>
                    </div>

                    <p class="tag-department mt-3 mb-3 ofedu d-none fs-5">EDUCATIONAL AFFAIR</p>

                    <div class="tag-group ofedu d-none">
                        <i class="fa-solid fa-pen-nib me-2" style="color: #ffffff;"></i>
                        <a href="./course_management.php" class="">Courses</a>
                    </div>

                    <div class="tag-group ofedu d-none mt-3">
                        <i class="fa-solid fa-file-circle-plus me-2" style="color: #ffffff;"></i>
                        <a href="./add_new_course.php" class="">Add a new course</a>
                    </div>

                    <div class="tag-group ofedu d-none mt-3">
                        <i class="fa-solid fa-person-booth me-2" style="color: #ffffff;"></i>
                        <a href="./room.php" class="">Rooms</a>
                    </div>

                    
                    <div class="tag-group ofedu d-none mt-3">
                        <i class="fa-solid fa-calendar-day me-2" style="color: #ffffff;"></i>
                        <a href="../event.php" class="">Events</a>
                    </div>
                    <div class="tag-group ofedu d-none mt-3">
                        <i class="fa-solid fa-table-list me-2" style="color: #ffffff;"></i>
                        <a href="./absence_request.php" class="">Absence Request</a>
                    </div>


                    <p class="tag-department mt-3 mb-3 ofadmin d-none fs-5">Admin</p>

                    <div class="tag-group ofedu d-none mt-3">
                        <i class="fa-solid fa-chalkboard-user me-2" style="color: #ffffff;"></i>
                        <a href="./teacher_management.php" class="">Teachers</a>
                    </div>

                    <div class="tag-group ofedu d-none mt-3">
                        <i class="fa-solid fa-graduation-cap me-2" style="color: #ffffff;"></i>
                        <a href="./student_management.php" class="">Students</a>
                    </div>

                    <div class="tag-group ofadmin d-none mt-3">
                        <i class="fa-solid fa-user me-2" style="color: #ffffff;"></i>
                        <a href="./account_management.php" class="">Accounts</a>
                    </div>

                    
                    <div class="tag-group ofadmin d-none mt-3">
                        <i class="fa-solid fa-user-plus me-2" style="color: #ffffff;"></i>
                        <a href="./account_providing_request.php " class="" style="opacity: 1; text-decoration: underline;">Account providing request</a>
                    </div>

                    <hr class="w-100 ms-0 ps-0 mt-2" >

                    <div class="d-flex flex-row mt-2 justify-content-end me-3">
                        <a href="./php/logout.php"><i class="fa-solid fa-right-to-bracket fa-xl text-white-50"></i></a>
                                        <a href="./php/logout.php" class="text-white-50 text-decoration-none login-tag d-none d-md-inline ms-2">Sign out</a>
                    </div>
            </div>
        </div>

        <div class="content" style="width: 95% !important; padding-left: 230px !important;">
            
        <div class="title-content w-100 d-flex justify-content-center fs-3 fw-bold mb-2" style='margin-top: 15px !important;'>
                Requests

                <div class='d-flex'>
                    <button style='width: 250px; height: 40px; margin-left: 500px;  font-size: 1rem; border: none; outline: none; color: white; background-color: #11772d;' data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever='3'>+Add new Educational Affair</button>
                    <button style='width: 180px; height: 40px; margin-left: 50px;  font-size: 1rem; border: none; outline: none; color: white; background-color: #d31245;' data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever='1'>+Add new ADMIN</button>
                </div>
        </div>
            <hr>

            <div class="filter-container ps-4 pt-4 d-flex flex-row align-items-center mb-4 ">
                <p class="fw-bold me-3 fs-4">Filter:</p>
                <div class="filter-group ms-3 d-flex flex-row">
                    <p class="me-4">Status of Requests</p>
                    <select name="status" id="" style="width: 150px;" onchange="
                    $('.data-query').load('./php/account_provide_filter.php',{
                        status : this.value
                    });
                    
                    ">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <!-- <option value="rejected">Rejected</option> -->
                    </select>
                </div>
            </div>

            <hr>

            <div class="requests-row container w-100 justify-content-center ms-3 me-3">
                <div class="row mt-2">
                    <div style="background-color: #1a2d59; color: white;" class="col col-1  text-center border border-2 " >ID</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-2 text-center border border-2 ">Full name</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-3 text-center border border-2 ">Email</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">Phone</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">Date of birth</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">Gender</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">Status</div>
                    <div style="background-color: #1a2d59; color: white;" class="col col-1 text-center border border-2 ">Type</div>
                    <div style="background-color: #1a2d59; color: white;" class="col  col-1 text-center border border-2 ">Action</div>
                </div>
                <div class="data-query">

                
                <?php
                require "./php/dbconnect.php";
                $getRequest = "SELECT * FROM account_providing_request where status = 'pending';";

                $getRequest = $conn->query($getRequest);
                if($getRequest->num_rows < 1){
                    echo "<p class='ms-5 mt-3'>No recorded data.</p>";
                }
                $gender = "O";
                while ($row = $getRequest ->fetch_assoc()){
                    if($row["gender"] == "F"){
                        $gender = "Female";
                    } else if ($row["gender"] == "M"){
                        $gender = "Male";
                    } else if ($row["gender"] == "O"){
                        $gender = "Other";
                    }
                    $status = ucwords($row["status"]);
                    echo ("<div class=\"row mt-2 border border-top-0 border-start-0 border-end-0 pb-2 border-bottom-1\">
                    <div class=\"col text-center col-1 \">$row[id]</div>
                    <div class=\"col text-center col-2 \">$row[first_name] $row[last_name]</div>
                    <div class=\"col text-center col-3 \">$row[email]</div>
                    <div class=\"col text-center col-1 \">0$row[phone]</div>
                    <div class=\"col text-center col-1 \">$row[dateofbirth]</div>
                    <div class=\"col text-center col-1  \">$gender</div>
                    
                    <div class=\"col text-center col-1  \">$status</div>
                    <div class=\"col text-center col-1  \">$row[type]</div>
                    <div class=\"col text-center col-1\">             
                                <button
                                 style=\"width: 100%;background-color: #1a2d59; border: none; height: 30px; \" class=\"button-submit-acc\" id=\"$row[id]\" name=\"\"><a  style=\" color: white; text-decoration: none;\">Approve</a></button>
                    </div>
                </div>");
                }
                ?>
                </div>
            </div>


        </div>
    </div>
    

    <div class="nothing"></div>
    <script src="./js/account_create.js"></script>
    <script src="./lib/datetimepicker/jquery.js"></script>

    <script src="./lib/datetimepicker/build/jquery.datetimepicker.min.js"></script>
    <script src="./lib/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
    <script src="./lib/datetimepicker/build/jquery.datetimepicker.full.js"></script>
    <script src="./lib/datetimepicker/jquery.datetimepicker.js"></script>
    <script src="./js/timepicker.js"></script>
    <script src="./js/timepicker.js"></script>

</body>
<script src="https://kit.fontawesome.com/c0b68942f0.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="./js/account.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</html>
<?php
    require "php/buttonView.php";
    
                    
    
                    
    if(isset($_GET['emailsent'])){
        $state = $_GET['emailsent'];
        if($state == 1){
            echo "<script  type=\"text/javascript\">
                Toastify({
                    text: \"Email Sent Successfully\",
                    className: \"info\",
                    style: {
                    background: \"linear-gradient(to right, #00b09b, #96c93d)\",
                    }
                }).showToast();
                </script>";
            // header("Refresh: 1; url=account_providing_request.php"); 
        } else if($state -1){
            echo "<script  type=\"text/javascript\">
                Toastify({
                    text: \"There is an error when sending email\",
                    className: \"info\",
                    style: {
                    background: \"#d31245\",
                    }
                }).showToast();
                </script>";
            // header("Refresh: 1; url=account_providing_request.php"); 

        }
    }

?>

?>