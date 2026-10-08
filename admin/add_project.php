<?php

$conn = mysqli_connect("localhost", "root", "", "machino");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
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

    /* Image Upload */

    $image = "";

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $imageName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];

        $image = time() . "_" . $imageName;

        move_uploaded_file(
            $tmpName,
            "../uploads/projects/" . $image
        );
    }


    /* Insert */

    $sql = "INSERT INTO projects
            (title, short_description, description, image, category, status)
            VALUES
            ('$title',
             '$short_description',
             '$description',
             '$image',
             '$category',
             '$status')";


    if (mysqli_query($conn, $sql)) {

        header("Location: projects.php?success=1");
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

                <h1>Add New Project</h1>

                <p>
                    Create a new project for your website.
                </p>

            </div>


            <a href="projects.php" class="back-btn">

                <i class="fa-solid fa-arrow-left"></i>

                Back

            </a>

        </div>



        <!-- FORM -->

        <div class="service-form-box">

            <form
                method="POST"
                enctype="multipart/form-data">


                <!-- TITLE -->

                <div class="form-group">

                    <label>
                        Project Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        placeholder="Enter project title"
                        required>

                </div>



                <!-- SHORT DESCRIPTION -->

                <div class="form-group">

                    <label>
                        Short Description
                    </label>

                    <input
                        type="text"
                        name="short_description"
                        placeholder="Enter short project description"
                        required>

                </div>



                <!-- DESCRIPTION -->

                <div class="form-group">

                    <label>
                        Project Description
                    </label>

                    <textarea
                        name="description"
                        rows="6"
                        placeholder="Enter complete project description"
                        required></textarea>

                </div>



                <!-- CATEGORY -->

                <div class="form-group">

                    <label>
                        Project Category
                    </label>

                    <input
                        type="text"
                        name="category"
                        placeholder="Example: Industrial, Automation, Construction"
                        required>

                </div>



                <!-- IMAGE -->

                <div class="form-group">

                    <label>
                        Project Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        accept="image/*"
                        required>

                    <small>
                        Upload an image for this project.
                    </small>

                </div>



                <!-- STATUS -->

                <div class="form-group">

                    <label>
                        Status
                    </label>

                    <select name="status">

                        <option value="active">
                            Active
                        </option>

                        <option value="inactive">
                            Inactive
                        </option>

                    </select>

                </div>



                <!-- BUTTON -->

                <button
                    type="submit"
                    class="save-service-btn">

                    <i class="fa-solid fa-plus"></i>

                    Add Project

                </button>


            </form>

        </div>

    </div>



<?php include 'includes/footer.php'; ?>
