<?php
// Include PHPMailer
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: ../Home.php"); // Redirect to the home page
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>OTP Form</title>
</head>
   <style>
  body {
    background-image: linear-gradient(rgba(0,0,0,0.60),rgba(0,0,0,0.60)),url(BG.jpg);
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    height: 900px;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-color: lightgrey;
}

.container {
    background: #333;
    color: #fff;
    padding: 20px; /* Increased padding for better spacing */
    border-radius: 20px; /* Slightly more rounded corners */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); /* Deeper shadow for depth */
    width: 300px; /* Adjusted width for better fit */
    height: 300px;
    text-align: center;
}

h2 {
    color: #ff6f20; /* Orange color */
    margin-bottom: 50px;
    font-size: 24px; /* Increased font size for better visibility */
    text-align:center ;
}

label {
    display: block;
    margin-bottom: 5px;
    text-align: left;
    font-weight: bold; /* Added bold font for labels */
}

input[type="email"],
input[type="text"] {
    width: 100%;
    padding: 12px; /* Increased padding for comfort */
    margin-bottom: 15px;
    border: 2px solid #ff6f20; /* Orange border */
    border-radius: 5px; /* Slightly more rounded corners */
    box-sizing: border-box;
    background-color: #333;
    color: #fff;
    transition: border-color 0.3s; /* Smooth transition for focus */
}

input[type="email"]:focus,
input[type="text"]:focus {
    border-color: #e65c00; /* Darker orange on focus */
    outline: none; /* Remove outline */
}

button {
    background-color: #ff6f20; /* Orange background */
    color: #fff;
    padding: 12px; /* Increased padding for comfort */
    border: none;
    border-radius: 5px; /* Slightly more rounded corners */
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    transition: background-color 0.3s; /* Smooth transition for hover */
}

button:hover {
    background-color: #e65c00; /* Darker orange on hover */
}

form {
    margin-bottom: 20px; /* Space between forms */
}
    </style>
<body>
<div class=container>
    <h2>OTP Verification</h2>
    <form action="Verify_otp.php" method="post">
        <label for="otp">Enter OTP: <i class="fas fa-lock"></i></label>
        <input type="text" id="otp" name="otp" required>
        <button type="submit">Verify OTP</button>
    </form>
</div>
</body>
</html>