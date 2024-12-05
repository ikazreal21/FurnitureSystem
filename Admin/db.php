<?php
$host = "192.168.1.228"; // Database host
$user = "cbadmin";      // Database username
$password = "%rga8477#KC86&";      // Database password
$dbname = "go"; // Database name

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>