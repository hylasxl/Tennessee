<?php

require "./dbconnect.php";
require "./utils.php";


$id = $_GET['id'];


$getdata = "SELECT * FROM account_providing_request where id = '$id'";
$getdata = $conn->query($getdata);
$data = $getdata->fetch_assoc();
$email = $data['email'];
$name = $data["first_name"] . $data["last_name"];
$name = strtolower(stripVN($name));
$type = $data['type'];
if($data["status"] == "pending"){
    echo "<p>Account for $data[first_name] $data[last_name]</p>";
    
    $username = $data["first_name"] . $data["last_name"] . rand(10000000, 99999999);
    
    $username = strtolower(stripVN($username));
    
    $checkForDuplicate = $conn->query("SELECT * FROM account where username = '$username'");

    while($checkForDuplicate->num_rows != 0){
        $username = $data["first_name"] . $data["last_name"] . rand(10000000, 99999999);
    }
        echo "Username: $username<br>";
        $password = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 15);
        echo "Password: $password";
        $hashed_password = md5($password);
        $lastID = $conn->query("SELECT max(account_id) from account");
        $lastID = $lastID->fetch_assoc();
        $lastID = $lastID['max(account_id)'] +1;
        $createAcc = $conn->query("INSERT INTO account (account_id,username,password,account_type) VALUES ('$lastID','$username','$hashed_password','$type')");
        $setStatus = $conn->query("UPDATE  account_providing_request set status = 'approved' where id = $id");
        $createAccountInfo = $conn->query("INSERT INTO account_info(account_id,first_name,last_name,date_of_birth,gender,phone,address,email) VALUES ('$lastID','$data[first_name]','$data[last_name]','$data[dateofbirth]','$data[gender]',$data[phone],' ','$data[email]')");
        header("location: ../sendmail.php?username=$username&password=$password&email=$email&name=$name");
}
?>