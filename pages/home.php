

<?php
include "../db_conn.php";

$sql="SELECT * FROM products";
$all_product=$conn->query($sql);
session_start(); 
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}



// if (!(isset($_SESSION['loggedIN']) && $_SESSION['loggedIN'] === true)) {
  
//     // echo '<li><a href="dashboard.php">Dashboard</a></li>';
//     header("Location:dashboard.php");

//   } 
//   else{
//     // header("Location:home.php"); 
//   }

// ?>  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GYM Website</title>
  <link rel="stylesheet" href="style.css">
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>
<script type="text/javascript">
   (function(){
      emailjs.init("jerdULPQNJXnuYWjh");
   })();
</script>
  
</head>

<body onload="fetchHomeproducts()">
  <section id="landing_page">
    <nav id="header" style="color:var(--white)">
      <span>CAMP<span style="color: var(--green);">FIT</span></span>
      <div class="navbaroptions">
        <ul> 
                            <li><a href="#">Home</a></li>
                            <li><a href="#services">Service</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#products-items">Products</a></li>
                            <li><a href="#pricing">Pricing</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <!-- <li class="register"><a href="./pages/register.html">Register</a></li> -->
                            <li class="cart" id="cart"><a href="cart.php">Cart</a></li>
                        
          <?php   
                // if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
                // ?>
                <ul class="logout"><li><a href="../logout.php" style="color:var(--green)">Logout</a></li></ul>
                
                <?php
                
                    // }else{
                    //     header("Location: ../index.php");
                    //     exit(); 
                    // }
                ?>
        </ul>
      </div>
    </nav>

    
  
    <div id="lpContent">
      <div class="leftContent" style="color: var(--white);">
        <p class="title">BUILD YOUR BODY INTO <span style="color: var(--green);">HEALTHY</span> AND <span
            style="color: var(--green);">STRONG BODY.</span></p>
        <p class="caption" style="color:var(--grey);opacity: 0.8;">Sport is part of health, so be deligent in exercising
          so that the body becomes stronger and healthier to improve health and keep away from injury</p>
        <div class="buttons">
          <button id="joinbtn">Join Member</button>
          <div class="button2" style="background: transparent; color: var(--white);opacity: 0.5;">
            <img src="../images/play-button.png" alt="">
            Watch Training
          </div>
        </div>
      </div>
      <div class="rightContent">
        <img src="../images/gym1.png" alt="" width="600px" height="740px" style="padding:50px;padding-top: 80px;">
      </div>
    </div>
  </section>
  <section class="services" id="services">
    <p class="title heading" style="color: var(--white);">THIS IS OUR <span style="color: var(--green);">SERVICE</span>
      DURING TRAINING</p>
    <div class="services-card">
      <div class="card">
        <div class="services-icon"><img src="../images/services_icon1.png" alt=""></div>
        <p class="services-title">Free food and drink during training</p>
        <p class="services-subtitle">We provide a variety of vitamin-
          rich foods and snacks for you
          during your training</p>
        <span class="learn_more">Learn More</span>
      </div>
      <div class="card">
        <div class="services-icon"><img src="../images/services_icon1.png" alt=""></div>
        <p class="services-title">Free to choose
          fitness trainer</p>
        <p class="services-subtitle">you can determine which trainer
          you want during the fitness
          tutorial, as well as a trainer who
          is ready to guide you</p>
        <span class="learn_more">Learn More</span>
      </div>
      <div class="card">
        <div class="services-icon"><img src="../images/services_icon1.png" alt=""></div>
        <p class="services-title">Free food and drink during training</p>
        <p class="services-subtitle">We provide a variety of vitamin-
          rich foods and snacks for you
          during your training</p>
        <span class="learn_more">Learn More</span>
      </div>
      <div class="card">
        <div class="services-icon"><img src="../images/services_icon1.png" alt=""></div>
        <p class="services-title">Free food and drink during training</p>
        <p class="services-subtitle">We provide a variety of vitamin-
          rich foods and snacks for you
          during your training</p>
        <span class="learn_more">Learn More</span>
      </div>
    </div>
  </section>
  <section class="gallery" id="gallery">
    <p class="gallery-title title" style="color: var(--white);">SEE HOW YOU TURN YOURSELF INTO A <span
        style="color: var(--green);">CHAMPION</span></p>

    <div class="video_file">
      <div class="gym_video">
        <video height="450px" width="790px" autoplay loop muted style="border-radius: 2rem;">
          <source src="../video/gym_gallery.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <div class="achievements">
        <div class="left-content">
          <p style="color: white;margin-bottom: 30px;">The achievements of our members who
            have brought the name of fitness to be
            more famous</p>
          <span style="color: var(--green);">Read More </span>
        </div>
        <div class="right-content" >
          <div class="contents" style="color:var(--white)">
            <span>57<span style="color: var(--green);">K</span> </span>
            <span style="color:var(--grey)">world
              Champions</span>
          </div>
          <div class="contents" style="color:var(--white)">
            <span>57<span style="color: var(--green);">K</span> </span>
            <span style="color:var(--grey)">world
              Champions</span>
          </div>
          <div class="contents" style="color:var(--white)">
            <span>57<span style="color: var(--green);">K</span> </span>
            <span style="color:var(--grey)">world
              Champions</span>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="products-items" class="swiper mySwiper products-items">
    <p class="gallery-title title" style="color: var(--white);margin-bottom: 30px;"> Our <span
      style="color: var(--green);">Products</span></p>
  <main class="swiper-wrapper products " id="products">
    
  </main>
</section>

  <section class="pricing" id="pricing">
    <p class="title heading " id="pricing_title" style="color: var(--white);"> OUR SPECIAL <span
        style="color: var(--green);">MONTHLY </span>TRAINING PACKAGE </p>
    <div class="pricing_cards_Container">
      <div class="card1 pricing_card">
        <div class="top-price-content">
          <span class="pricing_text" style="color: var(--green); font-size: 20px;">Package</span>
          <p class="pricing-title">BRONZE</p>
          <p class="pricing-title">$30</p>
        </div>
        <ul class="pricing-service-list">
          <li>3 hour dive training time</li>
          <li>Free snacks and drinks</li>
          <li>Free access gym community</li>
          <li>Free consultant coach 30 minutes</li>
        </ul>
        <button class="subscribe_btn">subscribe</button>
      </div>
      <div class="card1 pricing_card">
        <span class="pricing_text" style="color: var(--green); font-size: 20px;">Package</span>
        <div class="top-price-content">
          <p class="pricing-title">GOLD</p>
          <p class="pricing-title">$75</p>
        </div>
        <ul class="pricing-service-list">
          <li>All Day Training Time</li>
          <li>Free Unlimited Snacks And Drink</li>
          <li>Free Access Gym Community</li>
          <li>Free Consultant Coach 2 Hours</li>
          <li>Free Swimming Pool And Yoga</li>
          <li>Audio Room And Rest Area</li>
        </ul>
        <button class="subscribe_btn">subscribe</button>
      </div>
      <div class="card1 pricing_card">
        <div class="top-price-content">
          <span class="pricing_text" style="color: var(--green); font-size: 20px;">Package</span>
          <p class="pricing-title">SILVER</p>
          <p class="pricing-title">$45</p>
        </div>
        <ul class="pricing-service-list">
          <li>All Day Training Time</li>
          <li>Free Unlimited Snacks And Drink</li>
          <li>Free Access Gym Community</li>
          <li>Free Consultant Coach 2 Hours</li>
        </ul>
        <button class="subscribe_btn">subscribe</button>
      </div>
    </div>
  </section>


  
  <section class="contact" id="contact">
    <div class="contact-container">
      <p class="contact-title" style="color: var(--white);">CONTACT <span style="color: var(--green);font-family: 'Bebas Neue', sans-serif;">US</span>
      <form action="" method="post">
        <input type="text" id="name" name="name" placeholder='Your Name' required />
        <input type="email" id="email"  name='email'  placeholder="Your Email" required />
        <textarea name="message" id="message"  rows="7" placeholder="Your message" required></textarea>
        <button type='submit' class="subscribe_btn" style="width: 150px;height: 40px; font-size: 15px;" onclick="sendMail()">Send Message</button>
      </form>
    </div>
  </section>


  <footer>
    <a href="#" class='footer__logo'>CAMP<span style="color: var(--white);">FIT</span></a>
    <ul class='permalinks'>
    <li><a href="#">Home</a></li>
    <li><a href="#gallery">gallery</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#pricing">buy</a></li>
    <li><a href="#contact">Contact</a></li>
    </ul>
    </div>
    <div class="footer__copyright">
      <small>&copy;.2023 CAMPFIT . ALL rights reserved</small>
    </div>
  </footer>


     
  <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script>

<script src="../services/firebase.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


    <!-- Initialize Swiper -->
    <script>

      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });


function sendMail() {
  var name= document.getElementById("name").value;
   var  email= document.getElementById("email").value;
    var message= document.getElementById("message").value;
  var params = {
    name: document.getElementById("name").value,
    email: document.getElementById("email").value,
    message: document.getElementById("message").value,
  };

  const serviceID = "service_mcrw069";
  const templateID = "template_z0tqhqj";

  if(name!=null && email!=null && message!=null && name!='' && email!='' && message!=''){
  emailjs
    .send(serviceID, templateID, params)
    .then((res) => {
      document.getElementById("name").value = "";
      document.getElementById("email").value = "";
      document.getElementById("message").value = "";
      console.log(res);
      alert("your messgae sent successfully");
    })
    .catch((err) => console.log(err));
    alert("Message Sent")
  }
}

    </script>
      <!-- <script src="./script.js" ></script> -->
</body>
</html>