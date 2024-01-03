<?php

    include ("./dbconnect.php");
    $eventID = $_POST['name'];
    $salutation = $_POST['salutation'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $hearfrom = $_POST['hearfrom'];
    $noofattend = $_POST['noofattend'];
    $moreinfo = $_POST['moreinfo'];

    $data = $conn->query("INSERT INTO tour_booking_request (createdAt, eventID, salutation, first_name, last_name, email, phone, country, address, hearfrom, numofattendance, moreinfo) VALUES (now(), '$eventID', '$salutation', '$first_name', '$last_name', '$email', '$phone', '$country', '$address', '$hearfrom', '$noofattend', '$moreinfo') ");
    $conn->query("UPDATE event SET no_enroll = no_enroll + 1 WHERE id = '$eventID'");
    
    header("location: ../booking.php?success=true");

?>