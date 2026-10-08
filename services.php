<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/services.css">
<?php

include "config.php";

$sql = "SELECT * FROM services
        WHERE status = 'active'
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!-- ================= SERVICES HERO ================= -->

<section class="services-hero">

    <div class="container">

        <div class="services-hero-content">

            <div class="section-label">
                OUR SERVICES
            </div>

            <h1>
                Engineering Solutions
                <span>Built for Industry</span>
            </h1>

            <p>
                From precision engineering to industrial automation,
                we provide reliable solutions designed to improve
                performance, efficiency and productivity.
            </p>

        </div>

    </div>

</section>



<!-- ================= CORE SERVICES ================= -->

<section class="services-section">

    <div class="container">


        <div class="section-heading">

            <div class="section-label">
                WHAT WE DO
            </div>

            <h2>
                Our Core Services
            </h2>

            <p>
                Comprehensive engineering and industrial solutions
                designed to meet the evolving needs of modern industry.
            </p>

        </div>


        <div class="services-grid">

            <?php while ($service = mysqli_fetch_assoc($result)) { ?>

                <div class="service-card">

                    <!-- SERVICE IMAGE -->
                    <?php if (!empty($service['image'])) { ?>

                        <img
                            src="uploads/services/<?= htmlspecialchars($service['image']); ?>"
                            alt="<?= htmlspecialchars($service['title']); ?>"
                            class="service-image">

                    <?php } ?>


                    <div class="service-icon">
                        <i class="<?= htmlspecialchars($service['icon']); ?>"></i>
                    </div>


                    <div class="service-number">
                        <?= str_pad($service['id'], 2, '0', STR_PAD_LEFT); ?>
                    </div>


                    <h3>
                        <?= htmlspecialchars($service['title']); ?>
                    </h3>


                    <p>
                        <?= htmlspecialchars($service['short_description']); ?>
                    </p>


                    <a
                        href="service-details.php?id=<?= $service['id']; ?>"
                        class="service-link">
                        Learn More

                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

            <?php } ?>

        </div>



</section>



<!-- ================= FEATURED SERVICE ================= -->

<section class="featured-service">

    <div class="container featured-grid">


        <div class="featured-image">

            <img
                src="images/u.jpg"
                alt="Industrial Automation">

            <div class="image-label">

                <i class="fa-solid fa-robot"></i>

                INDUSTRIAL AUTOMATION

            </div>

        </div>



        <div class="featured-content">

            <div class="section-label">
                SMART INDUSTRY
            </div>

            <h2>
                Technology That
                <span>Moves Industry Forward</span>
            </h2>

            <p>
                We combine engineering expertise with modern
                automation technologies to create efficient,
                reliable and future-ready industrial systems.
            </p>


            <div class="service-points">

                <div>

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        Advanced Automation Systems
                    </span>

                </div>

                <div>

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        Improved Production Efficiency
                    </span>

                </div>

                <div>

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        Reduced Operational Costs
                    </span>

                </div>

                <div>

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        Reliable Industrial Performance
                    </span>

                </div>

            </div>


            <a href="contact.php" class="service-btn">

                DISCUSS YOUR PROJECT

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>


    </div>

</section>



<!-- ================= WHY CHOOSE US ================= -->

<section class="why-services">

    <div class="container">


        <div class="section-heading center-heading">

            <div class="section-label">
                WHY CHOOSE US
            </div>

            <h2>
                Built Around Quality
            </h2>

            <p>
                We focus on delivering solutions that create
                measurable value for our clients.
            </p>

        </div>



        <div class="why-grid">


            <div class="why-card">

                <div class="why-icon">

                    <i class="fa-solid fa-user-tie"></i>

                </div>

                <h3>
                    Experienced Team
                </h3>

                <p>
                    Skilled professionals with practical
                    industrial experience.
                </p>

            </div>



            <div class="why-card">

                <div class="why-icon">

                    <i class="fa-solid fa-microchip"></i>

                </div>

                <h3>
                    Modern Technology
                </h3>

                <p>
                    We use advanced technology to create
                    smarter industrial solutions.
                </p>

            </div>



            <div class="why-card">

                <div class="why-icon">

                    <i class="fa-solid fa-medal"></i>

                </div>

                <h3>
                    Quality Assured
                </h3>

                <p>
                    Quality and reliability remain our
                    highest priorities.
                </p>

            </div>



            <div class="why-card">

                <div class="why-icon">

                    <i class="fa-solid fa-clock"></i>

                </div>

                <h3>
                    On-Time Delivery
                </h3>

                <p>
                    We work efficiently to complete projects
                    within planned timelines.
                </p>

            </div>


        </div>

    </div>

</section>



<!-- ================= CTA ================= -->

<section class="services-cta">

    <div class="container">

        <div class="services-cta-content">

            <div>

                <div class="section-label">
                    START YOUR PROJECT
                </div>

                <h2>
                    Let's Build Something
                    <span>Better Together.</span>
                </h2>

                <p>
                    Have an industrial challenge?
                    Our team is ready to help.
                </p>

            </div>


            <a href="contact.php" class="cta-btn">

                GET A QUOTE

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

    </div>

</section>



<?php include 'includes/footer.php'; ?>