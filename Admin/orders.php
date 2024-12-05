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

    <!-- Orders Table -->
    <h4>Order List</h4>
    <table id="order-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Type</th>
          <th>Dimensions</th>
          <th>Material</th>
          <th>Color</th>
          <th>Features</th>
          <th>Budget</th>
          <th>Address</th>
          <th>Reference</th>
          <!-- <th>Actions</th> -->
        </tr>
      </thead>
      <tbody>
        <!-- Order rows will be injected here -->
      </tbody>
    </table>
  </div>

  <script>
    // Example order data fetching (This would be replaced by actual server-side fetching)
    const orderCount = document.getElementById('order-count');
    const orderTable = document.getElementById('order-table').getElementsByTagName('tbody')[0];

    // Simulated order data
    const orders = [
      { id: 1, name: "John Doe", email: "john@example.com", phone: "123456789", type: "Product", dimensions: "10x10x10", material: "Plastic", color: "Red", features: "Waterproof", budget: "100", address: "123 Main St", reference: "Ref123" },
      { id: 2, name: "Jane Doe", email: "jane@example.com", phone: "987654321", type: "Service", dimensions: "N/A", material: "N/A", color: "Blue", features: "Durable", budget: "200", address: "456 Elm St", reference: "Ref124" }
    ];

    // Display orders in the table
    function displayOrders() {
      orderCount.textContent = orders.length;
      orderTable.innerHTML = '';
      orders.forEach(order => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${order.id}</td>
          <td>${order.name}</td>
          <td>${order.email}</td>
          <td>${order.phone}</td>
          <td>${order.type}</td>
          <td>${order.dimensions}</td>
          <td>${order.material}</td>
          <td>${order.color}</td>
          <td>${order.features}</td>
          <td>${order.budget}</td>
          <td>${order.address}</td>
          <td>${order.reference}</td>
          `;
          //   <td>
          //     <button class="btn-edit">Edit</button>
          //     <button class="btn-delete">Delete</button>
          //   </td>
        orderTable.appendChild(row);
      });
    }

    // Call displayOrders to populate the table
    displayOrders();
  </script>
</body>
</html>
