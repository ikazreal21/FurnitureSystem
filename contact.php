<?php
session_start(); // Start the session
$isLoggedIn = isset($_SESSION['user_id']); // Check if the user is logged in (assumes 'user_id' is set in the session when logged in)

$conn = new mysqli('192.168.1.228', 'cbadmin', '%rga8477#KC86&', 'go');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $FullName = $_POST['FullName'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];

    // Insert data into the database
    $sql = "INSERT INTO contactform (FullName, Email, Message) VALUES ('$FullName', '$Email', '$Message')";

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
    <title>One Tri- Go General Services & Upholstery Shop</title>
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<style>
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    border: none; 
}  
body {
    background-image: linear-gradient(rgba(0,0,0,0.60),rgba(0,0,0,0.60)),url(BG.jpg);
    height: 950px;
    display: flex;
    flex-direction: column;
    border: none;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    font-family: "PT Serif", serif;
    font-weight: 400;
    font-style: normal;
} 
.logo{
    position: absolute;
    height:auto;
    left: 5px;
    width: 150px;
    top: -45px; 
} 
nav {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    background-color:rgba(240, 240, 240, 0.07);
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
    background-color: rgba(240, 240, 240, 0.07);
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
    text-align: center;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.dropdown {
    display: none;
    position: fixed;
    background-color: rgba(240, 240, 240, 0.07);
    width: 150px;
    border: 1px;
    z-index: 999;
    padding: 0;
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

header{
    position: absolute;
    text-align: center;
    width: 75%;
    left: 12%;
    margin-top: 100px;
    color: white; 
} 
header h1{
    font-size: 40px;
}
header p{
    font-size: 20px;
} 

.content{
    display: flex;
    min-height: 110vh;
    color: white;
    text-align: left;
}
.content section{
    margin-top: 30px;
    margin-left: -600px;
    color: white;
}
.content-form{
    margin-top: 5rem;
    color: white;
}

section i{
    border-radius: 50%;
    width: 40px;
    height: 40px;
    background-color: #f18930;
    color: black;
    text-align: center;
}
section h2 {
    color: white; 
} 
.form{
    display: flex;
    position: absolute;
    top: 0;
    left: 0;
    margin-left: 35%;
    justify-content: center;
    align-items: center;
    min-height: 110vh;
    color: white;
}

.form .contact-form input{
    width: 25rem;
    background-color: transparent;
    border: 0px;
    border: transparent;
    margin: 20px;
    padding: 10px;
    font-size: 18px;
    border-bottom: 2px solid #fff;
    color: white; 

}
.form .contact-form input ~ span{
    position: absolute;
    left: 20px;
    transition: 0.9s ease-in-out;
    margin-top: 10px;
} 
.form .contact-form input:focus ~span{
    transform: translateY(-20px);
    pointer-events: none;
}
.form .contact-form textarea{
    width: 25rem;
    border: 0px;
    background-color: transparent;
    margin: 20px;
    font-size: 17px;
    border-bottom: 2px solid white;
    color: white; 
}  
.form .contact-form textarea ~ span{
    position: absolute;
    left: 20px;
    margin-top: 10px;
    transition: 0.9s ease-in-out;
}
.form .contact-form textarea:focus ~span{
    transform: translateY(-20px);
    pointer-events: none;
}
.form .contact-form input[type=submit]{
    background-color: #f18930;
    border: 2px solid #f18930;
    font-size: 18px;
    width: 91%;
    height: 40px;
    margin-top: -5px;
    cursor: pointer;
} 
.form .contact-form input[type=submit]:hover{
    background-color: transparent;
    color: #f19830; 
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

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
}

footer {
    margin-top: auto; /* Push footer to bottom */
}


@media(max-width: 800px){
    .hideOnMobile{
        display: none;
    }
    .menu-button{
        display: block;
    }
}
@media(max-width: 400px){
    .sidebar{
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

@media screen and (max-width: 800px){
    header{
        position: absolute;
        left: 0;
        top: 5%;
        width: 100%;
    }
    .form{
        position: absolute;
        margin-top: 300px;
        margin-left: 10px;
    }
    .content-form{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 10px;
        margin-top: -5px;
        margin-left: 5px;
        text-align: center;
    }
    .content section{
        margin-top: 0vh;
        margin-left: 0vh;
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
</style>
<nav>
    <img src="logo.png" class="logo">
    <ul class="sidebar">
        <li onclick="hideSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
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
        <li><a href="orderform (1).php"><b>Order Form</b></a></li>
        <li>
            <?php if ($isLoggedIn): ?>
                <a href="logout.php"><b>Log Out</b></a>
            <?php else: ?>
                <a href="LOGIN/signin.php"><b>Log In</b></a>
            <?php endif; ?>
        </li>
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
                <li><a href="Bed.php"><b>Bed</b></a></li>
                <li><a href="Cabinets.php"><b>Cabinets</b></a></li>
                <li><a href="table.php"><b>Tables</b></a></li> 
            </ul>
        </li>
        <li class="hideOnMobile"><a href="orderform (1).php"><b>Order Form</b></a></li>
        <li>
            <?php if ($isLoggedIn): ?>
                <a href="logout.php"><b>Log Out</b></a>
            <?php else: ?>
                <a href="LOGIN/signin.php"><b>Log In</b></a>
            <?php endif; ?>
        </li>
        <li class="menu-button" onclick="showSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
    </ul>
</nav>

    <script>
        function showSidebar(){
            const sidebar = document.querySelector('.sidebar');
            sidebar.style.display = 'flex';
        }
        function hideSidebar(){
            const sidebar = document.querySelector('.sidebar');
            sidebar.style.display = 'none';
        }
    </script>

        <header>
        <h1>Contact Us</h1>
        <p>You're in the perfect place if you have any questions about our products or just want to offer us some general feedback!</p>
    </header>
    <form action="contact.php" method="POST">
        <div class="form">
            <div class="right">
                <div class="contact-form">
                    <input type="text" name="FullName" required>
                    <span>Full Name</span>
                </div>
  
                <div class="contact-form">
                    <input type="Email" name="Email" required>
                    <span>E-mail Id</span>
                </div>
                <div class="contact-form">
                    <textarea name="Message" required></textarea>
                    <span>Type your Message...</span>
                </div>
  
                <div class="contact-form">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </div>
        </div>
    </form>

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
</body>
</html> 