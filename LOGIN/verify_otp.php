<?php
// Include PHPMailer
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: ../Home.php"); // Redirect to the home page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verifyOtp'])) {
    $otp = $_POST['otp'];
    $email = $_SESSION['email'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'go');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Validate OTP
    $sql = "SELECT * FROM users WHERE email = '$email' AND otp = '$otp'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Clear OTP after verification
        $clearOtp = "UPDATE users SET otp = NULL WHERE email = '$email'";
        $conn->query($clearOtp);

        echo "OTP verified successfully. User is logged in!";
        // Redirect to dashboard or any authenticated page
        header('Location: ../Home.php');
        exit();
    } else {
        $error = "Invalid OTP. Please try again.";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>Verify OTP</title>
</head>
<body>
<div class="container" id="verifyOtp" style="display:block;">
    <h1 class="form-title">Verify OTP</h1>
    <form method="post" action="">
        <?php if (isset($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <div class="input-group">
            <input type="text" name="otp" id="otp" placeholder="Enter OTP" required>
            <label for="otp">OTP</label>
        </div>
        <input type="submit" class="btn" value="Verify OTP" name="verifyOtp">
    </form>
</div>
</body>
</html>
