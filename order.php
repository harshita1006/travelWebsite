<?php
   require('config.php');
   if(isset($_GET['pid'])){
      $pid=$_GET['pid'];
      $sql="SELECT * FROM packages WHERE pid = '$pid'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result);

      $pname=$row['package_name'];
      $pdesc=$row['p_description'];
      $pimage=$row['p_image'];
      $iday1=$row['iday1'];
      $iday2=$row['iday2'];
      $iday3=$row['iday3'];
      $iday4=$row['iday4'];
      $iday5=$row['iday5'];
      $iday6=$row['iday6'];
   }
   else{
      echo 'No Package Found';
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Details</title>
   
   <!-- swiper css link -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link -->
   <link rel="stylesheet" href="css/style.css">

   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

   <!-- jQuery library -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

   <!-- Popper JS -->
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

   <!-- Latest compiled JavaScript -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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

<div class="heading" style="background:url(images/header-bg-2.png) no-repeat">
   <h1><?= $pname; ?></h1>
</div>

</section>
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-10 mb-5">
         <!--<h2 class="text-center p-2 text-primary">Fill the details to complete your order</h2>-->
         <h3>Package Details: </h3>
         <table class="table-bordered" width="100%">
            <tr>
               <th width="15%" >Package Name: </th>
               <td><?= $pname; ?></td>
            </tr>
            <tr>
               <th >Package Overview: </th>
               <td><?= $pdesc; ?></td>
            </tr>
         </table>
      </div>
   </div>
         <h3>Tour Itinerary: </h3>
         <table class="table-bordered" width="1000px">
            <tr>
               <th width="15%" >Day 1: </th>
               
               <td><?= $iday1; ?></td>
            </tr>
            <tr>
               <th>Day 2: </th>
               <td><?= $iday2; ?></td>
            </tr>
            <tr>
               <th>Day 3: </th>
               <td><?= $iday3; ?></td>
            </tr>
            <tr>
               <th>Day 4: </th>
               <td><?= $iday4; ?></td>
            </tr>
            <tr>
               <th>Day 5: </th>
               <td><?= $iday5; ?></td>
            </tr>
            <tr>
               <th>Day 6: </th>
               <td><?= $iday6; ?></td>
            </tr>
         </table>
         <a href="book.php?pid=<?=$row['pid']; ?>" class="btn">Book Now</a>
      </div>
   </div>
</div>













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