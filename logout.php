<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

header("Location: LOGIN/signin.php"); // Redirect to login page
exit();
?>
