<?php include 'includes/header.php';

include "config.php";

$sql = "SELECT * FROM industries
        WHERE status = 'active'
        ORDER BY id ASC";

$result = mysqli_query($conn, $sql);

?>
<link href="css/industries.css" rel="stylesheet">


<!-- ================= INDUSTRIES HERO ================= -->

<section class="industries-hero">

    <div class="container">

        <div class="industries-hero-content">

            <div class="section-label">
                INDUSTRIES WE SERVE
            </div>

            <h1>
                Solutions Across
                <span>Every Industry</span>
            </h1>

            <p>
                We provide reliable engineering, manufacturing and
                automation solutions designed around the unique needs
                of different industries.
            </p>

        </div>

    </div>

</section>


<!-- ================= INTRO ================= -->

<section class="industries-intro">

    <div class="container">

        <div class="section-heading center-heading">

            <div class="section-label">
                OUR EXPERTISE
            </div>

            <h2>
                Industries We Serve
            </h2>

            <p>
                Our engineering expertise helps businesses improve
                productivity, efficiency and operational performance
                across a wide range of industries.
            </p>

        </div>


        <!-- ================= INDUSTRY GRID ================= -->
        <div class="industries-grid">
         

            <?php  
           
            while ($industry = mysqli_fetch_assoc($result)) { ?>

                <div class="industry-card">
                  
                    <img
                        src="uploads/industries/<?= htmlspecialchars($industry['image']); ?>"
                        alt="<?= htmlspecialchars($industry['title']); ?>">

                   <div class="industry-overlay">

    <div class="industry-icon">
        <i class="<?= htmlspecialchars($industry['icon']); ?>"></i>
    </div>

    <div class="industry-card-content">

        <span class="industry-number">
            INDUSTRY <?= str_pad($industry['id'], 2, '0', STR_PAD_LEFT); ?>
        </span>

        <h3 class="industry-card-title">
            <?= htmlspecialchars($industry['title']); ?>
        </h3>

        <p class="industry-card-description">
            <?= htmlspecialchars($industry['short_description']); ?>
        </p>

        <a href="#" class="industry-card-link">
            Explore Industry
            <i class="fa-solid fa-arrow-right"></i>
        </a>

    </div>

</div>

                </div>

            <?php } ?>
                    
        </div>
    </div>


</section>


<!-- ================= INDUSTRY CAPABILITIES ================= -->

<section class="industry-capabilities">

    <div class="container capabilities-grid">

        <div class="capabilities-image">

            <img
                src="images/large.jpg"
                alt="Industrial Engineering">

            <div class="capabilities-badge">

                <i class="fa-solid fa-industry"></i>

                <strong>15+</strong>

                <span>
                    YEARS OF<br>
                    INDUSTRIAL EXPERIENCE
                </span>

            </div>

        </div>


        <div class="capabilities-content">

            <div class="section-label">
                INDUSTRY CAPABILITIES
            </div>

            <h2>
                Engineering Knowledge
                <span>That Delivers Results</span>
            </h2>

            <p>
                Every industry has different challenges. Our team
                combines technical expertise, modern technology and
                practical experience to develop solutions that fit
                each client's specific requirements.
            </p>


            <div class="capability-list">

                <div>
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Custom Engineering Solutions</span>
                </div>

                <div>
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Modern Manufacturing Technology</span>
                </div>

                <div>
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Industrial Automation</span>
                </div>

                <div>
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Quality & Safety Standards</span>
                </div>

                <div>
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Long-Term Technical Support</span>
                </div>

                <div>
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Project-Based Solutions</span>
                </div>

            </div>


            <a href="contact.php" class="industry-btn">

                DISCUSS YOUR REQUIREMENTS

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

    </div>

</section>


<!-- ================= INDUSTRY STATS ================= -->

<section class="industry-stats">

    <div class="container industry-stats-grid">

        <div class="industry-stat">

            <i class="fa-solid fa-industry"></i>

            <strong>12+</strong>

            <span>
                Industries Served
            </span>

        </div>


        <div class="industry-stat">

            <i class="fa-solid fa-diagram-project"></i>

            <strong>120+</strong>

            <span>
                Projects Delivered
            </span>

        </div>


        <div class="industry-stat">

            <i class="fa-solid fa-users"></i>

            <strong>50+</strong>

            <span>
                Industry Clients
            </span>

        </div>


        <div class="industry-stat">

            <i class="fa-solid fa-award"></i>

            <strong>15+</strong>

            <span>
                Years Experience
            </span>

        </div>

    </div>

</section>


<!-- ================= CTA ================= -->

<section class="industries-cta">

    <div class="container">

        <div class="industries-cta-content">

            <div>

                <div class="section-label">
                    LET'S WORK TOGETHER
                </div>

                <h2>
                    Looking for the Right
                    <span>Industrial Solution?</span>
                </h2>

                <p>
                    Tell us about your requirements and let our
                    engineering team help you find the right solution.
                </p>

            </div>


            <a href="contact.php" class="cta-btn">

                CONTACT OUR TEAM

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

    </div>

</section>


<?php include 'includes/footer.php'; ?>