<?php
include"config.php";
include "includes/header.php";
?>

<!-- ================= HERO ================= -->
<?php if (isset($_GET['success'])): ?>

    <div class="success-message" id="successMessage">
        Your message has been sent successfully!
    </div>

<?php endif; ?>
<section class="hero" id="home">

    <div class="container">

        <div class="hero-content">

            <div class="hero-label">
                Industrial Engineering & Manufacturing
            </div>

            <h1>
                Engineering
                <span>Tomorrow.</span>
                Building Excellence.
            </h1>

            <p>
                We deliver advanced engineering, manufacturing and
                industrial solutions designed to improve performance,
                efficiency and reliability.
            </p>

            <div class="hero-buttons">

                <a href="#projects" class="btn btn-primary">
                    Explore Projects
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                <a href="#contact" class="btn btn-outline">
                    Get In Touch
                </a>

            </div>

        </div>

    </div>

</section>


<!-- ================= ABOUT ================= -->

<section id="about">

    <div class="container about-grid">

        <div class="about-image">

            <img src="images/about.jpg" alt="Industrial Engineer">

            <div class="experience">
                <strong>15+</strong>
                <span>Years of Experience</span>
            </div>

        </div>


        <div class="about-text">

            <div class="section-heading">

                <div class="section-label">
                    Who We Are
                </div>

                <h2>
                    Engineering Solutions Built for Industry
                </h2>

                <p>
                    We are an industrial engineering and manufacturing
                    company focused on delivering reliable solutions
                    for modern industries.
                </p>

            </div>


            <ul class="check-list">

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Advanced Engineering Solutions
                </li>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Precision Manufacturing
                </li>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Quality & Safety Focused
                </li>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Experienced Industrial Team
                </li>

            </ul>


            <a href="#" class="btn btn-primary">
                Discover More
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

    </div>

</section>


<!-- ================= SERVICES ================= -->

<section class="services" id="services">

    <div class="container">

        <div class="section-heading center">

            <div class="section-label">
                What We Do
            </div>

            <h2>
                Our Industrial Solutions
            </h2>

            <p>
                Reliable solutions designed for demanding
                industrial environments.
            </p>

        </div>


        <div class="services-grid">


            <div class="service-card">

                <div class="service-icon">
                    <i class="fa-solid fa-gears"></i>
                </div>

                <h3>Engineering</h3>

                <p>
                    Professional engineering solutions
                    designed for industrial applications.
                </p>

                <a href="#" class="service-link">
                    Learn More →
                </a>

            </div>


            <div class="service-card">

                <div class="service-icon">
                    <i class="fa-solid fa-industry"></i>
                </div>

                <h3>Manufacturing</h3>

                <p>
                    Precision manufacturing with modern
                    industrial technologies.
                </p>

                <a href="#" class="service-link">
                    Learn More →
                </a>

            </div>


            <div class="service-card">

                <div class="service-icon">
                    <i class="fa-solid fa-robot"></i>
                </div>

                <h3>Automation</h3>

                <p>
                    Smart automation solutions that improve
                    productivity and efficiency.
                </p>

                <a href="#" class="service-link">
                    Learn More →
                </a>

            </div>


            <div class="service-card">

                <div class="service-icon">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                </div>

                <h3>Maintenance</h3>

                <p>
                    Reliable maintenance services that keep
                    industrial operations running.
                </p>

                <a href="#" class="service-link">
                    Learn More →
                </a>

            </div>

        </div>

    </div>

</section>


<!-- ================= CAPABILITIES ================= -->

<section class="capabilities">

    <div class="container cap-grid">

        <div class="cap-image">

            <img src="images/carmodel.avif" alt="Industrial Machinery">

        </div>


        <div class="cap-content">

            <div class="section-heading">

                <div class="section-label">
                    Our Capabilities
                </div>

                <h2>
                    Built With Precision & Technology
                </h2>

                <p>
                    From engineering design to production,
                    we combine technology, expertise and
                    quality processes.
                </p>

            </div>


            <div class="cap-list">

                <div class="cap-item">

                    <div class="cap-number">01</div>

                    <div>
                        <h3>Advanced Technology</h3>
                        <p>
                            Modern machines and industrial systems.
                        </p>
                    </div>

                </div>


                <div class="cap-item">

                    <div class="cap-number">02</div>

                    <div>
                        <h3>Precision Engineering</h3>
                        <p>
                            Accuracy-driven engineering processes.
                        </p>
                    </div>

                </div>


                <div class="cap-item">

                    <div class="cap-number">03</div>

                    <div>
                        <h3>Quality Manufacturing</h3>
                        <p>
                            Consistent and reliable production.
                        </p>
                    </div>

                </div>


                <div class="cap-item">

                    <div class="cap-number">04</div>

                    <div>
                        <h3>Experienced Workforce</h3>
                        <p>
                            Skilled professionals with industry expertise.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= PROJECTS DATABASE QUERY ================= -->
<?php
$projectQuery = "SELECT * FROM projects 
                 WHERE status = 'active' 
                 ORDER BY id DESC 
                 LIMIT 3";

$projectResult = mysqli_query($conn, $projectQuery);
?>
<!-- ================= PROJECTS ================= -->

<section id="projects">

    <div class="container">

        <div class="section-heading">

            <div class="section-label">
                Featured Projects
            </div>

            <h2>
                Projects That Define Our Expertise
            </h2>

            <p>
                Explore some of our industrial engineering
                and manufacturing capabilities.
            </p>

        </div>


        <div class="projects-grid">

            <?php while ($project = mysqli_fetch_assoc($projectResult)) { ?>

                <div class="project-card">

                    <img
                        src="uploads/projects/<?php echo htmlspecialchars($project['image']); ?>"
                        alt="<?php echo htmlspecialchars($project['title']); ?>"
                    >

                    <div class="project-overlay">

                        <div>

                            <small>
                                <?php echo htmlspecialchars($project['category']); ?>
                            </small>

                            <h3>
                                <?php echo htmlspecialchars($project['title']); ?>
                            </h3>

                            <span>
                                View Project →
                            </span>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

</section>

<!-- ================= INDUSTRIES ================= -->

<section class="industries" id="industries">

    <div class="container">

        <div class="section-heading center">

            <div class="section-label">
                Industries
            </div>

            <h2>
                Industries We Serve
            </h2>

            <p>
                Delivering industrial solutions across
                multiple sectors.
            </p>

        </div>


        <div class="industries-grid">

            <div class="industry">
                <i class="fa-solid fa-car"></i>
                <h3>Automotive</h3>
            </div>

            <div class="industry">
                <i class="fa-solid fa-industry"></i>
                <h3>Manufacturing</h3>
            </div>

            <div class="industry">
                <i class="fa-solid fa-bolt"></i>
                <h3>Energy</h3>
            </div>

            <div class="industry">
                <i class="fa-solid fa-building"></i>
                <h3>Infrastructure</h3>
            </div>

            <div class="industry">
                <i class="fa-solid fa-gears"></i>
                <h3>Engineering</h3>
            </div>

            <div class="industry">
                <i class="fa-solid fa-robot"></i>
                <h3>Automation</h3>
            </div>

        </div>

    </div>

</section>


<!-- ================= STATS ================= -->

<section class="stats">

    <div class="container stats-grid">

        <div class="stat">
            <strong>15+</strong>
            <span>Years Experience</span>
        </div>

        <div class="stat">
            <strong>120+</strong>
            <span>Projects Completed</span>
        </div>

        <div class="stat">
            <strong>50+</strong>
            <span>Industry Clients</span>
        </div>

        <div class="stat">
            <strong>99%</strong>
            <span>Quality Commitment</span>
        </div>

    </div>

</section>


<!-- ================= WHY US ================= -->

<section>

    <div class="container">

        <div class="section-heading center">

            <div class="section-label">
                Why Choose Us
            </div>

            <h2>
                Built on Quality & Trust
            </h2>

        </div>


        <div class="why-grid">

            <div class="why-card">

                <i class="fa-solid fa-crosshairs"></i>

                <h3>Precision</h3>

                <p>
                    High-quality engineering with
                    attention to every detail.
                </p>

            </div>


            <div class="why-card">

                <i class="fa-solid fa-lightbulb"></i>

                <h3>Innovation</h3>

                <p>
                    Modern technologies and smarter
                    industrial solutions.
                </p>

            </div>


            <div class="why-card">

                <i class="fa-solid fa-shield-halved"></i>

                <h3>Reliability</h3>

                <p>
                    Dependable solutions built for
                    long-term performance.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- ================= TESTIMONIAL database code================= -->

<?php
$conn = mysqli_connect("localhost", "root", "", "machino");
$testimonialQuery = "SELECT * FROM testimonials WHERE status = 1 ORDER BY id DESC";
$testimonialResult = mysqli_query($conn, $testimonialQuery);
?>
<!-- ================= TESTIMONIAL  ================= -->

<section class="testimonial-section">

    <div class="container">

        <div class="section-heading center">

            <div class="section-label">
                Testimonials
            </div>

            <h2>
                What Our Clients Say
            </h2>

        </div>


        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">

                <?php
                $first = true;

                while ($row = mysqli_fetch_assoc($testimonialResult)) {
                ?>

                    <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">

                        <div class="testimonial">

                            <div class="quote">
                                <i class="fa-solid fa-quote-left"></i>
                            </div>

                            <p>
                                "<?php echo htmlspecialchars($row['message']); ?>"
                            </p>

                            <strong>
                                — <?php echo htmlspecialchars($row['name']); ?>,
                                <?php echo htmlspecialchars($row['designation']); ?>
                            </strong>

                        </div>

                    </div>

                <?php
                    $first = false;
                }
                ?>

            </div>


            <!-- Previous -->
            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">

                <span class="carousel-control-prev-icon"></span>

            </button>


            <!-- Next -->
            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">

                <span class="carousel-control-next-icon"></span>

            </button>

        </div>

    </div>

</section>

<!-- ================= CTA ================= -->

<section class="cta" id="contact">

    <div class="container">

        <h2>
            Have an Industrial Project in Mind?
        </h2>

        <p>
            Let's build smarter, safer and more efficient
            industrial solutions together.
        </p>

        <a href="#" class="btn btn-primary">
            Start Your Project
            <i class="fa-solid fa-arrow-right"></i>
        </a>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer>

    <div class="container">

        <div class="footer-grid">

            <div>

                <div class="footer-logo">
                    INDUSTR<span>IX</span>
                </div>

                <p>
                    Advanced engineering, manufacturing
                    and industrial solutions for modern industry.
                </p>

            </div>


            <div>

                <h3>Quick Links</h3>

                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#services">Services</a>
                <a href="#projects">Projects</a>

            </div>


            <div>

                <h3>Industries</h3>

                <a href="#">Automotive</a>
                <a href="#">Manufacturing</a>
                <a href="#">Energy</a>
                <a href="#">Infrastructure</a>

            </div>


            <div>

                <h3>Contact</h3>

                <p><a href="#">+91 98765 43210</a></p>
                <p><a href="#">info@industr​ix.com</a></p>
                <p><a href="#">Lucknow, India</a></p>

            </div>

        </div>


        <div class="copyright">

            © 2026 INDUSTRIX. All Rights Reserved.

        </div>

    </div>

</footer>

</body>
<script>
    setTimeout(function() {

        const message = document.getElementById("successMessage");

        if (message) {

            message.style.opacity = "0";

            setTimeout(function() {
                message.remove();
            }, 500);

        }

    }, 3000);
</script>

</html>


</body>
<script src="js/bootstrap.bundle.js"></script>

</html>