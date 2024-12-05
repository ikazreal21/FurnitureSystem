<?php
if (isset($_GET['token']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_GET['token'];
    $newPassword = $_POST['password'];

    // Database connection
    $conn = new mysqli('192.168.1.228', 'cbadmin', '%rga8477#KC86&', 'go');

    if ($conn->connect_error) {
        die('Database connection failed: ' . $conn->connect_error);
    }

    // Validate the token
    $sql = "SELECT * FROM users WHERE reset_token = ? AND token_expiry > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Update the password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $update = "UPDATE users SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?";
        $updateStmt = $conn->prepare($update);
        $updateStmt->bind_param('ss', $hashedPassword, $token);
        $updateStmt->execute();

        echo "Your password has been reset successfully.";
    } else {
        echo "Invalid or expired token.";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <nav>
        <img src="logo.png" class="logo">
    </nav>
    <div class="container">
        <h1 class="form-title">Reset Password</h1>
        <form method="post" action="reset_password.php?token=<?= htmlspecialchars($_GET['token']); ?>">
            <?php if (isset($error)): ?>
                <p style="color: red;"><?= htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="New Password" required>
                <label for="password">Enter new password</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                <label for="confirm_password">Confirm your password</label>
            </div>
            <input type="submit" class="btn" value="Reset Password">
        </form>
        <div class="links">
            <p>Back to</p>
            <a href="signin.php">Sign In</a>
        </div>
    </div>
</body>
</html>

