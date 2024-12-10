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
    <button class="close-btn" id="close-btn">&times;</button>
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
  <!-- Main Content -->
  <div class="main-content">
    <!-- Dashboard Cards -->
    <div class="cards">
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
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Furniture Type</th>
          <th>Height</th>
          <th>Width</th>
          <th>Length</th>
          <th>Material</th>
          <th>Sub Material</th>
          <th>Color Pallete</th>
          <th>Custom Color</th>
          <th>Design</th>
          <th>Address</th>
          <!-- <th>Province</th>
          <th>Municipality</th>
          <th>Barangay</th>
          <th>Landmark</th>
          <th>Postalcode</th>
          <th>Housenumber</th> -->
          <th>Note</th>
          <!-- <th>Actions</th> -->
        </tr>
      </thead>
      <tbody>
        <!-- Order rows will be injected here -->
         <?php 
         $host = '192.168.1.228';
         $user = 'cbadmin';
         $password = '%rga8477#KC86&';
         $database = 'go';
         
         // Establish connection
         $conn = new mysqli($host, $user, $password, $database);
         
         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
         
         // Fetch orders
         $sql = "SELECT * FROM orderform";
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 echo "<tr>
                         <td>{$row['name']}</td>
                         <td>{$row['email']}</td>
                         <td>{$row['phone']}</td>
                         <td>{$row['furniture_type']}</td>
                         <td>{$row['height']}</td>
                         <td>{$row['width']}</td>
                         <td>{$row['length']}</td>
                         <td>{$row['material']}</td>
                         <td>{$row['sub_material']}</td>
                         <td>{$row['color_pallete']}</td>
                         <td>{$row['custom_color']}</td>
                         <td>{$row['design']}</td>
                         <td>{$row['housenumber']}, {$row['barangay']}, {$row['municipality']}, {$row['province']}, {$row['postalcode']}, {$row['landmark']}</td>
                         <td>{$row['note']}</td>
                       </tr>";
             }
         } else {
             echo "<tr><td colspan='20'>No orders found</td></tr>";
         }
         
         $conn->close();
          ?>
      </tbody>
    </table>
  </div>
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

  function updateOrderCount() {
    fetch('get_order_count.php')
      .then(response => response.json())
      .then(data => {
        const orderCountElement = document.getElementById('order-count');
        if (data.order_count !== undefined) {
          orderCountElement.textContent = `${data.order_count}`;
        } else {
          orderCountElement.textContent = `Error fetching order count`;
        }
      })
      .catch(error => {
        console.error('Error fetching order count:', error);
        const orderCountElement = document.getElementById('order-count');
        orderCountElement.textContent = `Error fetching order count`;
      });
  }

// Update order count on page load
updateOrderCount();

  </script>
</body>
</html>
