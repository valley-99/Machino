<?php include 'includes/header.php'; ?>
<link href="css/projects.css" rel="stylesheet">
<?php

include "config.php";

$sql = "SELECT * FROM projects
        WHERE status = 'active'
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!-- ================= PROJECT HERO ================= -->

<section class="projects-hero">

    <div class="container">

        <div class="projects-hero-content">

            <div class="section-label">
                OUR PROJECTS
            </div>

            <h1>
                Building Solutions
                <span>That Make an Impact</span>
            </h1>

            <p>
                Explore our engineering and industrial projects
                delivered with precision, innovation and reliability.
            </p>

        </div>

    </div>

</section>



<!-- ================= PROJECT INTRO ================= -->

<section class="projects-intro">

    <div class="container">

        <div class="section-heading">

            <div class="section-label">
                OUR WORK
            </div>

            <h2>
                Featured Projects
            </h2>

            <p>
                From advanced manufacturing facilities to
                industrial automation systems, our projects
                are designed to deliver measurable results.
            </p>

        </div>


        <!-- FILTER BUTTONS -->

        <div class="project-filters">

            <button class="filter-btn active" data-filter="all">
                All Projects
            </button>

            <button class="filter-btn" data-filter="manufacturing">
                Manufacturing
            </button>

            <button class="filter-btn" data-filter="automation">
                Automation
            </button>

            <button class="filter-btn" data-filter="engineering">
                Engineering
            </button>

        </div>


        <!-- PROJECT GRID -->

        <div class="projects-grid">

            <?php while ($project = mysqli_fetch_assoc($result)) { ?>

                <div class="project-card">

                    <!-- IMAGE -->

                    <?php if (!empty($project['image'])) { ?>

                        <img
                            src="uploads/projects/<?= htmlspecialchars($project['image']); ?>"
                            alt="<?= htmlspecialchars($project['title']); ?>"
                            class="project-image">

                    <?php } ?>


                    <!-- OVERLAY -->

                    <div class="project-overlay">

                        <div class="project-content">

                            <span class="project-category">
                                <?= htmlspecialchars($project['category']); ?>
                            </span>

                            <h3>
                                <?= htmlspecialchars($project['title']); ?>
                            </h3>

                            <p>
                                <?= htmlspecialchars($project['short_description']); ?>
                            </p>

                            <a
                                href="projects_details.php?id=<?= $project['id']; ?>"
                                class="project-link">
                                View Project
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>
    </div>

</section>



<!-- ================= PROJECT STATS ================= -->

<section class="project-stats">

    <div class="container project-stats-grid">


        <div class="project-stat">

            <i class="fa-solid fa-diagram-project"></i>

            <strong>
                120+
            </strong>

            <span>
                Projects Completed
            </span>

        </div>


        <div class="project-stat">

            <i class="fa-solid fa-industry"></i>

            <strong>
                50+
            </strong>

            <span>
                Industrial Clients
            </span>

        </div>


        <div class="project-stat">

            <i class="fa-solid fa-globe"></i>

            <strong>
                12+
            </strong>

            <span>
                Industries Served
            </span>

        </div>


        <div class="project-stat">

            <i class="fa-solid fa-award"></i>

            <strong>
                15+
            </strong>

            <span>
                Years Experience
            </span>

        </div>


    </div>

</section>



<!-- ================= PROJECT APPROACH ================= -->

<section class="project-approach">

    <div class="container project-approach-grid">


        <div class="approach-content">

            <div class="section-label">
                OUR APPROACH
            </div>

            <h2>
                From Concept
                <span>to Completion</span>
            </h2>

            <p>
                Every successful project begins with a clear
                understanding of the challenge. Our team works
                closely with clients throughout every stage of
                the project.
            </p>


            <div class="approach-steps">


                <div class="approach-step">

                    <div class="step-number">
                        01
                    </div>

                    <div>

                        <h3>
                            Understand
                        </h3>

                        <p>
                            We understand your requirements,
                            goals and challenges.
                        </p>

                    </div>

                </div>


                <div class="approach-step">

                    <div class="step-number">
                        02
                    </div>

                    <div>

                        <h3>
                            Design
                        </h3>

                        <p>
                            Our engineers develop efficient
                            and practical solutions.
                        </p>

                    </div>

                </div>


                <div class="approach-step">

                    <div class="step-number">
                        03
                    </div>

                    <div>

                        <h3>
                            Deliver
                        </h3>

                        <p>
                            We execute projects with focus
                            on quality and timelines.
                        </p>

                    </div>

                </div>


            </div>

        </div>



        <div class="approach-image">

            <img
                src="images/advance.jpg"
                alt="Industrial Engineering Project">

        </div>


    </div>

</section>



<!-- ================= CTA ================= -->

<section class="projects-cta">

    <div class="container">

        <div class="projects-cta-content">

            <div>

                <div class="section-label">
                    HAVE A PROJECT IN MIND?
                </div>

                <h2>
                    Let's Build Something
                    <span>Remarkable.</span>
                </h2>

                <p>
                    Talk to our team about your next
                    industrial or engineering project.
                </p>

            </div>


            <a href="contact.php" class="cta-btn">

                START A PROJECT

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

    </div>

</section>



<?php include 'includes/footer.php'; ?>