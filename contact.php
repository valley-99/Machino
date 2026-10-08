<?php include 'includes/header.php'; ?>
<link href="css/contact.css" rel="stylesheet">

<!-- ================= CONTACT HERO ================= -->

<section class="contact-hero">

    <div class="container">

        <div class="contact-hero-content">

            <div class="section-label">
                GET IN TOUCH
            </div>

            <h1>
                Let's Build Something
                <span>Better Together</span>
            </h1>

            <p>
                Have an industrial project or engineering requirement?
                Our team is ready to understand your needs and
                provide the right solution.
            </p>

        </div>

    </div>

</section>


<!-- ================= CONTACT SECTION ================= -->

<section class="contact-section">

    <div class="container">

        <div class="contact-grid">


            <!-- ================= LEFT ================= -->

            <div class="contact-info">

                <div class="section-label">
                    CONTACT US
                </div>

                <h2>
                    Let's Talk About
                    <span>Your Project</span>
                </h2>

                <p class="contact-intro">
                    Whether you need engineering support, industrial
                    automation, manufacturing solutions or technical
                    consultation, our team is here to help.
                </p>


                <!-- ADDRESS -->

                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="fa-solid fa-location-dot"></i>

                    </div>

                    <div>

                        <h3>
                            Our Location
                        </h3>

                        <p>
                            Industrial Area, Lucknow,<br>
                            Uttar Pradesh, India
                        </p>

                    </div>

                </div>


                <!-- PHONE -->

                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="fa-solid fa-phone"></i>

                    </div>

                    <div>

                        <h3>
                            Phone
                        </h3>

                        <p>
                            +91 98765 43210<br>
                            +91 91234 56789
                        </p>

                    </div>

                </div>


                <!-- EMAIL -->

                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="fa-solid fa-envelope"></i>

                    </div>

                    <div>

                        <h3>
                            Email
                        </h3>

                        <p>
                            info@yourcompany.com<br>
                            sales@yourcompany.com
                        </p>

                    </div>

                </div>


                <!-- HOURS -->

                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="fa-solid fa-clock"></i>

                    </div>

                    <div>

                        <h3>
                            Working Hours
                        </h3>

                        <p>
                            Monday – Saturday<br>
                            9:00 AM – 6:00 PM
                        </p>

                    </div>

                </div>


            </div>



            <!-- ================= FORM ================= -->

            <div class="contact-form-wrapper">

                <div class="form-heading">

                    <span>
                        SEND US A MESSAGE
                    </span>

                    <h2>
                        Request a Consultation
                    </h2>

                    <p>
                        Fill in the form and our team will get
                        back to you shortly.
                    </p>

                </div>


                <form action="contact_message.php" method="POST">


                    <div class="form-row">


                        <div class="form-group">

                            <label>
                                Your Name
                            </label>

                            <input type="text" name="name" placeholder="Enter your name" required>

                        </div>


                        <div class="form-group">

                            <label> Email Address </label>

                            <input type="email" name="email" placeholder="Enter your email" required>

                        </div>


                    </div>



                    <div class="form-row">


                        <div class="form-group">

                            <label>
                                Phone Number
                            </label>

                            <input type="tel" name="phone" placeholder="Enter phone number">

                        </div>


                        <div class="form-group">

                            <label>
                                Company Name
                            </label>

                            <input type="text" name="company" placeholder="Company name">

                        </div>


                    </div>



                    <div class="form-group">

                        <label>
                            Select Service
                        </label>

                        <select name="service">

                            <option value="">
                                Select a service
                            </option>

                            <option>
                                Precision Engineering
                            </option>

                            <option>
                                Manufacturing Solutions
                            </option>

                            <option>
                                Industrial Automation
                            </option>

                            <option>
                                Machine Maintenance
                            </option>

                            <option>
                                Industrial Solutions
                            </option>

                            <option>
                                Quality Control
                            </option>

                        </select>

                    </div>



                    <div class="form-group">

                        <label>
                            Your Message
                        </label>

                        <textarea name="message" rows="6" placeholder="Tell us about your project..."
                            required></textarea>

                    </div>



                    <button type="submit" name="submit" class="contact-submit">

                        SEND MESSAGE

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>


                </form>

            </div>


        </div>

    </div>

</section>



<!-- ================= MAP / LOCATION ================= -->

<!-- ================= LOCATION ================= -->

<section class="contact-location">

    <div class="container">

        <div class="location-grid">

            <!-- LEFT CONTENT -->

            <div class="location-content">

                <div class="section-label">
                    FIND US
                </div>

                <h2>
                    Visit Our
                    <span>Office</span>
                </h2>

                <p>
                    We welcome you to visit our office and
                    discuss your industrial requirements with
                    our engineering team.
                </p>


                <div class="location-details">

                    <div>
                        <i class="fa-solid fa-location-dot"></i>

                        <span>
                            Industrial Area, Lucknow,
                            Uttar Pradesh, India
                        </span>
                    </div>


                    <div>
                        <i class="fa-solid fa-phone"></i>

                        <span>
                            +91 98765 43210
                        </span>
                    </div>


                    <div>
                        <i class="fa-solid fa-envelope"></i>

                        <span>
                            info@yourcompany.com
                        </span>
                    </div>

                </div>

            </div>


            <!-- RIGHT : LIVE GOOGLE MAP -->

            <div class="map-box">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3557.539526695873!2d80.93744550242309!3d26.918105324080273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1787308860772!5m2!1sen!2sin"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="strict-origin-when-cross-origin">
                </iframe>

            </div>

        </div>

    </div>

</section>

<!-- ================= FAQ ================= -->

<section class="contact-faq">

    <div class="container">

        <div class="section-heading center-heading">

            <div class="section-label">
                FAQ
            </div>

            <h2>
                Frequently Asked Questions
            </h2>

            <p>
                Some common questions about our services
                and project process.
            </p>

        </div>


        <div class="faq-grid">


            <div class="faq-item">

                <h3>
                    How can I start a project?
                </h3>

                <p>
                    Simply send us your requirements through
                    the contact form. Our team will contact
                    you to discuss the project.
                </p>

            </div>


            <div class="faq-item">

                <h3>
                    What industries do you serve?
                </h3>

                <p>
                    We work across manufacturing, automotive,
                    construction, energy, pharmaceutical and
                    food industries.
                </p>

            </div>


            <div class="faq-item">

                <h3>
                    Do you provide customized solutions?
                </h3>

                <p>
                    Yes. Our engineering solutions can be
                    customized according to your project
                    requirements.
                </p>

            </div>


            <div class="faq-item">

                <h3>
                    How quickly will you respond?
                </h3>

                <p>
                    Our team generally responds to enquiries
                    during working hours as soon as possible.
                </p>

            </div>


        </div>

    </div>

</section>



<!-- ================= CTA ================= -->

<section class="contact-cta">

    <div class="container">

        <div class="contact-cta-content">

            <div>

                <div class="section-label">
                    READY TO GET STARTED?
                </div>

                <h2>
                    Let's Turn Your
                    <span>Idea Into Reality.</span>
                </h2>

            </div>


            <a href="#contact-form" class="cta-btn">

                SEND AN ENQUIRY

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

    </div>

</section>


<?php include 'includes/footer.php'; ?>