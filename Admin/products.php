<?php
$host = 'localhost';
$dbname = 'go';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Handle GET request (Read products)
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $stmt = $pdo->query('SELECT * FROM products');
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($products);
    }

    // Handle POST request (Create product)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $pdo->prepare('INSERT INTO products (product_name, price, quantity, description) VALUES (?, ?, ?, ?)');
        $stmt->execute([$data['product_name'], $data['price'], $data['quantity'], $data['description']]);
        echo json_encode(['status' => 'success']);
    }

    // Handle PUT request (Update product)
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $_GET['id'];
        $stmt = $pdo->prepare('UPDATE products SET product_name = ?, price = ?, quantity = ?, description = ? WHERE id = ?');
        $stmt->execute([$data['product_name'], $data['price'], $data['quantity'], $data['description'], $id]);
        echo json_encode(['status' => 'success']);
    }

    // Handle DELETE request (Delete product)
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $id = $_GET['id'];
        $stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
        $stmt->execute([$id]);
        echo json_encode(['status' => 'success']);
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
