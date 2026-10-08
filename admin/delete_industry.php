<?php

$conn = mysqli_connect("localhost", "root", "", "machino");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}



/* ID check */

if (!isset($_GET['id'])) {
    header("Location: industries.php");
    exit;
}

$id = (int) $_GET['id'];


/* Industry fetch */

$sql = "SELECT * FROM industries WHERE id = $id";

$result = mysqli_query($conn, $sql);

$industry = mysqli_fetch_assoc($result);


if (!$industry) {
    header("Location: industries.php");
    exit;
}


/* Confirm Delete */

if (isset($_POST['confirm_delete'])) {

    /* Delete database record */

    $deleteSql = "DELETE FROM industries WHERE id = $id";

    if (mysqli_query($conn, $deleteSql)) {

        /* Delete image */

        if (!empty($industry['image'])) {

            $imagePath =
                "../uploads/industries/" .
                $industry['image'];

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        header("Location: industries.php?deleted=1");
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

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Delete Industry</title>

    <link
        rel="stylesheet"
        href="css/admin.css">

    <link rel="stylesheet" href="../fonts/fontawesome/css/all.min.css" >

</head>


<body>


<div class="delete-page">

    <div class="delete-box">

        <div class="delete-icon">

            <i class="fa-solid fa-triangle-exclamation"></i>

        </div>


        <h1>
            Are you sure?
        </h1>


        <p>

            Do you really want to delete

            <strong>
                <?= htmlspecialchars($industry['title']); ?>
            </strong>

            ?

        </p>


        <p class="warning-text">

            This action cannot be undone.

        </p>


        <div class="delete-actions">


            <!-- YES DELETE -->

            <form method="POST">

                <button
                    type="submit"
                    name="confirm_delete"
                    class="confirm-delete-btn"
                >

                    <i class="fa-solid fa-trash"></i>

                    Yes, Delete

                </button>

            </form>


            <!-- BACK -->

            <a
                href="industries.php"
                class="cancel-delete-btn"
            >

                <i class="fa-solid fa-arrow-left"></i>

                Back

            </a>


        </div>

    </div>

</div>


</body>

</html>