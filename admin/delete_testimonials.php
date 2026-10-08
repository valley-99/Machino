<?php

$conn = mysqli_connect('localhost', 'root', '', 'machino');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_GET['id'])) {
    header("Location: testimonials.php");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM testimonials WHERE id = $id";

if (mysqli_query($conn, $sql)) {

    header("Location: testimonials.php?deleted=1");
    exit;

} else {

    echo "Error: " . mysqli_error($conn);

}

?>