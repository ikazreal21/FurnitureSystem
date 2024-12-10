<?php
session_start(); // Start the session
$isLoggedIn = isset($_SESSION['email']); // Check if the user is logged in (assumes 'email' is set in the session when logged in)
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box; /* Add this line to include padding and border in the element's total width and height */
}

body {
    font-family: "PT Serif", serif;
    font-weight: 400;
    font-style: normal;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.50),rgba(0,0,0,0.50)), url(BG.jpg);
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    width: 100%;
    overflow-x: hidden; /* Prevent horizontal scrolling */
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
    background-color: rgba(240, 240, 240, 0.07);
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

.container1 {
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    padding: 50px;
    margin-top: 80px;
} 

.container1 .card {
    position: relative;
    max-width: 300px;
    width: 100%;
    height: 300px;
    background-color: lightgrey;
    margin: 70px 15px;
    padding: 40px 15px; 
    display: flex;
    flex-direction: column;
    box-shadow: 0 5px 20px rgba(0,0,0,0.5);
    transition: 0.3s ease in ease-in-out;
    font-size: 15px;
} 

.container1 .card:hover {
    height: 470px;
}

.container1 .card .imgBx {
    position: relative;
    object-fit: cover;
    width: 250px;
    height: 250px;
    top: -60px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1; 
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
}

.container1 .card .imgBx img {
    max-width: 100%;
    border-radius: 5px;
}

.container1 .card .content1 {
    position: relative;
    margin-top: 200px;
    padding: 10px 5px;
    text-align: justify;
    color: #111;
    visibility: hidden;
    opacity: 0;
    transition: visibility 0s, opacity 0.1s ease-in-out, margin-top 0.s ease-in-out;
}

.container1 .card:hover .content1 {
    visibility: visible;
    opacity: 1;
    margin-top: -40px;
    transition-delay: 0.1s;
}

footer {
    background-color: #3b3b3b;
    color: #dcdcdc;
    padding: 5px 5px; 
    margin-top: 50px;
}

.container1 {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 10px auto; 
    gap: 10px; 
    align-items: flex-start; 
}


.footer-content {
    flex-basis: 30%;
    text-align: left;
    padding: 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    box-sizing: border-box;
}

.footer-content h3 {
    font-size: 16px;
    margin: 0 0 10px 0;
    color: #f18930;
}

.footer-content p,
.footer-content a {
    font-size: 14px;
    color: #dcdcdc;
    line-height: 1.3;
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
    margin: 0; 
    display: flex;
    gap: 15px; 
    align-items: center; 
}

.social-icons i {
    font-size: 16px;
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
    margin-bottom: 5px; 
}

.bottom-bar {
    background-color: #222;
    text-align: center;
    padding: 5px 0;
    margin-top: 5px;
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
    line-height: 1.4;
    margin-bottom: 5px;
}

.contact-info li i {
    font-size: 14px;
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


/* Responsive styles */
@media(max-width: 800px) {
    .hideOnMobile {
        display: none;
    }
    .menu-button {
        display: block;
    }

    .container1 {
        flex-direction: column;
        align-items: center;
    }

    .container1 .card {
        max-width: 90%;
        margin: 10px 0;
    }

    .container1 .card .imgBx {
        width: 80%;
        height: auto;
        top: -30px;
    }
    .container {
        flex-direction: column;
        align-items: center;
    }

    .footer-content {
        width: 100%;
        text-align: center;
        margin-bottom: 20px;
    }
}

@media(max-width: 400px) {
    .sidebar {
        width: 100%;
    }
    .container1 .card {
        max-width: 100%;
        margin: 10px 0;
    }

    .container1 .card .imgBx {
        width: 100%;
        height: auto;
        top: -20px;
    }

} 
</style>
</head>
<body>
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
                <li><a href="bed.php"><b>Bed</b></a></li>
                <li><a href="Cabinets.php"><b>Cabinet</b></a></li>
                <li><a href="table.php"><b>Tables</b></a></li> 
            </ul>
        </li>
        <li><a href="orderform_1.php"><b>Order Form</b></a></li>
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
                <li><a href="bed.php"><b>Bed</b></a></li>
                <li><a href="Cabinets.php"><b>Cabinets</b></a></li>
                <li><a href="table.php"><b>Tables</b></a></li> 
            </ul>
        </li>
        <li class="hideOnMobile"><a href="orderform_1.php"><b>Order Form</b></a></li>
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

    <div class="container1">
        <div class="card">
            <div class="imgBx">
                <img src="3.png" alt="Service Image 1">
            </div>
            <div class="content1">
                <p> General Services was established in 2006, with a focus on providing 
                    exceptional solutions in upholstery and woodwork. Over the years, we 
                    have built a reputation for quality craftsmanship and dedication to 
                    customer satisfaction.</p>
            </div>
        </div>
        <div class="card">
            <div class="imgBx">
                <img src="OTG7.png" alt="Service Image 2">
            </div>
            <div class="content1">
                <p> Our services include expert upholstery repair and customization for a 
                    variety of furniture such as sofas, sofa beds, dining chairs, and office 
                    chairs. We also offer meticulous woodwork repair, supply, and 
                    customization for furniture pieces like dining tables, working tables, 
                    bar tables, cabinets, kitchen cabinets, and bed frames.</p>
            </div>
        </div>
        <div class="card">
            <div class="imgBx">
                <img src="2.png" alt="Service Image 3">
            </div>
            <div class="content1">
                <p> By choosing General Services, clients can expect unparalleled results 
                    tailored to meet their unique needs and preferences. Our commitment to 
                    quality craftsmanship ensures that furniture is restored or customized 
                    to the highest standards, enhancing both functionality and aesthetics. 
                    Customer satisfaction is our priority, and we strive to exceed 
                    expectations with every project.</p>
            </div>
        </div>
    </div>

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