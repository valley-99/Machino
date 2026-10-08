<?php

$conn=mysqli_connect('localhost','root','','machino');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $service = $_POST['service'];
    $message = $_POST['message'];


    $sql = "UPDATE contact_messages SET

            name = '$name',
            email = '$email',
            phone = '$phone',
            company = '$company',
            service = '$service',
            message = '$message'

            WHERE id = '$id'";


    if (mysqli_query($conn, $sql)) {

        header("Location: contact_message.php");

        exit;

    } else {

        echo "Update failed: "
             . mysqli_error($conn);
    }
}