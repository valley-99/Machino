<?php
$conn = mysqli_connect("localhost", "root", "", "machino");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


/* Total Services */

$serviceQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM services"
);

$services = mysqli_fetch_assoc($serviceQuery);


/* Total Projects */

$projectQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM projects"
);

$projects = mysqli_fetch_assoc($projectQuery);


/* Total Industries */

$industryQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM industries"
);

$industries = mysqli_fetch_assoc($industryQuery);


/* Total Contact Messages */

$messageQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM contact_messages"
);

$messages = mysqli_fetch_assoc($messageQuery);

?>


<?php include 'includes/header.php'; ?>
<div class="dashboard-header">

                <div>

                    <span>ADMIN PANEL</span>

                    <h1>Dashboard</h1>

                    <p>
                        Welcome to Machino Admin Panel.
                    </p>

                </div>

            </div>



            <!-- STAT CARDS -->

            <div class="dashboard-cards">


                <!-- SERVICES -->

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">

                        <i class="fa-solid fa-gears"></i>

                    </div>

                    <div>

                        <span>
                            Total Services
                        </span>

                        <h2>
                            <?= $services['total']; ?>
                        </h2>

                    </div>

                </div>



                <!-- PROJECTS -->

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">

                        <i class="fa-solid fa-building"></i>

                    </div>

                    <div>

                        <span>
                            Total Projects
                        </span>

                        <h2>
                            <?= $projects['total']; ?>
                        </h2>

                    </div>

                </div>



                <!-- INDUSTRIES -->

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">

                        <i class="fa-solid fa-industry"></i>

                    </div>

                    <div>

                        <span>
                            Total Industries
                        </span>

                        <h2>
                            <?= $industries['total']; ?>
                        </h2>

                    </div>

                </div>



                <!-- MESSAGES -->

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">

                        <i class="fa-solid fa-envelope"></i>

                    </div>

                    <div>

                        <span>
                            Total Messages
                        </span>

                        <h2>
                            <?= $messages['total']; ?>
                        </h2>

                    </div>

                </div>


            </div>

            <!-- RECENT PROJECTS -->

            <div class="recent-section">

                <div class="section-heading">

                    <div>
                        <span>PROJECTS</span>

                        <h2>Recent Projects</h2>
                    </div>

                    <a href="projects.php">
                        View All
                    </a>

                </div>


                <div class="recent-projects">

                    <?php

                    $recentProjectQuery = mysqli_query(
                        $conn,
                        "SELECT * FROM projects
             ORDER BY id DESC
             LIMIT 5"
                    );

                    ?>


                    <?php if (mysqli_num_rows($recentProjectQuery) > 0) { ?>

                        <?php while ($project = mysqli_fetch_assoc($recentProjectQuery)) { ?>

                            <div class="recent-project">


                                <!-- IMAGE -->

                                <div class="recent-project-image">

                                    <?php if (!empty($project['image'])) { ?>

                                        <img
                                            src="../uploads/projects/<?= htmlspecialchars($project['image']); ?>"
                                            alt="<?= htmlspecialchars($project['title']); ?>">

                                    <?php } else { ?>

                                        <div class="no-image">
                                            No Image
                                        </div>

                                    <?php } ?>

                                </div>


                                <!-- CONTENT -->

                                <div class="recent-project-content">

                                    <h3>
                                        <?= htmlspecialchars($project['title']); ?>
                                    </h3>

                                    <p>
                                        <?= htmlspecialchars($project['category']); ?>
                                    </p>

                                </div>


                                <!-- STATUS -->

                                <div>

                                    <?php if ($project['status'] == 'active') { ?>

                                        <span class="status-active">
                                            Active
                                        </span>

                                    <?php } else { ?>

                                        <span class="status-inactive">
                                            Inactive
                                        </span>

                                    <?php } ?>

                                </div>


                                <!-- EDIT -->

                                <a
                                    href="edit_project.php?id=<?= $project['id']; ?>"
                                    class="recent-edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>


                            </div>

                        <?php } ?>

                    <?php } else { ?>

                        <p class="empty-data">
                            No projects found.
                        </p>

                    <?php } ?>

                </div>

            </div>
            <!-- RECENT MESSAGES -->

            <div class="recent-section">

                <div class="section-heading">

                    <div>
                        <span>CONTACT</span>
                        <h2>Recent Messages</h2>
                    </div>

                    <a href="contact_message.php">
                        View All
                    </a>

                </div>


                <div class="recent-messages">

                    <?php

                    $recentMessageQuery = mysqli_query(
                        $conn,
                        "SELECT * FROM contact_messages
             ORDER BY id DESC
             LIMIT 5"
                    );

                    ?>


                    <?php if (mysqli_num_rows($recentMessageQuery) > 0) { ?>

                        <?php while ($message = mysqli_fetch_assoc($recentMessageQuery)) { ?>

                            <div class="recent-message">

                                <div class="message-icon">

                                    <i class="fa-solid fa-user"></i>

                                </div>


                                <div class="message-content">

                                    <h3>
                                        <?= htmlspecialchars($message['name']); ?>
                                    </h3>

                                    <span>
                                        <?= htmlspecialchars($message['email']); ?>
                                    </span>

                                    <p>
                                        <?= htmlspecialchars($message['message']); ?>
                                    </p>

                                </div>


                                <div class="message-date">

                                    <?= date(
                                        'd M Y',
                                        strtotime($message['created_at'])
                                    ); ?>

                                </div>

                            </div>

                        <?php } ?>

                    <?php } else { ?>

                        <p class="empty-data">
                            No messages found.
                        </p>

                    <?php } ?>

                </div>

            </div>
            <!-- QUICK ACTIONS -->

            <div class="quick-actions">

                <div class="section-heading">

                    <div>
                        <span>QUICK ACTIONS</span>
                        <h2>Manage Website</h2>
                    </div>

                </div>


                <div class="quick-action-grid">


                    <!-- ADD SERVICE -->

                    <a href="add_service.php" class="quick-action-card">

                        <div class="quick-action-icon">
                            <i class="fa-solid fa-gears"></i>
                        </div>

                        <div>
                            <h3>Add Service</h3>
                            <p>Create a new service</p>
                        </div>

                        <i class="fa-solid fa-arrow-right action-arrow"></i>

                    </a>


                    <!-- ADD PROJECT -->

                    <a href="add_project.php" class="quick-action-card">

                        <div class="quick-action-icon">
                            <i class="fa-solid fa-building"></i>
                        </div>

                        <div>
                            <h3>Add Project</h3>
                            <p>Create a new project</p>
                        </div>

                        <i class="fa-solid fa-arrow-right action-arrow"></i>

                    </a>


                    <!-- ADD INDUSTRY -->

                    <a href="add_industry.php" class="quick-action-card">

                        <div class="quick-action-icon">
                            <i class="fa-solid fa-industry"></i>
                        </div>

                        <div>
                            <h3>Add Industry</h3>
                            <p>Create a new industry</p>
                        </div>

                        <i class="fa-solid fa-arrow-right action-arrow"></i>

                    </a>


                    <!-- MESSAGES -->

                    <a href="contact_message.php" class="quick-action-card">

                        <div class="quick-action-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div>
                            <h3>View Messages</h3>
                            <p>Check contact enquiries</p>
                        </div>

                        <i class="fa-solid fa-arrow-right action-arrow"></i>

                    </a>


                </div>

            </div>
        <?php include 'includes/footer.php'; ?>