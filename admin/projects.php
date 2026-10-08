<?php

$conn = mysqli_connect('localhost', 'root', '', 'machino');

$sql = "SELECT * FROM projects ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

?>
<?php include 'includes/header.php'; ?>

<link href="css/backdashboard.css" rel="stylesheet">


    <div class="services-admin">

        <!-- HEADER -->

        <div class="services-header">

            <div>

                <span>ADMIN PANEL</span>

                <h1>Manage Projects</h1>

                <p>Manage all projects from here.</p>

            </div>


            <a href="add_project.php" class="add-service-btn">

                <i class="fa-solid fa-plus"></i>

                Add Project

            </a>
            <a href="dashboard.php" class="back-dashboard">
                ← Back to Dashboard
            </a>

        </div>


        <!-- TABLE -->

        <div class="services-table-box">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Image</th>

                        <th>Project</th>

                        <th>Category</th>

                        <th>Status</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                    <?php if (mysqli_num_rows($result) > 0) { ?>


                        <?php while ($project = mysqli_fetch_assoc($result)) { ?>

                            <tr>

                                <!-- ID -->

                                <td>
                                    <?= $project['id']; ?>
                                </td>


                                <!-- IMAGE -->

                                <td>

                                    <?php if (!empty($project['image'])) { ?>

                                        <img
                                            src="../uploads/projects/<?= htmlspecialchars($project['image']); ?>"
                                            class="service-admin-image"
                                            alt="<?= htmlspecialchars($project['title']); ?>">

                                    <?php } else { ?>

                                        <span>No Image</span>

                                    <?php } ?>

                                </td>


                                <!-- PROJECT -->

                                <td>

                                    <strong>
                                        <?= htmlspecialchars($project['title']); ?>
                                    </strong>

                                    <p>
                                        <?= htmlspecialchars($project['short_description']); ?>
                                    </p>

                                </td>


                                <!-- CATEGORY -->

                                <td>

                                    <?= htmlspecialchars($project['category']); ?>

                                </td>


                                <!-- STATUS -->

                                <td>

                                    <?php if ($project['status'] == 'active') { ?>

                                        <span class="status-active">
                                            Active
                                        </span>

                                    <?php } else { ?>

                                        <span class="status-inactive">
                                            Inactive
                                        </span>

                                    <?php } ?>

                                </td>


                                <!-- ACTION -->

                                <td class="service-actions">

                                    <a
                                        href="edit_project.php?id=<?= $project['id']; ?>"
                                        class="edit-btn">

                                        <i class="fa-solid fa-pen"></i>

                                        Edit

                                    </a>


                                    <a
                                        href="delete_project.php?id=<?= $project['id']; ?>"
                                        class="delete-btn">

                                        <i class="fa-solid fa-trash"></i>

                                        Delete

                                    </a>

                                </td>

                            </tr>

                        <?php } ?>


                    <?php } else { ?>

                        <tr>

                            <td colspan="6">

                                No projects found.

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>


<?php include 'includes/footer.php'; ?>
