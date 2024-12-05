<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'go');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $dimensions = $_POST['dimensions'];
    $material = $_POST['material'];
    $color = $_POST['color'];
    $features = $_POST['features'];
    $budget = $_POST['budget'];
    $address = $_POST['address'];
    $reference = $_FILES['reference'];
    
    $fileName = $reference['name'];
    $fileTmpName = $reference['tmp_name'];
    $uploadDir = 'referenceimg/';
    $uploadFilePath = $uploadDir . basename($fileName);

    if (!empty($fileName)) {
        if (move_uploaded_file($fileTmpName, $uploadFilePath)) {
            $uploadedFileName = basename($fileName);
        } else {
            $uploadedFileName = null;
            echo "<p class='error'>File upload failed.</p>";
        }
    } else {
        $uploadedFileName = null;
    }

    // Insert data into the database
    $sql = "INSERT INTO orderform (name, email, phone, type, dimensions, material, color, features, budget, address, reference) VALUES ('$name', '$email', '$phone', '$type', '$dimensions', '$material', '$color', '$features', '$budget', '$address', '$uploadedFileName')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'></p>";
    } else {
        echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }   
}

$conn->close();
?>
<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'go');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $dimensions = $_POST['dimensions'];
    $material = $_POST['material'];
    $color = $_POST['color'];
    $features = $_POST['features'];
    $budget = $_POST['budget'];
    $address = $_POST['address'];
    $reference = $_FILES['reference'];
    
    $fileName = $reference['name'];
    $fileTmpName = $reference['tmp_name'];
    $uploadDir = 'referenceimg/';
    $uploadFilePath = $uploadDir . basename($fileName);

    if (!empty($fileName)) {
        if (move_uploaded_file($fileTmpName, $uploadFilePath)) {
            $uploadedFileName = basename($fileName);
        } else {
            $uploadedFileName = null;
            echo "<p class='error'>File upload failed.</p>";
        }
    } else {
        $uploadedFileName = null;
    }

    // Insert data into the database
    $sql = "INSERT INTO orderform (name, email, phone, type, dimensions, material, color, features, budget, address, reference) VALUES ('$name', '$email', '$phone', '$type', '$dimensions', '$material', '$color', '$features', '$budget', '$address', '$uploadedFileName')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'></p>";
    } else {
        echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }   
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customized Furniture Order Form</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #5F5F5F, white); /* Gradient background */
            color: #fff;
            margin: 0;
            padding: 20px;
        }

        /* Container styling */
        .container {
            max-width: 600px;
            margin: auto;
            background: rgba(255, 255, 255, 0.1); /* Transparent card background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #FFA500;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 14px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            background: rgba(255, 255, 255, 0.8);
            border: none;
            margin: 10px 0 20px;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            color: #333;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border: 2px solid #3498db;
        }

        button {
            background-color: #FFA500;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #FF8C00;
        }

        .color-palette {
            display: flex;
            justify-content: space-around;
            margin: 10px 0 20px;
        }

        .color-palette button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .color-palette button:hover {
            transform: scale(1.2);
        }

        #colorPreview {
            margin: 10px 0;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="color: black;">Customized Furniture Order Form</h2>
        <form action="orderform.php" method="POST" enctype="multipart/form-data">
            <!-- Customer Information Section -->
            <h3>Customer Information</h3>
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>

            <!-- Furniture Details Section -->
            <h3>Furniture Details</h3>
            <label for="type">Type of Furniture:</label>
            <input type="text" id="type" name="type" placeholder="e.g., Chair, Table" required>

            <label for="dimensions">Preferred Dimensions:</label>
            <input type="text" id="dimensions" name="dimensions" placeholder="Length x Width x Height (in cm)" required>

            <label for="material">Material Choice:</label>
            <select id="material" name="material" required>
                <option value="">-- Select Material --</option>
                <option value="Wood">Wood</option>
                <option value="Metal">Metal</option>
                <option value="Glass">Glass</option>
                <option value="Plastic">Plastic</option>
            </select>

            <label for="color">Preferred Color:</label>
            <button type="button" id="chooseColor">Choose Color</button>
            <input type="hidden" id="selectedColor" name="color" required>
            <p id="colorPreview">No color selected</p>

            <div class="color-palette" id="colorPalette">
                <button type="button" style="background-color: red;" onclick="selectColor('Red')"></button>
                <button type="button" style="background-color: green;" onclick="selectColor('Green')"></button>
                <button type="button" style="background-color: blue;" onclick="selectColor('Blue')"></button>
                <button type="button" style="background-color: yellow;" onclick="selectColor('Yellow')"></button>
                <button type="button" style="background-color: orange;" onclick="selectColor('Orange')"></button>
                <button type="button" style="background-color: purple;" onclick="selectColor('Purple')"></button>
            </div>

            <label for="features">Special Design or Features:</label>
            <textarea id="features" name="features" rows="4" placeholder="Describe any specific patterns or features"></textarea>

            <!-- Additional Information Section -->
            <h3>Additional Information</h3>
            <label for="budget">Budget (Optional):</label>
            <input type="text" id="budget" name="budget" placeholder="Specify your budget">

            <label for="address">Delivery Address:</label>
            <textarea id="address" name="address" rows="4" placeholder="Enter delivery address" required></textarea>

            <label for="reference">Upload Reference Images (Optional):</label>
            <input type="file" id="reference" name="reference">

            <button type="submit" name="submit">Submit Order</button>
        </form>
    </div>

    <script>
        // Show/hide color palette
        document.getElementById("chooseColor").addEventListener("click", function () {
            const palette = document.getElementById("colorPalette");
            palette.style.display = palette.style.display === "flex" ? "none" : "flex";
        });

        // Select color function
        function selectColor(color) {
            document.getElementById("selectedColor").value = color;
            document.getElementById("colorPreview").innerHTML = `Selected color: <span style="color:${color.toLowerCase()};">${color}</span>`;
            document.getElementById("colorPalette").style.display = "none";
        }
    </script>
</body>
</html>
