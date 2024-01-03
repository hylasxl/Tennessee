<?
session_start();

include ("./dbconnect.php");
include ("./utils.php");

$type = $_POST['type'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dateofBirth = $_POST['dateofBirth'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
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
    header("location: ../sendmail.php?username=$username&password=$password&email=$email&name=$name ");
    


?>