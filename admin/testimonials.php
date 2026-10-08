<?php



$conn = mysqli_connect('localhost', 'root', '', 'machino');

$sql = "SELECT * FROM testimonials ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

?>
<?php include 'includes/header.php'; ?>
<link href="css/backdashboard.css" rel="stylesheet">



    <div class="services-admin">

        <div class="services-header">

            <div>

                <span>ADMIN PANEL</span>

                <h1>Manage Testimonials</h1>

                <p>Manage client testimonials from here.</p>

            </div>

            <a href="add_testimonials.php" class="add-service-btn">

                <i class="fa-solid fa-plus"></i>

                Add Testimonial

            </a>
            <a href="dashboard.php" class="back-dashboard">
                ← Back to Dashboard
            </a>

        </div>


        <div class="services-table-box">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Client Name</th>

                        <th>Designation</th>

                        <th>Message</th>

                        <th>Status</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                    <?php if (mysqli_num_rows($result) > 0) { ?>

                        <?php while ($testimonial = mysqli_fetch_assoc($result)) { ?>

                            <tr>

                                <td>
                                    <?= $testimonial['id']; ?>
                                </td>


                                <td>

                                    <strong>
                                        <?= htmlspecialchars($testimonial['name']); ?>
                                    </strong>

                                </td>


                                <td>
                                    <?= htmlspecialchars($testimonial['designation']); ?>
                                </td>


                                <td>

                                    <?= htmlspecialchars($testimonial['message']); ?>

                                </td>


                                <td>

                                    <?php if ($testimonial['status'] == 1) { ?>

                                        <span class="status-active">
                                            Active
                                        </span>

                                    <?php } else { ?>

                                        <span class="status-inactive">
                                            Inactive
                                        </span>

                                    <?php } ?>

                                </td>


                                <td class="service-actions">

                                    <a
                                        href="edit_testimonials.php?id=<?= $testimonial['id']; ?>"
                                        class="edit-btn">

                                        <i class="fa-solid fa-pen"></i>

                                        Edit

                                    </a>


                                    <a href="delete_testimonials.php?id=<?= $testimonial['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this testimonial?');">
                                        <i class="fa-solid fa-trash"></i>
                                        Delete
                                    </a>
                                </td>

                            </tr>

                        <?php } ?>

                    <?php } else { ?>

                        <tr>

                            <td colspan="6">
                                No testimonials found.
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>


<?php include 'includes/footer.php'; ?>
