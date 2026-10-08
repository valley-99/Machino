<?php

$conn = mysqli_connect('localhost', 'root', '', 'machino');
if (!isset($_GET['id'])) {
    header("Location: services.php");
    exit;
}

$id = $_GET['id'];

/* Service fetch */
$sql = "SELECT * FROM services WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

$service = mysqli_fetch_assoc($result);

if (!$service) {
    header("Location: services.php");
    exit;
}


/* Delete after confirmation */
if (isset($_POST['confirm_delete'])) {

    $delete = "DELETE FROM services WHERE id = '$id'";

    if (mysqli_query($conn, $delete)) {

        /* Delete image from uploads folder */
        if (!empty($service['image'])) {

            $imagePath = "../uploads/services/" . $service['image'];

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        header("Location: services.php?deleted=1");
        exit;

    } else {

        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Delete Service</title>

    <link rel="stylesheet" href="css/admin.css">

</head>

<body>

<div class="delete-page">

    <div class="delete-box">

        <div class="delete-icon">
            ⚠
        </div>

        <h1>Are you sure?</h1>

        <p>
            Do you really want to delete
            <strong>
                <?= htmlspecialchars($service['title']); ?>
            </strong>
            ?
        </p>

        <p class="warning-text">
            This action cannot be undone.
        </p>


        <div class="delete-actions">

            <!-- Confirm Delete -->

            <form method="POST">

                <button
                    type="submit"
                    name="confirm_delete"
                    class="confirm-delete-btn"
                >
                    Yes, Delete
                </button>

            </form>


            <!-- Back -->

            <a
                href="services.php"
                class="cancel-delete-btn"
            >
                Back
            </a>

        </div>

    </div>

</div>

</body>

</html>