<?php

$conn=mysqli_connect('localhost','root','','machino');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];
    $status = $_POST['status'];

    // Image upload
    $image = "";

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $imageName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];

        $image = time() . "_" . $imageName;

        move_uploaded_file(
            $tmpName,
            "../uploads/services/" . $image
        );
    }

    $sql = "INSERT INTO services
            (title, short_description, description, image, icon, status)
            VALUES
            ('$title', '$short_description', '$description', '$image', '$icon', '$status')";

    if (mysqli_query($conn, $sql)) {

        header("Location: services.php?success=1");
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

            <h1>Add New Service</h1>

            <p>
                Create a new service for your website.
            </p>
        </div>

        <a href="services.php" class="back-btn">
            <i class="fa-solid fa-arrow-left"></i>
            Back
        </a>

    </div>


    <div class="service-form-box">

        <form method="POST" enctype="multipart/form-data">


            <!-- Title -->

            <div class="form-group">

                <label>Service Title</label>

                <input
                    type="text"
                    name="title"
                    placeholder="Enter service title"
                    required
                >

            </div>


            <!-- Short Description -->

            <div class="form-group">

                <label>Short Description</label>

                <input
                    type="text"
                    name="short_description"
                    placeholder="Enter short description"
                    required
                >

            </div>


            <!-- Description -->

            <div class="form-group">

                <label>Description</label>

                <textarea
                    name="description"
                    rows="6"
                    placeholder="Enter complete service description"
                    required
                ></textarea>

            </div>


            <!-- Icon -->

            <div class="form-group">

                <label>Font Awesome Icon</label>

                <input
                    type="text"
                    name="icon"
                    placeholder="Example: fa-solid fa-gears"
                    required
                >

                <small>
                    Example: fa-solid fa-industry
                </small>

            </div>


            <!-- Image -->

            <div class="form-group">

                <label>Service Image</label>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                >

            </div>


            <!-- Status -->

            <div class="form-group">

                <label>Status</label>

                <select name="status">

                    <option value="active">
                        Active
                    </option>

                    <option value="inactive">
                        Inactive
                    </option>

                </select>

            </div>


            <!-- Submit -->

            <button type="submit" class="save-service-btn">

                <i class="fa-solid fa-plus"></i>

                Add Service

            </button>


        </form>

    </div>

</div>


<?php include 'includes/footer.php'; ?>
