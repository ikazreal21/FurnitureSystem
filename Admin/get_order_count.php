<?php
// get_order_count.php
header('Content-Type: application/json');

// Database connection (update with your database credentials)
$host = '192.168.1.228';
$dbname = 'go';
$username = 'cbadmin';
$password = '%rga8477#KC86&';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Query to count orders
$query = "SELECT COUNT(*) AS order_count FROM orderform";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    echo json_encode(['order_count' => $row['order_count']]);
} else {
    echo json_encode(['error' => 'Query failed']);
}

$conn->close();
?>
