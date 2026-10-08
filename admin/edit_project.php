<?php

$conn = mysqli_connect("localhost", "root", "", "machino");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


/* ID check */

if (!isset($_GET['id'])) {
    header("Location: projects.php");
    exit;
}

$id = (int) $_GET['id'];


/* Existing project fetch */

$sql = "SELECT * FROM projects WHERE id = $id";

$result = mysqli_query($conn, $sql);

$project = mysqli_fetch_assoc($result);


if (!$project) {
    header("Location: projects.php");
    exit;
}


/* UPDATE */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $short_description = mysqli_real_escape_string(
        $conn,
        $_POST['short_description']
    );

    $description = mysqli_real_escape_string(
        $conn,
        $_POST['description']
    );

    $category = mysqli_real_escape_string(
        $conn,
        $_POST['category']
    );

    $status = mysqli_real_escape_string(
        $conn,
        $_POST['status']
    );


    /* Old image */

    $image = $project['image'];


    /* New image uploaded */

    if (
        isset($_FILES['image']) &&
        $_FILES['image']['error'] == 0
    ) {

        $imageName = $_FILES['image']['name'];

        $tmpName = $_FILES['image']['tmp_name'];

        $extension = pathinfo(
            $imageName,
            PATHINFO_EXTENSION
        );

        $newImage = time() . "_" . uniqid() . "." . $extension;

        $uploadPath = "../uploads/projects/" . $newImage;


        if (move_uploaded_file($tmpName, $uploadPath)) {

            /* Delete old image */

            if (!empty($project['image'])) {

                $oldImage =
                    "../uploads/projects/" .
                    $project['image'];

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            $image = $newImage;

        } else {

            die("New image upload failed.");
        }
    }


    /* Update database */

    $updateSql = "UPDATE projects SET

                    title = '$title',

                    short_description = '$short_description',

                    description = '$description',

                    image = '$image',

                    category = '$category',

                    status = '$status'

                  WHERE id = $id";


    if (mysqli_query($conn, $updateSql)) {

        header("Location: projects.php?updated=1");

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

            <h1>Edit Project</h1>

            <p>
                Update project information.
            </p>

        </div>


        <a
            href="projects.php"
            class="back-btn"
        >

            <i class="fa-solid fa-arrow-left"></i>

            Back

        </a>

    </div>



    <!-- FORM -->

    <div class="service-form-box">

        <form
            method="POST"
            enctype="multipart/form-data"
        >


            <!-- TITLE -->

            <div class="form-group">

                <label>
                    Project Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="<?= htmlspecialchars($project['title']); ?>"
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
                    value="<?= htmlspecialchars($project['short_description']); ?>"
                    required
                >

            </div>



            <!-- DESCRIPTION -->

            <div class="form-group">

                <label>
                    Project Description
                </label>

                <textarea
                    name="description"
                    rows="6"
                    required
                ><?= htmlspecialchars($project['description']); ?></textarea>

            </div>



            <!-- CATEGORY -->

            <div class="form-group">

                <label>
                    Project Category
                </label>

                <input
                    type="text"
                    name="category"
                    value="<?= htmlspecialchars($project['category']); ?>"
                    required
                >

            </div>



            <!-- CURRENT IMAGE -->

            <div class="form-group">

                <label>
                    Current Image
                </label>

                <?php if (!empty($project['image'])) { ?>

                    <img
                        src="../uploads/projects/<?= htmlspecialchars($project['image']); ?>"
                        alt="Current Project Image"
                        class="service-admin-image"
                    >

                <?php } else { ?>

                    <p>No image uploaded.</p>

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
                        <?= $project['status'] == 'active' ? 'selected' : ''; ?>
                    >
                        Active
                    </option>

                    <option
                        value="inactive"
                        <?= $project['status'] == 'inactive' ? 'selected' : ''; ?>
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

                Update Project

            </button>


        </form>

    </div>

</div>



<?php include 'includes/footer.php'; ?>
