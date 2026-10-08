<?php
 
$conn=mysqli_connect('localhost','root','','machino');

$sql = "SELECT * FROM services ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

?>
<?php include 'includes/header.php'; ?>

<link href="css/backdashboard.css" rel="stylesheet">


<div class="services-admin">

    <div class="services-header">

        <div>
            <span>ADMIN PANEL</span>

            <h1>Manage Services</h1>

            <p>Manage all services from here.</p>
        </div>

        <a href="add_service.php" class="add-service-btn">
            <i class="fa-solid fa-plus"></i>
            Add Service
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
                    <th>Image</th>
                    <th>Service</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>


            <tbody>

                <?php if (mysqli_num_rows($result) > 0) { ?>

                    <?php while ($service = mysqli_fetch_assoc($result)) { ?>

                        <tr>

                            <td>
                                <?= $service['id']; ?>
                            </td>


                            <td>

                                <?php if (!empty($service['image'])) { ?>

                                    <img
                                        src="../uploads/services/<?= htmlspecialchars($service['image']); ?>"
                                        class="service-admin-image"
                                    >

                                <?php } else { ?>

                                    <span>No Image</span>

                                <?php } ?>

                            </td>


                            <td>

                                <strong>
                                    <?= htmlspecialchars($service['title']); ?>
                                </strong>

                                <p>
                                    <?= htmlspecialchars($service['short_description']); ?>
                                </p>

                            </td>


                            <td>

                                <i class="<?= htmlspecialchars($service['icon']); ?>"></i>

                            </td>


                            <td>

                                <?php if ($service['status'] == 'active') { ?>

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
                                    href="edit_service.php?id=<?= $service['id']; ?>"
                                    class="edit-btn"
                                >
                                    <i class="fa-solid fa-pen"></i>
                                    Edit
                                </a>


                                <a
                                    href="delete_service.php?id=<?= $service['id']; ?>"
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

                        <td colspan="6">
                            No services found.
                        </td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>


<?php include 'includes/footer.php'; ?>
