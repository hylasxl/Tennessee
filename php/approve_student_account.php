<?
session_start();

include ("./dbconnect.php");
include ("./utils.php");

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM student_account_providing_request WHERE ID = '$id'");
$data = $data->fetch_assoc();
$type = 4;
$firstName = $data['firstName'];
$lastName = $data['lastName'];
$dateofBirth = $data['dateofBirth'];
$gender = $data['gender'];
$phone = $data['phone'];
$email = $data['email'];
$address = $data['address'];
$createdBy = $_SESSION['LoginAccountID'];



    $maxID = $conn->query("SELECT max(ID) from account");
    $maxID = $maxID->fetch_assoc();
    $nextID = $maxID['max(ID)'] + 1;
    $name = $firstName." ".$lastName;
    $username = stripVN($firstName.$lastName.uniqid());
    $password = uniqid();
    $hashedPassword = md5($password);
    
    $conn->query("INSERT INTO account VALUE ('$nextID','$username','$hashedPassword','$type','accessible')");
    $conn->query("INSERT INTO account_info VALUE('$nextID','$nextID','$firstName','$lastName','$dateofBirth','$gender','$phone','$email','$address','0',now(),'$createdBy')");
    $conn->query("UPDATE student_account_providing_request SET status ='approved', approveBy = '$createdBy' WHERE ID = '$id'");
    header("location: ../sendmail.php?username=$username&password=$password&email=$email&name=$name ");
    


?>