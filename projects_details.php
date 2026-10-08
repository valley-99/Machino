<?php

include "config.php";


/* ID check */

if (!isset($_GET['id'])) {
    header("Location: projects.php");
    exit;
}

$id = (int) $_GET['id'];


/* Project fetch */

$sql = "SELECT * FROM projects
        WHERE id = $id
        AND status = 'active'";

$result = mysqli_query($conn, $sql);

$project = mysqli_fetch_assoc($result);


if (!$project) {
    header("Location: projects.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($project['title']); ?>
    </title>


    <link rel="stylesheet" href="css/project_details.css">

    <link rel="stylesheet" href="fonts/fontawesome/css/all.min.css">

</head>


<body>


    <!-- PROJECT DETAILS -->

    <section class="project-details">

        <div class="project-details-container">


            <!-- IMAGE -->

            <div class="project-details-image">

                <?php if (!empty($project['image'])) { ?>

                    <img
                        src="uploads/projects/<?= htmlspecialchars($project['image']); ?>"
                        alt="<?= htmlspecialchars($project['title']); ?>">

                <?php } ?>

            </div>



            <!-- CONTENT -->

            <div class="project-details-content">

                <span class="project-details-category">

                    <?= htmlspecialchars($project['category']); ?>

                </span>


                <h1>

                    <?= htmlspecialchars($project['title']); ?>

                </h1>


                <p class="project-short-description">

                    <?= htmlspecialchars($project['short_description']); ?>

                </p>


                <div class="project-description">

                    <?= nl2br(
                        htmlspecialchars($project['description'])
                    ); ?>

                </div>


                <a
                    href="projects.php"
                    class="back-project-btn">

                    <i class="fa-solid fa-arrow-left"></i>

                    Back to Projects

                </a>

            </div>


        </div>

    </section>


</body>

</html>