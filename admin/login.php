<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "machino");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email = '$email'
            LIMIT 1";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_name'] = $user['name'];
            $_SESSION['admin_email'] = $user['email'];

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Login Page</title>
    <link rel="stylesheet" href="css/login.css">

</head>

<body>
    <div class="login-page">

        <div class="login-box">

            <div class="login-logo">
                <h1>Machino</h1>
                <p>Admin Panel Login</p>
            </div>

            <?php if (!empty($error)) { ?>
                <div class="login-error">
                    <?= htmlspecialchars($error); ?>
                </div>
            <?php } ?>

            <form method="POST" class="login-form">

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="login-btn">
                    Login
                </button>

            </form>

            <div class="login-footer">
                © 2026 Machino. Admin Panel
            </div>

        </div>

    </div>

</body>

</html>