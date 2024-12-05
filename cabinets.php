<?php
session_start(); // Start the session
$isLoggedIn = isset($_SESSION['user_id']); // Check if the user is logged in (assumes 'user_id' is set in the session when logged in)
?>
<!DOCTYPE html>
<html1 lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <style>
            *{
    margin: 0;
    padding: 0;
}
**{
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    transition: all .2s linear;
    text-transform: capitalize;
}
.body1{
    min-height: 100vh;
    width: 100%; 
    background-color: antiquewhite;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    display: flex;
    flex-direction: column;
    font-size: larger;
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
    background-color: #f0f0f013;  
    box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.1); 
}
nav ul {
    list-style: none;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding-right: 30px; 
} 
nav li{
    height: 70px; 
    font-size: 15px;
} 
nav a{
    height: 100%;
    padding: 0 30px;
    text-decoration: none;
    display: flex;
    align-items: center;
    color: white;
}
nav a:hover{
    background-color: #f0f0f013;
} 

.sidebar{
    position: fixed;
    top: 0;
    right: 0;
    height: 100vh;
    width: 250px;
    z-index: 999;
    background-color: #f0f0f013;
    backdrop-filter: blur(10px);
    box-shadow: -10px 0 10px rgba(0, 0, 0, 0.1);
    display: none;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start; 
}
.sidebar li{ 
    width: 100%;
}
.sidebar a{
    width: 100%;
    color:black;
}
.menu-button{
    display: none;
}
.content {
    width: 100%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    text-align: center;
    color:white; 
} 
.dropdown {
    display:none;
    position: fixed;
    background-color: #f0f0f013;
    width: 197px;
    height: 70px;
    border: 1px;
    z-index: 999; 
} 

.dropdown li {
    text-decoration: none;
    display: block; 
}

.dropdown li:hover {
    background-color: #f0f0f013;
} 

.dropdown-container:hover .dropdown {
    display:contents; 
} 

.button_container{
    position:relative;
    max-width: 1350px;
    width: 100%;
    padding: 20px;
    margin: 100px auto;
    margin-top: 100px;
}
.filter_buttons{
    display: flex;
    align-items: center;
    gap: 100%;
    grid-column-gap:100px;
}
button{
    margin:10px;
    padding: 8px 20px;
    font-size: 20px;
    background: #fff;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(221, 159, 159, 0.05);
    outline: .3rem solid #f18930;
} 
button:hover {
    background-color: #f18930;
    color: white;
    border-color: #fff;
}

.html2{
    font-size: 62.5%;
    overflow-x: hidden;
}
.body2{
    background-color: #343434;
    background-position: center;
    background-size: cover;
    font-family: "PT Serif", serif;
    font-weight: 400;
    font-style: normal;   
}
.container{
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    margin-top: -200px;
} 
.container .products-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    margin-top: 8rem;
    gap: 45px;
}
.container .products-container .product{
    text-align: center;
    padding: 3rem 2rem;
    background: #fff;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
    outline: .2rem solid #f18930;
    outline-offset: -1.5rem;
    cursor: pointer;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
} 
.container .products-container .product:hover{
    outline: .2rem solid #f18930;
    outline-offset: 0;

}
.container .products-container p{
    line-height: 1.5;
    padding: 1rem 0;
    font-size: 1.6rem;
    color: #777;
}
.container .products-container .product img{
    height: 25rem;
}
.container .products-container .product:hover img{
    transform: scale(.9);
}
.container .products-container .product h3{
    padding: 1rem 0;
    font-size: 2rem;
    color: #444;
}
.container .products-container .product:hover h3{
    color: #f18930;
}
.container .products-container .product .price{
    font-size: 2rem;
    color: #444;
}

.products-preview{
    position: fixed;
    top: 0;
    left: 0;
    min-height: 100vh;
    width: 100%;
    background: rgba(0,0,0,.8);
    display: none;
    align-items: center;
    justify-content: center;
}
.products-preview .preview{
    display: none;
    padding: 1rem;
    text-align: center;
    background: #fff;
    position: relative;
    margin: 8rem;
    width: 40rem;
}
.products-preview .preview.active{
    display: inline-block;
}
.products-preview .preview img{
    height: 30rem;
    margin-top: .5rem;
} 
.products-preview .preview .fa-times{
    position: absolute;
    top: 1rem;
    right: 1.5rem;
    cursor: pointer;
    color: #444;
    font-size: 4rem;
}
.products-preview .preview .fa-times:hover{
    transform: rotate(90deg);
}
.products-preview .preview h3{ 
    color: #444;
    padding: 1rem 0;
    font-size: 2.5rem;
    margin-top: 1rem;
}
.products-preview .preview .stars{
    padding:1rem 0;
    font-size: 1.7rem;
}

.products-preview .preview .stars i{
    color: #f18930;
}

.products-preview .preview .stars span{
    color: #999;
}
.products-preview .preview p{
    line-height: 1.5;
    padding: 1rem 0;
    font-size: 1.6rem;
    color: #777;
}

.products-preview .preview .price{
    padding: 1rem 0;
    font-size: 2.5rem;
    color: #f18930;
}
.products-preview .preview .button{
    display: flex;
    margin-left: 1px;
    margin-top: .5rem;
}
.products-preview .preview .button a{
    flex: 1 1 16rem;
    padding: .5rem;
    font-size: 1.5rem;
    color: #444;
    border: .3rem solid #f18930;
}
.products-preview .preview .button a.register{
    background: #f18930;
    color: #fff;
}
.products-preview .preview .button a:hover{
    background: #111;
}
.products-preview .preview .button a.register:hover{
    background: #f18930;
    color: #fff;
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
@media(max-width: 800px){
    .hideOnMobile{
        display: none;
    }
    .menu-button{
        display: block;
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
@media(max-width: 400px){
    .sidebar{
        width: 100%;
    }
}

@media(max-width:991px){
    html{
        font-size: 55%;
    }
}

@media(max-width:768px){
    .products-preview .preview img{
        height: 25rem;
    }
}

@media(max-width:450px){
    html{
        font-size: 50%;
    }
} 
        </style>
</head>
<body>
<body1>
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
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display ='flex'
        }
        function hideSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display ='none'
        }
    </script>

    </body1>
    </html1> 

    <html class="html2">
    <body class="body2">
        
        <div class="button_container">
            <div class="filter_buttons"></div>
            <a href="all.php"><button data-name="all">Show all</button></a>
            <a href="Sofa.php"><button data-name="sofa">Sofa</button></a>
            <a href="Sofachair.php"><button data-name="sofachair">Sofachair</button></a>
            <a href="Bed.php"><button data-name="bed">Bed</button></a>
            <a href="Cabinets.php"><button data-name="cabinets">Cabinets</button></a>
            <a href="table.php"><button data-name="table">Table</button></a>
        </div>

        <div class="container">
            <div class="products-container">
           
            <div class="product" data-name="p-13">
                    <img src="1.jpg" alt="">
                    <h3>NobleNiche Cabinet</h3>
                    <p>Plywood, solid wood, Mdf, Paint</p>
                    <div class="price">₱15,000.00</div>
                </div>
            
                <div class="product" data-name="p-14">
                    <img src="2.jpg" alt="">
                    <h3> MajesticManor Cupboard</h3>
                    <p>Plywood, solid wood, 100% uratex foam, <br> leather / german leather, linen cotton, <br>polyester,fiberfill,paint</p>
                    <div class="price">₱100,000.00</div>
                </div>
            
                <div class="product" data-name="p-15">
                    <img src="3.jpg" alt="">
                    <h3>MagnificenceMantle Cabinet</h3>
                    <p>Plywood, solid wood, Mdf, Paint</p>
                    <div class="price">₱50,000.00</div>
                </div>
            
                <div class="product" data-name="p-16">
                    <img src="4.jpg" alt="">
                    <h3>EleganceEmbrace</h3>
                    <p>Plywood, solid wood,Stainless, Paint</p>
                    <div class="price">₱12,000.00</div>
                </div>
            
                <div class="product" data-name="p-17">
                    <img src="5.jpg" alt="">
                    <h3> RefinedRendezvous Cabinet</h3>
                    <p>Plywood, Solid Wood, Laminate</p>
                    <div class="price">₱15,000.00</div>
                </div>
            
                <div class="product" data-name="p-18">
                    <img src="6.jpg" alt="">
                    <h3>GlamourGrove Cupboard</h3>
                    <p>Plywood, solid wood, Mdf</p>
                    <div class="price">₱35,000.00</div>
                </div>
        
                <div class="product" data-name="p-19">
                    <img src="7.jpg" alt="">
                    <h3>SplendorSuite Cabinet</h3>
                    <p>Plywood, solid wood, Mdf</p>
                    <div class="price">₱35,000.00</div>
                </div>
        
                <div class="product" data-name="p-20">
                    <img src="8.jpg" alt="">
                    <h3>ExquisiteExpanse Cupboard</h3>
                    <p>Plywood, solid wood, Glass, Mdf</p>
                    <div class="price">₱30,000.00</div>
                </div>
        
                <div class="product" data-name="p-21">
                    <img src="9.jpg" alt="">
                    <h3>PrestigePalace Cabinet</h3>
                    <p>Plywood, solid wood, Paint</p>
                    <div class="price">₱40,000.00</div>
                </div>
            </div>
        </div>
        </div>
        
        <div class="products-preview">
        
            <div class="preview" data-target="p-1">
                <i class="fas fa-times"></i>
                <img src="1.jpg" alt="">
                <h3> NobleNiche Cabinet</h3>
                <p>Plywood, solid wood, Mdf, Paint</p>
                <div class="price">₱15,000.00</div>
                <div class="button">
                    <a href="contact.php" class="register">Register</a>
                </div>
            </div>
            
            <div class="preview" data-target="p-2">
                <i class="fas fa-times"></i>
                <img src="2.jpg" alt="">
                <h3>MajesticManor Cupboard</h3>
                <p>Plywood, Solid Wood, Mdf, Paint</p>
                <div class="price">₱100,000.00</div>
                <div class="button">
                    <a href="contact.php" class="register">Register</a>
                </div>
            </div>
            
            <div class="preview" data-target="p-3">
                <i class="fas fa-times"></i>
                <img src="3.jpg" alt="">
                <h3>MagnificenceMantle Cabinet</h3>
                <p>Plywood, solid wood, Mdf, <br>paint</p>
                <div class="price">₱50,000.00</div>
                <div class="button">
                    <a href="contact.php" class="register">Register</a>
                </div>
            </div>
            
            <div class="preview" data-target="p-4">
                <i class="fas fa-times"></i>
                <img src="4.jpg" alt="">
                <h3> EleganceEmbrace</h3>
                <p>Plywood, Solid Wood, Stainless, Paint</p>
                <div class="price">₱12,000.00</div>
                <div class="button">
                    <a href="contact.php" class="register">Register</a>
                </div>
            </div>
            
            <div class="preview" data-target="p-5">
                <i class="fas fa-times"></i>
                <img src="5.jpg" alt="">
                <h3> RefinedRendezvous Cabinet</h3>
                <p>Plywood, Solid Wood, Laminate</p>
                <div class="price">₱15,000.00</div>
                <div class="button">
                    <a href="contact.php" class="register">Register</a>
                </div>
            </div>
        
            <div class="preview" data-target="p-6">
                <i class="fas fa-times"></i>
                <img src="6.jpg" alt="">
                <h3>GlamourGrove Cupboard</h3>
                <p>Plywood, solid wood, Mdf</p>
                <div class="price">₱35,000,00</div>
                <div class="button">
                    <a href="contact.php" class="register">Register</a>
                </div>
            </div>
        
            <div class="preview" data-target="p-7">
                <i class="fas fa-times"></i>
                <img src="7.jpg" alt="">
                <h3>SplendorSuite Cabinet</h3>
                <p>Plywood, Solid Wood, Mdf</p>
                <div class="price">₱35,000.00</div>
                <div class="button">
                    <a href="contact.php" class="register">Register</a>
                </div>
            </div>
        
            <div class="preview" data-target="p-8">
                <i class="fas fa-times"></i>
                <img src="8.jpg" alt="">
                <h3>ExquisiteExpanse Cupboard</h3>
                <p>Plywood, solid wood, Mdf, Glass</p>
                <div class="price">₱30,000.00</div>
                <div class="button">
                    <a href="contact.php" class="register">Register</a>
                </div>
            </div>
        
            <div class="preview" data-target="p-9">
                <i class="fas fa-times"></i>
                <img src="9.jpg" alt="">
                <h3>PrestigePalace Cabinet</h3>
                <p>Plywood, Solid Wood, Paint</p>
                <div class="price">₱40,000.00</div>
                <div class="button">
                    <a href="contact.php" class="register">Register</a>
                </div>
            </div>
        </div>

<script>
    let previewContainer = document.querySelector('.products-preview');
let previewBox = previewContainer.querySelectorAll('.preview');

document.querySelectorAll('.products-container .product').forEach(product => {
    product.onclick = () => {
        previewContainer.style.display = 'flex';
        let name = product.getAttribute('data-name');
        previewBox.forEach(preview => {
            let target = preview.getAttribute('data-target');
            if (name == target) {
                preview.classList.add('active');
            }
        });
    };
});

previewBox.forEach(close =>{
    close.querySelector('.fa-times').onclick = () =>{
      close.classList.remove('active');
      previewContainer.style.display = 'none';
    };
});
</script>

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

</body2>
</body>
</html2> 