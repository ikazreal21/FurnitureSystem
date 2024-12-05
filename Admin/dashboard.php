<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Dashboard</title>
  <style>
    /* General Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
    }

    /* Sidebar Styling */
    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #343a40;
      color: white;
      padding: 20px;
      position: fixed;
      top: 0;
      left: 0;
    }

    .sidebar h4 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 18px;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar ul li {
      margin: 15px 0;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: white;
      padding: 10px;
      display: block;
      border-radius: 5px;
    }

    .sidebar ul li a:hover {
      background-color: #495057;
    }

    /* Main Content */
    .main-content {
      margin-left: 270px;
      padding: 20px;
      flex: 1;
    }

    .cards {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
    }

    .card {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      flex: 1;
    }

    .card h5 {
      font-size: 18px;
      margin-bottom: 10px;
      color: #333;
    }

    .card p {
      font-size: 24px;
      font-weight: bold;
      color: #007bff;
    }

    /* Form Styling */
    .form-container {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .form-container h4 {
      margin-bottom: 20px;
      font-size: 20px;
      color: #333;
    }

    .form-container form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .form-container label {
      font-size: 14px;
      color: #555;
    }

    .form-container input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    .form-container button {
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      background-color: #007bff;
      color: white;
      cursor: pointer;
      font-size: 14px;
    }

    .form-container button:hover {
      background-color: #0056b3;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .cards {
        flex-direction: column;
      }

      .main-content {
        margin-left: 0;
        padding: 10px;
      }

      .sidebar {
        position: static;
        height: auto;
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h4>Admin Dashboard</h4>
    <ul>
      <li><a href="dashboard.php">Home</a></li>
      <li><a href="add_products.php">Products</a></li>
      <li><a href="orders.php">Orders</a></li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Dashboard Cards -->
    <div class="cards">
      <div class="card">
        <h5>Total Products</h5>
        <p id="product-count">0</p>
      </div>
      <div class="card">
        <h5>Total Orders</h5>
        <p id="order-count">0</p>
      </div>
      <!-- <div class="card">
        <h5>Total Users</h5>
        <p id="user-count">0</p>
      </div> -->
    </div>

    <!-- Add Product Form -->
    <div class="form-container">
      <h4>Add New Product</h4>
      <form id="add-product-form">
        <label for="product-name">Product Name</label>
        <input type="text" id="product-name" placeholder="Enter product name" required>

        <label for="product-price">Product Price</label>
        <input type="number" id="product-price" placeholder="Enter product price" required>

        <label for="product-quantity">Quantity</label>
        <input type="number" id="product-quantity" placeholder="Enter product quantity" required>

        <button type="submit">Add Product</button>
      </form>
    </div>
  </div>

  <script>
    // Simple JavaScript to update the product count
    const productForm = document.getElementById('add-product-form');
    const productCount = document.getElementById('product-count');

    let productCounter = 0;

    productForm.addEventListener('submit', function (e) {
      e.preventDefault();
      productCounter++;
      productCount.textContent = productCounter;
      alert('Product added successfully!');
    });
  </script>
</body>
</html>
