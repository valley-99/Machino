<?php

$conn=mysqli_connect('localhost','root','','machino');
if (!isset($_GET['id'])) {
    header("Location: services.php");
    exit;
}

$id = $_GET['id'];

/* Existing service fetch */
$sql = "SELECT * FROM services WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

$service = mysqli_fetch_assoc($result);

if (!$service) {
    header("Location: services.php");
    exit;
}


/* Update */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];
    $status = $_POST['status'];

    $image = $service['image'];


    /* New image upload */
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $imageName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];

        $newImage = time() . "_" . $imageName;

        move_uploaded_file(
            $tmpName,
            "../uploads/services/" . $newImage
        );

        $image = $newImage;
    }


    $update = "UPDATE services SET
                title = '$title',
                short_description = '$short_description',
                description = '$description',
                image = '$image',
                icon = '$icon',
                status = '$status'
               WHERE id = '$id'";


    if (mysqli_query($conn, $update)) {

        header("Location: services.php?updated=1");
        exit;

    } else {

        echo "Error: " . mysqli_error($conn);
    }
}

?>
<?php include 'includes/header.php'; ?>





<div class="add-service-page">


    <!-- HEADER -->

    <div class="add-service-header">

        <div>

            <span>ADMIN PANEL</span>

            <h1>Edit Service</h1>

            <p>
                Update your service information.
            </p>

        </div>


        <a href="services.php" class="back-btn">

            <i class="fa-solid fa-arrow-left"></i>

            Back

        </a>

    </div>



    <!-- FORM -->

    <div class="service-form-box">

        <form method="POST" enctype="multipart/form-data">


            <!-- TITLE -->

            <div class="form-group">

                <label>
                    Service Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="<?= htmlspecialchars($service['title']); ?>"
                    required
                >

            </div>



            <!-- SHORT DESCRIPTION -->

            <div class="form-group">

                <label>
                    Short Description
                </label>

                <input
                    type="text"
                    name="short_description"
                    value="<?= htmlspecialchars($service['short_description']); ?>"
                    required
                >

            </div>



            <!-- DESCRIPTION -->

            <div class="form-group">

                <label>
                    Description
                </label>

                <textarea
                    name="description"
                    rows="6"
                    required
                ><?= htmlspecialchars($service['description']); ?></textarea>

            </div>



            <!-- ICON -->

            <div class="form-group">

                <label>
                    Font Awesome Icon
                </label>

                <input
                    type="text"
                    name="icon"
                    value="<?= htmlspecialchars($service['icon']); ?>"
                    required
                >

                <small>
                    Example: fa-solid fa-gears
                </small>

            </div>



            <!-- CURRENT IMAGE -->

            <div class="form-group">

                <label>
                    Current Image
                </label>

                <?php if (!empty($service['image'])) { ?>

                    <br>

                    <img
                        src="../uploads/services/<?= htmlspecialchars($service['image']); ?>"
                        style="width:150px; height:100px; object-fit:cover; margin-top:10px;"
                    >

                <?php } else { ?>

                    <p>
                        No image uploaded.
                    </p>

                <?php } ?>

            </div>



            <!-- NEW IMAGE -->

            <div class="form-group">

                <label>
                    Change Image
                </label>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                >

                <small>
                    Leave empty if you don't want to change the image.
                </small>

            </div>



            <!-- STATUS -->

            <div class="form-group">

                <label>
                    Status
                </label>

                <select name="status">

                    <option
                        value="active"
                        <?= ($service['status'] == 'active') ? 'selected' : ''; ?>
                    >
                        Active
                    </option>

                    <option
                        value="inactive"
                        <?= ($service['status'] == 'inactive') ? 'selected' : ''; ?>
                    >
                        Inactive
                    </option>

                </select>

            </div>



            <!-- UPDATE BUTTON -->

            <button
                type="submit"
                class="save-service-btn"
            >

                <i class="fa-solid fa-pen"></i>

                Update Service

            </button>


        </form>

    </div>

</div>



<?php include 'includes/footer.php'; ?>
