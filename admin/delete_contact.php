
<?php

$conn = mysqli_connect('localhost', 'root', '', 'machino');

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM contact_messages
            WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {

        header("Location: contact_message.php");

        exit;
    } else {

        echo "Delete failed: "
            . mysqli_error($conn);
    }
} else {

    header("Location: contact_message.php");

    exit;
}
