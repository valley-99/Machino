<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/backdashboard.css">
    <?php
    $currentPage = basename($_SERVER['PHP_SELF'], ".php");
    if (file_exists("css/" . $currentPage . ".css")) {
        echo '<link rel="stylesheet" href="css/' . $currentPage . '.css">';
    }
    ?>
</head>
<body>
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <div class="sidebar-logo-text">
                    <h2>Machino</h2>
                    <span>ADMIN PANEL</span>
                </div>
                <button class="sidebar-close" type="button" onclick="toggleSidebar()" aria-label="Close menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <nav>
                <a href="dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                <a href="services.php" class="<?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : '' ?>"><i class="fa-solid fa-gears"></i> Services</a>
                <a href="projects.php" class="<?= basename($_SERVER['PHP_SELF']) == 'projects.php' ? 'active' : '' ?>"><i class="fa-solid fa-building"></i> Projects</a>
                <a href="industries.php" class="<?= basename($_SERVER['PHP_SELF']) == 'industries.php' ? 'active' : '' ?>"><i class="fa-solid fa-industry"></i> Industries</a>
                <a href="testimonials.php" class="<?= basename($_SERVER['PHP_SELF']) == 'testimonials.php' ? 'active' : '' ?>"><i class="fa-solid fa-comments"></i> Testimonials</a>
                <a href="contact_message.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contact_message.php' ? 'active' : '' ?>"><i class="fa-solid fa-envelope"></i> Messages</a>
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </nav>
        </aside>
        <main class="dashboard-main">
            <button class="sidebar-toggle" type="button" onclick="toggleSidebar()" aria-label="Open menu">
                <i class="fa-solid fa-bars"></i>
            </button>
