<?
    include ('./dbconnect.php');
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $dateofbirth = $_POST['dateofbirth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

   $conn->query("UPDATE account_info SET last_name = 
   '$lastname', first_name = '$firstname', date_of_birth = '$dateofbirth', phone = '$phone', email = '$email', gender = '$gender', address = '$address' where account_id = '$id' ");
   header("location: ../account_page.php");
?>