<?php
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $service = $_POST['service'];
    $message =$_POST['message'];
    $sql = "INSERT INTO contact_messages(name,email,phone,company,service,message) values ('$name','$email','$phone','$company','$service','$message')";
  if (mysqli_query($conn, $sql)) {
    header("Location: index.php?success=1");
    exit;
    }
    else{
        echo"error".mysqli_error($conn);
    }
}
