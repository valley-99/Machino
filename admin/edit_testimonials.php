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


/* Existing testimonial fetch */

$sql = "SELECT * FROM testimonials WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("Location: testimonials.php");
    exit;
}

$testimonial = mysqli_fetch_assoc($result);


/* Update testimonial */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $message = $_POST['message'];
    $status = $_POST['status'];

    $updateSql = "UPDATE testimonials SET
                    name = '$name',
                    designation = '$designation',
                    message = '$message',
                    status = '$status'
                  WHERE id = $id";

    if (mysqli_query($conn, $updateSql)) {

        header("Location: testimonials.php?updated=1");
        exit;

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}

?>
<?php include 'includes/header.php'; ?>




<div class="add-service-page">

    <div class="add-service-header">

        <div>

            <span>ADMIN PANEL</span>

            <h1>Edit Testimonial</h1>

            <p>
                Update client testimonial details.
            </p>

        </div>

        <a href="testimonials.php" class="back-btn">

            <i class="fa-solid fa-arrow-left"></i>

            Back

        </a>

    </div>


    <div class="service-form-box">

        <form method="POST">

            <!-- Client Name -->

            <div class="form-group">

                <label>Client Name</label>

                <input
                    type="text"
                    name="name"
                    value="<?= htmlspecialchars($testimonial['name']); ?>"
                    required
                >

            </div>


            <!-- Designation -->

            <div class="form-group">

                <label>Designation</label>

                <input
                    type="text"
                    name="designation"
                    value="<?= htmlspecialchars($testimonial['designation']); ?>"
                    required
                >

            </div>


            <!-- Message -->

            <div class="form-group">

                <label>Testimonial Message</label>

                <textarea
                    name="message"
                    rows="6"
                    required
                ><?= htmlspecialchars($testimonial['message']); ?></textarea>

            </div>


            <!-- Status -->

            <div class="form-group">

                <label>Status</label>

                <select name="status">

                    <option
                        value="1"
                        <?= $testimonial['status'] == 1 ? 'selected' : ''; ?>
                    >
                        Active
                    </option>

                    <option
                        value="0"
                        <?= $testimonial['status'] == 0 ? 'selected' : ''; ?>
                    >
                        Inactive
                    </option>

                </select>

            </div>


            <button
                type="submit"
                class="save-service-btn"
            >

                <i class="fa-solid fa-save"></i>

                Update Testimonial

            </button>

        </form>

    </div>

</div>


<?php include 'includes/footer.php'; ?>
