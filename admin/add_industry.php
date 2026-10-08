<?php

$conn = mysqli_connect("localhost", "root", "", "machino");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


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

    $status = mysqli_real_escape_string(
        $conn,
        $_POST['status']
    );
    $icon = mysqli_real_escape_string(
    $conn,
    $_POST['icon']
);


    /* =========================
       IMAGE UPLOAD
    ========================= */

    $image = "";

    if (isset($_FILES['image'])) {

        if ($_FILES['image']['error'] === 0) {

            $imageName = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];

            $extension = pathinfo(
                $imageName,
                PATHINFO_EXTENSION
            );

            $image = time() . "_" . uniqid() . "." . $extension;

            $uploadFolder = "../uploads/industries/";

            if (!is_dir($uploadFolder)) {
                die("uploads/industries folder not found.");
            }

            if (!move_uploaded_file(
                $tmpName,
                $uploadFolder . $image
            )) {

                die("Image upload failed.");
            }

        } else {

            die(
                "Image upload error: "
                . $_FILES['image']['error']
            );
        }

    } else {

        die("Image was not selected.");
    }


    /* =========================
       INSERT DATABASE
    ========================= */

    $sql = "INSERT INTO industries
        (
            title,
            short_description,
            description,
            image,
            icon,
            status
        )
        VALUES
        (
            '$title',
            '$short_description',
            '$description',
            '$image',
            '$icon',
            '$status'
        )";

    if (mysqli_query($conn, $sql)) {

        header("Location: industries.php?success=1");
        exit;

    } else {

        echo "Database Error: " . mysqli_error($conn);
    }

}

?>
<?php include 'includes/header.php'; ?>






<div class="add-service-page">


    <!-- HEADER -->

    <div class="add-service-header">

        <div>

            <span>ADMIN PANEL</span>

            <h1>Add New Industry</h1>

            <p>
                Create a new industry for your website.
            </p>

        </div>


        <a
            href="industries.php"
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
                    Industry Title
                </label>

                <input
                    type="text"
                    name="title"
                    placeholder="Enter industry title"
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
                    placeholder="Enter short industry description"
                    required
                >

            </div>



            <!-- DESCRIPTION -->

            <div class="form-group">

                <label>
                    Industry Description
                </label>

                <textarea
                    name="description"
                    rows="6"
                    placeholder="Enter complete industry description"
                    required
                ></textarea>

            </div>



            <!-- IMAGE -->

            <div class="form-group">

                <label>
                    Industry Image
                </label>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    required
                >

                <small>
                    Upload an image for this industry.
                </small>

            </div>
<!-- ICON -->

<div class="form-group">

    <label>
        Industry Icon
    </label>

    <input
        type="text"
        name="icon"
        placeholder="Example: fa-solid fa-car"
        required
    >

    <small>
        Enter Font Awesome icon class.
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
                class="save-service-btn"
            >

                <i class="fa-solid fa-plus"></i>

                Add Industry

            </button>


        </form>

    </div>

</div>



<?php include 'includes/footer.php'; ?>
