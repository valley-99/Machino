    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>INDUSTRIX | Industrial Engineering Solutions</title>

        <!-- Google Font -->
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet"> -->

        <!-- Local Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
       <!-- Local Font Awesome -->
    <link rel="stylesheet" href="fonts/fontawesome/css/all.min.css">
        <link href="css/style.css" rel="stylesheet">
         <!-- Local Font -->
    <link rel="stylesheet" href="fonts/montserrat/fonts.css">


    </head>

    <body>

        <!-- ================= NAVBAR ================= -->

        <header>

            <div class="container navbar">

                <a href="#" class="logo">
                    INDUSTR<span>IX</span>
                </a>

                <nav class="nav-links">

                    <a href="index.php">Home</a>
                    <a href="about.php">About</a>
                    <a href="services.php">Services</a>
                    <a href="projects.php">Projects</a>
                    <a href="industries.php">Industries</a>
                    <a href="contact.php">Contact</a>

                    <a href="contact.php" class="nav-btn">
                        Get a Quote
                    </a>

                </nav>

                <div class="menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>

            </div>

        </header>
        <script>
            const menuBtn = document.querySelector(".menu-btn");
            const navLinks = document.querySelector(".nav-links");

            menuBtn.addEventListener("click", function() {
                navLinks.classList.toggle("active");
            });
        </script>