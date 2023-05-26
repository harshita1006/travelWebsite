<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Package</title>

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

<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['name']; ?></h1>
    <p><?php echo $_SESSION['email']; ?></p>
    <h3><a href="bookings.php">My Bookings</a></h3>
    <br>
    <h3><a href="logout.php">Logout</a></h3>

</body>
</html>

