<?php
$conn=mysqli_connect('localhost','root','','machino');
$sql = "SELECT * FROM contact_messages ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<?php include 'includes/header.php'; ?>

<div class="contact-page">
    <div class="page-header">
        <div>
            <span>ADMIN PANEL</span>
            <h1>Contact Messages</h1>
            <p>Manage enquiries received from your website.</p>
        </div>
    </div>
    
    <div class="message-table-box">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Service</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['phone']); ?></td>
                    <td><?= htmlspecialchars($row['company']); ?></td>
                    <td><span class="service-badge"><?= htmlspecialchars($row['service']); ?></span></td>
                    <td class="message-cell"><?= htmlspecialchars($row['message']); ?></td>
                    <td><?= date("d M Y", strtotime($row['created_at'])); ?></td>
                    <td class="action-buttons">
                        <a href="edit_contact.php?id=<?= $row['id']; ?>" class="edit-btn">
                            <i class="fa-solid fa-pen"></i> Edit
                        </a>
                        <a href="delete_contact.php?id=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this message?');">
                            <i class="fa-solid fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php }
            } else { ?>
                <tr>
                    <td colspan="9" class="no-message">No contact messages found.</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
