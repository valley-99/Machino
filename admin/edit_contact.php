<?php

$conn=mysqli_connect('localhost','root','','machino');


if (!isset($_GET['id'])) {

    header("Location: contact_message.php");
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM contact_messages
        WHERE id = '$id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if (!$row) {

    echo "Message not found.";
    exit;
}
?>
<?php include 'includes/header.php'; ?>






<div class="edit-contact-page">

    <h1>Edit Contact Message</h1>


    <form action="update_contact.php" method="POST">

        <input
            type="hidden"
            name="id"
            value="<?= $row['id']; ?>"
        >


        <label>Name</label>

        <input
            type="text"
            name="name"
            value="<?= htmlspecialchars($row['name']); ?>"
        >


        <label>Email</label>

        <input
            type="email"
            name="email"
            value="<?= htmlspecialchars($row['email']); ?>"
        >


        <label>Phone</label>

        <input
            type="text"
            name="phone"
            value="<?= htmlspecialchars($row['phone']); ?>"
        >


        <label>Company</label>

        <input
            type="text"
            name="company"
            value="<?= htmlspecialchars($row['company']); ?>"
        >


        <label>Service</label>

        <input
            type="text"
            name="service"
            value="<?= htmlspecialchars($row['service']); ?>"
        >


        <label>Message</label>

        <textarea
            name="message"
            rows="6"
        ><?= htmlspecialchars($row['message']); ?></textarea>

<div class="edit-buttons">

    <button type="submit" class="update-btn">
    <i class="fa-solid fa-rotate"></i>
        UPDATE MESSAGE
    </button>

    <a
        href="contact_message.php"
        class="cancel-btn"
    >
        <i class="fa-solid fa-arrow-left"></i>
        CANCEL
    </a>

</div>
       

    </form>

</div>



<?php include 'includes/footer.php'; ?>
