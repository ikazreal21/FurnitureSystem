<?php
// Include PHPMailer
session_start();

if ($_SESSION['admin'] == false) {
    header("Location: ../LOGIN/signin.php"); // Redirect to the home page
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>One Tri Admin</title>
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

    /* Product Table */
    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #007bff;
      color: white;
    }

    .btn-edit, .btn-delete {
      cursor: pointer;
      padding: 5px 10px;
      margin: 5px;
      border-radius: 3px;
    }

    .btn-edit {
      background-color: #28a745;
      color: white;
    }

    .btn-delete {
      background-color: #dc3545;
      color: white;
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
      transition: transform 0.3s ease-in-out;
    }

    .sidebar.collapsed {
      transform: translateX(-250px);
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

    /* Close Button */
    .close-btn {
      display: none;
      text-align: center;
      background-color: #dc3545;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      margin-bottom: 20px;
    }

    .sidebar:not(.collapsed) .close-btn {
      display: block;
    }

    /* Toggle Button */
    .toggle-btn {
      position: absolute;
      top: 20px;
      left: 20px;
      background-color: #007bff;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      transition: opacity 0.3s ease-in-out;
    }

    .sidebar:not(.collapsed) ~ .toggle-btn {
      opacity: 0;
      pointer-events: none;
    }

    /* Main Content */
    .main-content {
      margin-left: 270px;
      padding: 20px;
      flex: 1;
      transition: margin-left 0.3s ease-in-out;
    }

    .sidebar.collapsed ~ .main-content {
      margin-left: 20px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .sidebar {
        position: absolute;
        z-index: 1000;
      }

      .main-content {
        margin-left: 0;
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <button class="close-btn" style="text-align: center;" id="close-btn">&times;</button>
    <h4>One Tri Admin</h4>
    <ul>
      <li><a href="dashboard.php">Home</a></li>
      <li><a href="add_products.php">Products</a></li>
      <li><a href="orders.php">Orders</a></li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </div>

  <!-- Toggle Button -->
  <button class="toggle-btn" id="toggle-btn">☰</button>


  <!-- Toggle Button -->
  <!-- Main Content -->
  <div class="main-content">
    <!-- Dashboard Cards -->
    <div class="cards">
      <div class="card">
        <h5>Total Products</h5>
        <p id="product-count">0</p>
      </div>
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

        <label for="product-description">Product Description</label>
        <textarea id="product-description" placeholder="Enter product description" required></textarea>

        <button type="submit">Add Product</button>
      </form>
    </div>

    <!-- Product Table -->
    <h4>Product List</h4>
    <table id="product-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Product rows will be injected here -->
      </tbody>
    </table>
  </div>

  <script>
    const productForm = document.getElementById('add-product-form');
    const productCount = document.getElementById('product-count');
    const productTable = document.getElementById('product-table').getElementsByTagName('tbody')[0];

    function fetchProducts() {
      fetch('products.php')
        .then(response => response.json())
        .then(data => {
          productCount.textContent = data.length;
          productTable.innerHTML = '';
          data.forEach(product => {
            const row = document.createElement('tr');
            row.innerHTML = `
              <td>${product.id}</td>
              <td>${product.product_name}</td>
              <td>${product.price}</td>
              <td>${product.quantity}</td>
              <td>${product.description}</td>
              <td>
                <button class="btn-edit" onclick="editProduct(${product.id})">Edit</button>
                <button class="btn-delete" onclick="deleteProduct(${product.id})">Delete</button>
              </td>
            `;
            productTable.appendChild(row);
          });
        });
    }

    function editProduct(id) {
      fetch(`products.php?id=${id}`)
        .then(response => response.json())
        .then(product => {
            console.log(product[0]);
          document.getElementById('product-name').value = product[0].product_name;
          document.getElementById('product-price').value = product[0].price;
          document.getElementById('product-quantity').value = product[0].quantity;
          document.getElementById('product-description').value = product[0].description;
          productForm.dataset.editId = product[0].id;
        });
    }

    function deleteProduct(id) {
      if (confirm('Are you sure you want to delete this product?')) {
        fetch(`products.php?id=${id}`, { method: 'DELETE' })
          .then(() => fetchProducts());
      }
    }

    productForm.addEventListener('submit', function (e) {
      e.preventDefault();

      const productName = document.getElementById('product-name').value;
      const productPrice = document.getElementById('product-price').value;
      const productQuantity = document.getElementById('product-quantity').value;
      const productDescription = document.getElementById('product-description').value;
      const editId = productForm.dataset.editId;

      const method = editId ? 'PUT' : 'POST';
      const url = 'products.php' + (editId ? `?id=${editId}` : '');

      fetch(url, {
        method: method,
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          product_name: productName,
          price: productPrice,
          quantity: productQuantity,
          description: productDescription
        })
      })
      .then(() => {
        productForm.reset();
        delete productForm.dataset.editId;
        fetchProducts();
      });
    });

    // Initial fetch
    fetchProducts();
  </script>
  <script>
    // JavaScript to handle sidebar toggling
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggle-btn');
    const closeBtn = document.getElementById('close-btn');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.remove('collapsed');
    });

    closeBtn.addEventListener('click', () => {
      sidebar.classList.add('collapsed');
    });
  </script>
</body>
</html>
