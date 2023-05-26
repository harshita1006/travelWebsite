<?php

   require('config.php');
   session_start();
   if(isset($_POST['send'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $package = $_POST['package'];
      $guests = $_POST['guests'];
      $arrivals = $_POST['arrivals'];
      if($arrivals<date("Y-m-d"))
      {
         echo 'Booking not Available on this Date';
         header("location:bookform.php");
      }
      $uid=$_SESSION['uid'];
      $pid=$_SESSION['pid'];
      $_SESSION['phone']=$phone;
      $_SESSION['package']=$package;
      $_SESSION['guests']=$guests;
      $_SESSION['arrivals']=$arrivals;
         header("location:pay.php");

   }else{
      echo 'something went wrong please try again!';
   }

?>