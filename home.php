<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Home</title>

   <!-- swiper css link -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo">Aapka Travel Planner.</a>

   <nav class="navbar">
      <a href="home.php">Home</a>
      <a href="about.php">About</a>
      <a href="package.php">Package</a>
      <a href="dashboard.php">Account</a>
      
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends  -->

<!-- home section starts  -->

<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/homeslide1.jpg) no-repeat">
            <div class="content">
               <span>Explore, Discover, Travel</span>
               <h3>Travel Around India</h3>
               <a href="package.php" class="btn">Discover More</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home-slide-2.jpg) no-repeat">
            <div class="content">
               <span>Explore, Discover, Travel</span>
               <h3>Discover the New Places</h3>
               <a href="package.php" class="btn">Discover More</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home-slide-3.jpg) no-repeat">
            <div class="content">
               <span>Explore, Discover, Travel</span>
               <h3>Make your Tour Worthwhile</h3>
               <a href="package.php" class="btn">Discover More</a>
            </div>
         </div>
         
      </div>


      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>

<!-- home section ends -->

<!-- services section starts  -->

<section class="services">

   <h1 class="heading-title"> Our Services </h1>

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>Adventure</h3>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>Tour Guide</h3>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>Trekking</h3>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>Camp Fire</h3>
      </div>

      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>Off Road</h3>
      </div>

      <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>Camping</h3>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- home about section starts  -->

<section class="home-about">

   <div class="image">
      <img src="images/about-img.jpg" alt="">
   </div>

   <div class="content">
      <h3>About Us</h3>
      <p>Aapka Travel Planner is a tour operator and travel agency located in Sagar,MP.
         We specialize in tours in Madhya Pradesh but now we are expanding and enhancing our wide range of offers, as well as adding new and exciting tours of all over India.
         A group of friends-owned business based in Sagar, Aapka Travel Planner was founded in 2022 by us and since that humble beginning it will grow into a trusted resource that would help tens of thousands of people better enjoy their travel.</p>
      <a href="about.php" class="btn">Read More</a>
   </div>

</section>

<!-- home about section ends -->

<!-- home packages section starts  -->

<section class="home-packages">

   <h1 class="heading-title"> Our Packages </h1>

   <div class="box-container">
      <?php
         require('config.php');
         $sql = "SELECT * from packages";
         $result = mysqli_query($conn,$sql);
         $count=1;
         while($row=mysqli_fetch_array($result))
         {
      ?>   
      <div class="box">   
         <div class="image">
            <img src="<?= $row['p_image']; ?>" >
         </div>
         <div class="content">
            <h3><?= $row['package_name'];?></h3>
            <p><?= $row['p_description'];?></p>
            <!--<a href="thailand.php" class="btn">Discover More</a>-->
            <h4>Starting from <?= $row['package_price'];?></h4>
            <a href="order.php?pid=<?=$row['pid']; ?>" class="btn">More Details</a>
         </div>
      </div>
      <?php 
         $count++;
         if($count>6)
         {   
            break;
         }
      } ?>
   </div>

   <div class="load-more"> <a href="package.php" class="btn">Load More</a> </div>

</section>

<!-- home packages section ends -->

<!-- home offer section starts  

<section class="home-offer">
   <div class="content">
      <h3>Upto 50% Off</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure tempora assumenda, debitis aliquid nesciunt maiores quas! Magni cumque quaerat saepe!</p>
      <a href="book.php" class="btn">Book Now</a>
   </div>
</section>

 home offer section ends -->

















<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>Quick Links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> Home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> About</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> Package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> Book</a>
      </div>

      <div class="box">
         <h3>Extra Links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> Ask Questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> About Us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> Privacy Policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> Terms of Use</a>
      </div>

      <div class="box">
         <h3>Contact Info</h3>
         <!--<a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
         <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>-->
         <a href="#"> <i class="fas fa-envelope"></i> aapkatravelplanner@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> Sagar[M.P],India - 470004 </a>
      </div>

      <div class="box">
         <h3>Follow Us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> Facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> Twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> Linkedin </a>
      </div>

   </div>

   <div class="credit"> created by <span>Samriddhi Chaturvedi, Harshita Patni, Nisha Tare, Nikita Rahangdale </span> | all rights reserved! </div>

</section>

<!-- footer section ends -->









<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>