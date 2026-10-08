<?php

$conn = mysqli_connect('localhost', 'root', '', 'machino');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $message = $_POST['message'];
    $status = $_POST['status'];

    $sql = "INSERT INTO testimonials
            (name, designation, message, status)
            VALUES
            ('$name', '$designation', '$message', '$status')";

    if (mysqli_query($conn, $sql)) {

        header("Location: testimonials.php?success=1");
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

            <h1>Add New Testimonial</h1>

            <p>
                Add a client testimonial for your website.
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
                    placeholder="Enter client name"
                    required
                >

            </div>


            <!-- Designation -->

            <div class="form-group">

                <label>Designation</label>

                <input
                    type="text"
                    name="designation"
                    placeholder="Example: Project Manager, ABC Industries"
                    required
                >

            </div>


            <!-- Message -->

            <div class="form-group">

                <label>Testimonial Message</label>

                <textarea
                    name="message"
                    rows="6"
                    placeholder="Enter client testimonial"
                    required
                ></textarea>

            </div>


            <!-- Status -->

            <div class="form-group">

                <label>Status</label>

                <select name="status">

                    <option value="1">
                        Active
                    </option>

                    <option value="0">
                        Inactive
                    </option>

                </select>

            </div>


            <!-- Submit -->

            <button
                type="submit"
                class="save-service-btn"
            >

                <i class="fa-solid fa-plus"></i>

                Add Testimonial

            </button>


        </form>

    </div>

</div>


<?php include 'includes/footer.php'; ?>
