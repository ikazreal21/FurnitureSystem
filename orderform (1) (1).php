
<?php
// Database connection
$localhost = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'go';

$conn = new mysqli($localhost, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $note = $_POST['note'];
    $furniture_type = $_POST['furniture_type'];
    if (isset($_POST['furniture_type']) && is_array($_POST['furniture_type'])) {
        $furniture_type = implode(',', $_POST['furniture_type']);
    } else {
        $furniture_type = ''; 
    }
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];
    $material = $_POST['material'];
    $sub_material = $_POST['sub_material'];
    $color_pallete = $_POST['color'];
    if (isset($_POST['color']) && is_array($_POST['color'])) {
        $color_pallete = implode(',', $_POST['color']);
    } else {
        $color_pallete = $_POST['color'] ?? '';
    }
    $custom_color = $_POST['custom_color'];
    $design = $_POST['design'];
    $province = $_POST['province'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $landmark = $_POST['landmark'];
    $postalcode = $_POST['postalcode'];
    $housenumber = $_POST['housenumber'];
    
    // Insert data into the database
    $sql = "INSERT INTO orderform (name, email, phone, note, furniture_type, height, width, length, material, sub_material, color_pallete, custom_color, design, province, municipality, barangay, landmark, postalcode, housenumber) 
    VALUES ('$name', '$email', '$phone', '$note', '$furniture_type', '$height', '$width', '$length', '$material', '$sub_material', '$color_pallete', '$custom_color', '$design', '$province', '$municipality', '$barangay', '$landmark', '$postalcode', '$housenumber')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'></p>";
    } else {
        echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }   
}


$conn->close();*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>One Tri- Go General Services & Upholstery Shop</title>
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    
}

body {
    font-family: "PT Serif", serif;
    font-weight: 400;
    font-style: normal;
    background-image: linear-gradient(rgba(0,0,0,0.60),rgba(0,0,0,0.60)), url(BG.jpg);
    background-size: cover;
    background-attachment: fixed; 
    background-position: center;
    background-repeat: no-repeat;
    background-color: lightgrey;
    height: 100%; 
    margin: 0;
}

.logo {
    position: absolute;
    height: auto;
    left: 5px;
    width: 150px;
    top: -45px;
}

nav {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    background-color: rgba(240, 240, 240, 0.07);
    box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.1);
}

nav ul {
    list-style: none;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding-right: 30px;
}

nav li {
    height: 70px;
}

nav a {
    height: 100%;
    padding: 0 30px;
    text-decoration: none;
    display: flex;
    align-items: center;
    color: white;
}

nav a:hover {
    background-color: #f18930;
}

.sidebar {
    position: fixed;
    top: 0;
    right: 0;
    height: 100vh;
    width: 250px;
    z-index: 999;
    background-color: rgba(240, 240, 240, 0.07);
    backdrop-filter: blur(10px);
    box-shadow: -10px 0 10px rgba(0, 0, 0, 0.1);
    display: none;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
}

.sidebar li {
    width: 100%;
}

.sidebar a {
    width: 100%;
    color: black;
}

.menu-button {
    display: none;
}

.content {
    width: 100%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    text-align: center;
    color: white;
}

.dropdown {
    display: none;
    position: absolute;
    width: 150px;
    padding: 0;
    background-color:#222;
    z-index: 999;
}

.dropdown li {
    text-decoration: none;
    display: block;
}

.dropdown li:hover {
    background-color: rgba(240, 240, 240, 0.07);
}

.dropdown-container:hover .dropdown {
    display: block;
}

.content h1 {
    font-size: 50px;
    margin-top: 80px;
}

.content p {
    margin: 20px auto;
    font-weight: 100;
    line-height: 25px;
    font-size: 25px;
}

.wrapper {
    width: 80%;
    padding: 30px 0;
    text-align: center;
    margin-top: 850px;
    margin-left: 150px;
}

.section-header {
    text-transform: uppercase;
    padding-bottom: 30px;
    font-size: 40px;
    color: black;
    letter-spacing: 3px;
    margin-top: 45px;
}

.content1 {
    padding: 10%;
}

.content1 h2 {
    font-size: 30px;
    text-transform: uppercase;
    margin-bottom: 15px;
    color: black;
}

.main-content {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    grid-row-gap: 40px;
    grid-column-gap: 50px;
}

.main-content .box {
    position: relative;
    cursor: pointer;
    margin-bottom: 15px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    height: 250px;
    overflow: hidden;
}

.main-content .box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 5px;
    height: 100%;
    transition: all 0.5s ease-in-out;
}

.main-content .box:hover::before {
    top: 0;
    right: calc(100% - 5px);
    z-index: 8;
}

.main-content .box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.main-content .box .img-text {
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;    
    background: rgba(225, 225, 225, 0.9);
    width: 100%;
    height: 100%;
    top: 0;
    right: 100%;
    transition: all 0.5s ease-in-out;
}

.main-content .box:hover .img-text {
    top: 0;
    right: 0;
}

footer {
    background-color: #3b3b3b;
    color: #dcdcdc;
    padding: 5px 5px;
    margin-top: 20px;
}

.container1 {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    gap: 5px;
}

.footer-content {
    flex-basis: 30%;
    text-align: left;
    padding: 5px;
}

.footer-content h3 {
    font-size: 16px;
    margin-bottom: 10px;
    color: #f18930;
}

.footer-content p,
.footer-content a {
    font-size: 14px; 
    color: #dcdcdc;
    line-height: 1.6; 
}

.footer-content a {
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-content a:hover {
    color: #f18930;
}

.social-icons {
    list-style: none;
    padding: 0;
    display: flex;
    gap: 20px; 
}

.social-icons i {
    font-size: 18px;
    color: #dcdcdc;
    transition: color 0.3s ease;
}

.social-icons i:hover {
    color: #f18930;
}

.list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.list li {
    margin-bottom: 10px; 
}

.bottom-bar {
    background-color: #222; 
    text-align: center;
    padding: 5px 0; 
    margin-top: 10px; 
}

.bottom-bar p {
    margin: 0;
    font-size: 12px;
    color: #dcdcdc;
}

.contact-info {
    list-style: none;
    padding: 0;
    margin: 0;
}

.contact-info li {
    display: flex;
    align-items: center;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 10px;
}

.contact-info li i {
    font-size: 16px;
    color: #f18930;
    margin-right: 5px; 
}

.contact-info a {
    color: #dcdcdc;
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-info a:hover {
    color: #f18930;
}
/* responsive navbar */
@media (max-width: 800px) {
    .hideOnMobile {
        display: none;
    }

    .menu-button {
        display: block;
    }

    .content h1 {
        font-size: 40px;
    }

    .content p {
        font-size: 20px;
    }

    .wrapper {
        margin-top: 900px;
        margin-left: 10%;
    }

    .container1 {
        flex-direction: column;
        align-items: center;
    }

    .footer-content {
        width: 100%;
        text-align: center;
        margin-bottom: 20px;
    }
}


.form-container {
            max-width: 900px;
            width: 100%;
            background: #222222; 
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
            margin: 120px auto 20px; 
            flex: 1;
            color: white; 
        }

        .form-section {
            margin-bottom: 30px;
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            padding: 20px;
        }

        .form-section h2 {
            font-size: 1.25rem;
             font color:white;
            margin-bottom: 15px;
           
        }

        label {
            display:  #888888;
            font-weight: bold;
            margin-bottom: 5px;
            color: #f18930
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea,
        /* Dropdown Styling */
/* Dropdown */
select {
    background-color: #2d2d2d; /* Background color */
    color: #fff; /* Text color */
    border: 1px solid #333333; /* Border color */
    padding: 10px;
    border-radius: 5px;
    font-size: 14px;
    width: 100%;
    appearance: none; /* Remove default styling */
    cursor: pointer;
}






textarea:focus {
    background-color: #f0f0f0;
    border-color: #f18930;
}

     
input[type="checkbox"] {
    accent-color: #f18930; 
    cursor: pointer;
}

input[type="checkbox"]:hover {
    accent-color: #ff9c50;}


::placeholder {
    color: white; 
    opacity: 0.8;
}

input::placeholder, textarea::placeholder {
    color: #b0b0b0; /* Light gray placeholder */
}

/* Remove input focus outline */
input:focus,
textarea:focus {
    outline: none;
    border-color: #333333; /* Keeps the border consistent on focus */
    box-shadow: 0 0 5px #333333; /* Optional: adds a subtle glow effect on focus */
}

input[type="text"]:focus,
textarea:focus {
    outline: none;
    border-color: #f18930; /* Orange border on focus */
    background-color: #555555; /* Slightly darker background */
}

        button {
            width: 100%;
            padding: 15px;
            background-color: #f18930;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #f18930;
        }


@media (max-width: 400px) {
    .sidebar {
        width: 100%;
    }

    nav ul {
        padding-right: 10px;
    }

    nav a {
        padding: 0 15px;
    }

    .content h1 {
        font-size: 30px;
    }

    .content p {
        font-size: 18px;
    }
} 
</style>
<body>
<nav>
    <img src="logo.png" class="logo">
    <ul class="sidebar">
        <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
        <li><a href="Home.php"><b>Home</b></a></li>
        <li><a href="aboutus.php"><b>About us</b></a></li>
        <li><a href="contact.php"><b>Contact us</b></a></li>
        <li class="dropdown-container">
            <a href="#"><b>Products & Services</b></a>
            <ul class="dropdown">
                <li><a href="Sofa.php"><b>Sofa</b></a></li>
                <li><a href="Sofachair.php"><b>Sofa Chair</b></a></li>
                <li><a href="Bed.php"><b>Bed</b></a></li>
                <li><a href="Cabinets.php"><b>Cabinet</b></a></li>
                <li><a href="table.php"><b>Tables</b></a></li> 
            </ul>
        </li>
        <li><a href="orderform (1) (1).php"><b>Order Form</b></a></li>
       <li><a href="login.php"><b>Log In</b></a></li>  
    </ul>
    <ul>
        <li class="hideOnMobile"><a href="Home.php"><b>Home</b></a></li>
        <li class="hideOnMobile"><a href="aboutus.php"><b>About us</b></a></li>
        <li class="hideOnMobile"><a href="contact.php"><b>Contact us</b></a></li>
        <li class="hideOnMobile dropdown-container">
            <a href="#"><b>Products & Services</b></a>
            <ul class="dropdown">
                <li><a href="Sofa.php"><b>Sofa</b></a></li>
                <li><a href="Sofachair.php"><b>Sofa Chair</b></a></li>
                <li><a href="bed.php"><b>Bed</b></a></li>
                <li><a href="cabinets.php"><b>Cabinets</b></a></li>
                <li><a href="table.php"><b>Tables</b></a></li> 
            </ul>
        </li>
        <li class="hideOnMobile"><a href="orderform (1) (1).php"><b>Order Form</b></a></li>
        <li><a href="signin.php"><b>Log In</b></a></li> 
<li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
    </ul>
</nav>


  
</div>


<section class="form-container">

<div>
<h1 style="text-align: center; color: #f18930;">Customized Order Form</h1>
</div>
    <form action="orderform (1) (1).php" method="POST">
        <!-- General Details -->
        <h3>General Details</h3>
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>

        <label for="note">Special Instructions:</label>
        <textarea id="note" name="note" placeholder="Enter any special instructions"></textarea>

        <!-- Furniture Customization -->
        <h3>Furniture Customization</h3>
        <label for="furniture_type">Type of Furniture:</label>
        <select id="furniture_type" name="furniture_type" required>
            <option value="" disabled selected>Select a furniture type</option>
            <option value="Chair">Chair</option>
            <option value="Table">Table</option>
            <option value="Bed">Bed</option>
            <option value="Cabinet">Cabinet</option>
            <option value="Sofa">Sofa</option>
            <option value="Shelf">Shelf</option>
            <option value="Other">Other</option>
        </select>

        <label for="height">Height (cm):</label>
        <input type="number" id="height" name="height" placeholder="Enter height" required>

        <label for="width">Width (cm):</label>
        <input type="number" id="width" name="width" placeholder="Enter width" required>

        <label for="length">Length (cm):</label>
        <input type="number" id="length" name="length" placeholder="Enter length" required>

        <label for="material">Material:</label>
        <select id="material" name="material" required onchange="updateSubMaterials()">
            <option value="" disabled selected>Select a material</option>
            <option value="Wood">Wood</option>
            <option value="Metal">Metal</option>
            <option value="Plastic">Plastic</option>
        </select>

        <label for="sub_material">Subtype of Material:</label>
        <select id="sub_material" name="sub_material" required>
            <option value="" disabled selected>Select a subtype</option>
        </select>

        <label for="color_palette">Select Color(s):</label>
        <div id="color_palette">
            <label><input type="checkbox" name="color[]" value="Red"> Red</label>
            <label><input type="checkbox" name="color[]" value="Blue"> Blue</label>
            <label><input type="checkbox" name="color[]" value="Green"> Green</label>
            <label><input type="checkbox" name="color[]" value="Yellow"> Yellow</label>
            <label><input type="checkbox" name="color[]" value="Black"> Black</label>
            <label><input type="checkbox" name="color[]" value="White"> White</label>
        </div>

        <label for="custom_color">Or Enter a Custom Color (Hex Code):</label>
        <input type="text" id="custom_color" name="custom_color" placeholder="#000000">

        <label for="design">Additional Design Details:</label>
        <textarea id="design" name="design" placeholder="Describe any additional design preferences"></textarea>

        <!-- Shipping Address -->
        <h3>Shipping Address</h3>
        <label for="province">Province:</label>
        <input type="text" id="province" name="province" placeholder="Enter province" required>

        <label for="municipality">Municipality:</label>
        <input type="text" id="municipality" name="municipality" placeholder="Enter municipality" required>

        <label for="barangay">Barangay:</label>
        <input type="text" id="barangay" name="barangay" placeholder="Enter barangay" required>

        <label for="landmark">Nearest Landmark:</label>
        <textarea id="landmark" name="landmark" placeholder="Provide nearest landmark"></textarea>

        <label for="postalcode">Postal Code:</label>
        <input type="number" id="postalcode" name="postalcode" placeholder="Enter postal code" required>

        <label for="housenumber">House Number:</label>
        <input type="text" id="housenumber" name="housenumber" placeholder="Enter house number" required>

        <button type="submit" name="submit">Submit Order</button>
    </form>
</section>
   
        
            <footer>
    <div class="container1">
        <!-- Contact Us Section -->
        <div class="footer-content">
            <h3>Contact Us</h3>
            <ul class="contact-info">
                <li><i class="fas fa-envelope"></i> <a href="mailto:onetrigo@yahoo.com">onetrigo@yahoo.com</a></li>
                <li><i class="fab fa-facebook"></i> One Tri-Go Enterprises</li>
                <li><i class="fas fa-phone-alt"></i> 09297837362</li>
                <li><i class="fas fa-map-marker-alt"></i> #75 Phase 3 United Glorietta Subdivision, Caniogan, Pasig City</li>
            </ul>
        </div>
        
        <!-- Quick Links Section -->
        <div class="footer-content">
            <h3>Quick Links</h3>
            <ul class="list">
                <li><a href="Home.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="all.php">Products & Services</a></li>
            </ul>
        </div>
        
        <!-- Follow Us Section -->
        <div class="footer-content">
            <h3>Follow Us</h3>
            <ul class="social-icons">
                <li><a href="https://www.facebook.com/profile.php?id=100090726214876&mibextid=ZbWKwL"><i class="fab fa-facebook"></i></a></li>
                <li><a href="mailto:onetrigoupholstery@gmail.com"><i class="fas fa-envelope"></i></a></li>
            </ul>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="bottom-bar">
        <p>&copy; 2024 One Tri-Go General Services & Upholstery Shop. All rights reserved.</p>
    </div>
</footer>
    
    </div>
    </div>
    <script>
    function updateSubMaterials() {
        const materialSelect = document.getElementById('material');
        const subMaterialSelect = document.getElementById('sub_material');
        const selectedMaterial = materialSelect.value;

        // Clear existing options
        subMaterialSelect.innerHTML = '<option value="" disabled selected>Select a subtype</option>';

        // Subcategories for each material
        const subMaterials = {
            Wood: ["Narra", "Plywood", "Mahogany", "Teak"],
            Metal: ["Steel", "Aluminum", "Copper", "Iron"],
            Plastic: ["Polypropylene", "Polycarbonate", "Acrylic", "PVC"]
        };

        // Populate sub-materials based on selection
        if (subMaterials[selectedMaterial]) {
            subMaterials[selectedMaterial].forEach(sub => {
                const option = document.createElement('option');
                option.value = sub;
                option.textContent = sub;
                subMaterialSelect.appendChild(option);
            });
        }
    }
</script>
</body> 
</html> 

