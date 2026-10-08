<?php


$conn = mysqli_connect("localhost", "root", "", "machino");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM industries ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

?>
<?php include 'includes/header.php'; ?>




<div class="services-admin">

    <!-- HEADER -->

    <div class="services-header">

        <div>

            <span>ADMIN PANEL</span>

            <h1>Manage Industries</h1>

            <p>Manage all industries from here.</p>

        </div>


        <a href="add_industry.php" class="add-service-btn">

            <i class="fa-solid fa-plus"></i>

            Add Industry

        </a>

    </div>


    <!-- TABLE -->

    <div class="services-table-box">

        <table>

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Image</th>

                    <th>Industry</th>

                    <th>Status</th>

                    <th>Action</th>

                </tr>

            </thead>


            <tbody>

                <?php if (mysqli_num_rows($result) > 0) { ?>

                    <?php while ($industry = mysqli_fetch_assoc($result)) { ?>

                        <tr>

                            <!-- ID -->

                            <td>
                                <?= $industry['id']; ?>
                            </td>


                            <!-- IMAGE -->

                            <td>

                                <?php if (!empty($industry['image'])) { ?>

                                    <img
                                        src="../uploads/industries/<?= htmlspecialchars($industry['image']); ?>"
                                        class="service-admin-image"
                                        alt="<?= htmlspecialchars($industry['title']); ?>"
                                    >

                                <?php } else { ?>

                                    <span>No Image</span>

                                <?php } ?>

                            </td>


                            <!-- INDUSTRY -->

                            <td>

                                <strong>
                                    <?= htmlspecialchars($industry['title']); ?>
                                </strong>

                                <p>
                                    <?= htmlspecialchars($industry['short_description']); ?>
                                </p>

                            </td>


                            <!-- STATUS -->

                            <td>

                                <?php if ($industry['status'] == 'active') { ?>

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
                                    href="edit_industry.php?id=<?= $industry['id']; ?>"
                                    class="edit-btn"
                                >

                                    <i class="fa-solid fa-pen"></i>

                                    Edit

                                </a>


                                <a
                                    href="delete_industry.php?id=<?= $industry['id']; ?>"
                                    class="delete-btn"
                                >

                                    <i class="fa-solid fa-trash"></i>

                                    Delete

                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                <?php } else { ?>

                    <tr>

                        <td colspan="5">
                            No industries found.
                        </td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>


<?php include 'includes/footer.php'; ?>
