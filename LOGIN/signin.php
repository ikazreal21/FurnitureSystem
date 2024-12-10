<?php
// Include PHPMailer
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: ../Home.php"); // Redirect to the home page
    exit();
}

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signIn'])) {
    // Database connection
    $host = '192.168.1.228';
    $user = 'cbadmin';
    $password = '%rga8477#KC86&';
    $database = 'go';

    $conn = new mysqli($host, $user, $password, $database);

    // Check for database connection error
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Sanitize and validate input
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Bypass OTP for admin@admin.com
            if ($email === 'admin@admin.com') {
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['admin'] = true;
                header("Location: ../Admin/dashboard.php");
                exit();
            }

            // Generate a 6-digit OTP for other users
            $otp = mt_rand(100000, 999999);

            // Save OTP in the database
            $updateOtp = "UPDATE users SET otp = '$otp' WHERE email = '$email'";
            $conn->query($updateOtp);

            // Send OTP to user's email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'feelinpizz22@gmail.com';
                $mail->Password = 'ifeqaetvwutccduq';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('no-reply@gmail.com', 'One Tri'); // Replace with your email
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Your OTP Code';
                $mail->Body = "Your OTP code is <b>$otp</b>. It is valid for 5 minutes.";

                $mail->send();

                // Store user email in session for OTP verification
                $_SESSION['email'] = $email;

                // // Redirect to OTP verification page
                // $_SESSION['loggedin'] = true;
                header('Location: verify_otp.php');
                exit();
            } catch (Exception $e) {
                $error = "Failed to send OTP: " . $mail->ErrorInfo;
            }
        } else {
            $error = "Invalid password. Please try again.";
        }
    } else {
        $error = "No account found with this email.";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="Style.css">
    <title>Sign In</title>
</head>
<body>
<nav>
    <img src="logo.png" class="logo">
</nav>
<div class="container" id="signIn" style="display:block;">
    <h1 class="form-title">Sign In</h1>
    <form method="post" action="">
        <?php if (isset($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <input type="submit" class="btn" value="Sign In" name="signIn">
    </form>
    <p class="or">
        ------or------
    </p>
    <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
    </div>
    <div class="links">
        <p>Already Have Account ?</p>
        <a href="signup.php">Sign Up</a>
    </div>  
    <div class="links">
        <p>Forgot Password?</p>
        <a href="forgot_password.php">here</a>
    </div>  
</div>
<script src="script.js"></script>
</body>
</html>
