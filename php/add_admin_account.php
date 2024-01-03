<?php

require "./dbconnect.php";
require "./utils.php";


$email = $_GET['email'];
$phone = $_GET['phone'];
$first_name = $_GET['firstname'];
$last_name = $_GET['lastname'];
$dateofbirth = $_GET['dateofbirth'];
$gender = $_GET['gender'];
$type = $_GET['type'];

    echo "<p>Account for $first_name $last_name</p>";
    
    $username = $first_name . $last_name . rand(10000000, 99999999);
    
    $username = strtolower(stripVN($username));
    
    $checkForDuplicate = $conn->query("SELECT * FROM account where username = '$username'");

    while($checkForDuplicate->num_rows != 0){
        $username = $first_name . $last_name. rand(10000000, 99999999);
    }
        $id = $conn->query("SELECT max(account_id) FROM account");
        $id = $id->fetch_assoc();
        $id = $id['max(account_id)'] + 1;
        echo "Username: $username<br>";
        $password = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 15);
        echo "Password: $password";
        $hashed_password = md5($password);
        $createAcc = $conn->query("INSERT INTO account (account_id,username,password,account_type) VALUES ('$id','$username','$hashed_password','$type')");
        $createAccountInfo = $conn->query("INSERT INTO account_info(account_id,first_name,last_name,date_of_birth,gender,phone,address,email) VALUES ('$id','$first_name','$last_name','$dateofbirth','$gender',$phone,' ','$email')");
        $name=$first_name." ".$last_name;
        header("location: ../sendmail.php?username=$username&password=$password&email=$email&name=$name");

?>