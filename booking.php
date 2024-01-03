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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
        if(isset($_GET['success'])){
            echo "<script  type=\"text/javascript\">
            Toastify({
                text: \"Sent Successfully\",
                className: \"info\",
                style: {
                  background: \"linear-gradient(to right, #00b09b, #96c93d)\",
                }
              }).showToast();
            </script>";
            header("Refresh: 1; url=booking.php");
        }

    ?>
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
            
            <a href="#" class="text-white text-decoration-none d-none d-md-block" >BOOKING TOUR</a>
            <a href="#" class="text-white text-decoration-none d-block d-md-none" >Booking tour</a>
            
        </div>
        <div class="login-button me-1 me-md-5  d-flex flex-row" data-toggle="tooltip" data-placement="bottom" title="For provided accounts">

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
        <img src="./assets/booktour.jpg" class="">
        <p class=" text-white text-in-main-picture position-absolute">BOOK A TOUR</p>
    </div>

    <div class="about1">
        <p class="title-about-1">BOOK A TOUR OF TENNESSEE LANGUAGE CENTER</p>
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-7">
                    <p class="about-desc text-color2 fw-bold">WEEKLY MONDAY TOURS</p>
                    <p class="about-desc">Guided by our approachable Principal, welcoming Registrar and informative Tour Guides, our weekly Monday Tours provide families with the opportunity to learn about College facilities, curriculum and programs, and speak to those with experience to share.</p>
                    <p class="about-desc">Book an in-person Monday tour via the drop-down link below.</p>
                    <p class="about-desc text-color2 fw-bold">INFORMATION EVENING FOR FUTURE FAMILIES</p>
                    <p class="about-desc">Our Future Families Information Evening will provide prospective parents and carers with an understanding of Salesian values and educational approach, and the opportunity to meet our Principal, Mark Ashmore, students, and Assistant Principals across all College areas.</p>
                    <p class="about-desc"><span style="font-weight: bold;">
                        DATE:&nbsp;
                    </span> Monday 31 July, 2023<br>
                    <span style="font-weight: bold;">
                        TIME:&nbsp;
                    </span>
                    6:45pm arrival for a 7:00pm start
                    </p>
                    <p class="about-desc">Register to attend via the drop-down link below.</p>
                </div>
                <div class="col col-12 col-md-5 d-flex justify-content-center">
                    <img src="./assets//salesiancollege-bookingtour.jpg" id="about-img" alt="">
                </div>
            </div>
        </div>
    </div>


    <div class="booktourtitle container d-flex flex-column justify-content-center align-items-center">
        <p class="book-tour-form-title text-color1 fw-bold">BOOK A TOUR ONLINE</p>
        <p class="about-desc"> Fill in the form below to book a tour at Salesian College. If you have any further enquiries regarding booking a tour or need assistance, please contact us.</p>
        
    </div>

    <hr>
    <!-- FORM -->
    <div class="book-form container align-self-center">
        <form action="./php/booktour_add.php" method = "POST">
            <p><span class="req" style="font-size: 12px;">*:required</span></p>
            <p class="group-label text-color1">Events Detail</p>
            <div class="floating-label">  
                <select name='name' class="floating-select mt-4 mb-4" required onclick="this.setAttribute('value', this.value);" value="">
                <option></option>
                  <?php
                    include ("./php/dbconnect.php");
                    $data = $conn->query("SELECT * FROM event where state ='visible' and status = 'pending'");
                    while($row = $data->fetch_assoc()){
                        $name = ucwords($row['name']);
                        echo "<option value='$row[id]'>$name - $row[time]</option>";
                    }
                  ?>
                </select>
                <label>Event Name and Date <span class="req">*</span></label>
            </div>

            <p class="group-label mt-3 text-color1">Primary Contact Details</p>


            <div class="container-fluid basic-info">
                <div class="row">
                    <div class="col col-12 col-md-2 mt-3 mb-3">
                        <div class="floating-label">  
                            <select name='salutation' class="floating-select" onclick="this.setAttribute('value', this.value);" value="">
                              <option value=""></option>
                              <option value="mr">Mr</option>
                              <option value="mrs">Mrs</option>
                              <option value="ms">Ms</option>
                              <option value="miss">Miss</option>
                              <option value="dr">Dr</option>
                              <option value="prof">Prof</option>
                              <option value="other">Other</option>
                            </select>
                            <label>Salutation</label>
                            
                        </div>
                    </div>
                    <div class="col col-12 col-md-5 mt-3 mb-3">
                        <div class="floating-label">      
                            <input autocomplete='off' name='first-name' class="floating-input" required type="text" placeholder=" ">
                            <label>First Name <span class="req">*</span></label>
                            
                        </div>
                    </div>
                    
                    <div class="col col-12 col-md-5 mt-3 mb-3">
                        <div class="floating-label">      
                            <input autocomplete='off' name='last-name' class="floating-input" required type="text" placeholder=" ">
                            <label>Last Name <span class="req">*</span></label>
                        </div>
                    </div>
                
                </div>
                <div class="row">
                   
                    <div class="col col-12 col-md-4 mt-3 mb-3">
                        <div class="floating-label">      
                            <input autocomplete='off' name='email' class="floating-input" required type="email" placeholder=" ">
                            <label>Email<span class="req">*</span></label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-4 mt-3">
                        <div class="floating-label">      
                            <input autocomplete='off' name='phone' class="floating-input" required type="number" placeholder=" ">
                            <label>Mobile Phone Number<span class="req">*</span></label>
                        </div>
                    </div>

                </div>
            </div>
              
            <p class="group-label mt-3 text-color1 mb-4">Primary Contact Address</p> 
            <div class="container-fluid basic-address">
                <div class="row mt-3">
                    <div class="col col-12 col-md-6">
                        <div class="floating-label">  
                            <select name='country' class="floating-select" onclick="this.setAttribute('value', this.value);" value="">
                                <option value=""></option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-bissau">Guinea-bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                <option value="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-leste">Timor-leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                            <label>Contact Country</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3 mb-3">
                        <div class="floating-label">      
                            <input autocomplete='off' name='address' class="floating-input"  type="text" placeholder=" ">
                            <label>Address</label>
                        </div>
                    </div>
                </div>
                
            </div>
              
            
            
            <div class="container-fluid form-footer-booking">
                <div class="row">
                    
                    <div class="col col-12 col-md-6 mb-3 mt-3">
                        <div class="floating-label">      
                            <input autocomplete='off' name='hearfrom' class="floating-input" required type="text" placeholder=" ">
                            <label>How did you hear about us? <span class="req">*</span></label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6 mb-3 mt-3">
                        <div class="floating-label">      
                            <input autocomplete='off' name='noofattend' class="floating-input" required type="number" placeholder=" ">
                            <label>Including yourself, how many will be attending.... <span class="req">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-12 mb-3 mt-3">
                        <div class="floating-label">      
                            <textarea name='moreinfo' class="floating-input floating-textarea" placeholder=" "></textarea>
                            <span class="highlight"></span>
                            <label>Please add any additiontal information or questions here:</label>
                          </div>
                    </div>
                </div>
            </div>

            <hr class="form-hr">

            <div class="container d-flex w-100 justify-content-end"><button type="submit" class="submit-btn">SUBMIT</button></div>
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

>
<script src="https://kit.fontawesome.com/c0b68942f0.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</html>
<?php
    require "php/buttonView.php";
?>