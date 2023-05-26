<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>book</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
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

<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
   <h1>Book Now</h1>
</div>

<!-- booking section starts  -->

<section class="booking">

   <h1 class="heading-title">Book Your Trip!</h1> 
   <?php
      require('config.php');
      if(isset($_GET['pid'])){
         session_start();
         if(!isset($_SESSION['uid']))
         {
            header('location: login.php');
         }
         else
         {
            $uid=$_SESSION['uid'];
            $pid=$_GET['pid'];
            
            $_SESSION['pid']=$pid;
            $sql="SELECT * from packages where pid = $pid";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $pname= $row['package_name'];
            $sql="SELECT * from credentials where uid = $uid";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $name= $row['name'];
            $email = $row['email'];
        } 
    }
   ?>

   <form action="book_form.php" method="post" class="book-form">

      <div class="flex">
         <div class="inputBox">
            <span>Name :</span>
            <input type="text" placeholder="enter your name" value=<?=$name;?> name="name">
         </div>
         <div class="inputBox">
            <span>Email :</span>
            <input type="email" placeholder="enter your email" value=<?=$email;?> name="email">
         </div>
         <div class="inputBox">
            <span>Phone :</span>
            <input type="number" placeholder="enter your number" name="phone">
         </div>
         <div class="inputBox">
            <span>Package :</span>
            <input type="text" placeholder="enter package name" value=<?=$pname;?> name="package" readonly>
         </div>
         <div class="inputBox">
            <span>Number of Guests :</span>
            <input type="number" placeholder="number of guests" name="guests">
         </div>
         <div class="inputBox">
            <span>Arrivals :</span>
            <input type="date" name="arrivals">
         </div>
       </div>
      <input type="submit" value="Submit" class="btn" name="send">

   </form>

</section>

<!-- booking section ends -->

















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
         <a href="#"> <i class="fas fa-map"></i> Sagar[M.P], India - 470004 </a>
      </div>

      <div class="box">
         <h3>Follow Us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> Facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> Twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> Linkedin </a>
      </div>

   </div>

   <div class="credit"> created by <span>Samriddhi Chaturvedi, Harshita Patni, Nisha Tare, Nikita Rahangdale</span> | all rights reserved! </div>

</section>

<!-- footer section ends -->









<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>