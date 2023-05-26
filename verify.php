<?php 
  require('razorpay-php-master\Razorpay.php'); 
  require("config.php");
  session_start();
  $uid=$_SESSION['uid'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment Verification - Techno Smarter </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12 form-container">
				<h1>Payment Status</h1>
<hr>


				<div class="row"> 
					<div class="col-8"> 
            <?php 
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
$success = true;
include("gateway-config.php");
$error = "Payment Failed";
if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}
if ($success === true)
{
  $name = $_SESSION['name'];
  $amount = $_SESSION['price'];
  $txnid = $_POST['razorpay_payment_id'];
  $uid = $_SESSION['uid'];
  $pid = $_SESSION['pid'];
  $email = $_SESSION['email'];
  $currency='Rs.';
  $phone = $_SESSION['phone'];
  $package = $_SESSION['package'];
  $guests = $_SESSION['guests'];
  $arrivals = $_SESSION['arrivals'];
  $productinfo='Payment';  

  $posted_hash = $_SESSION['razorpay_order_id'];
  if(isset($_POST['razorpay_payment_id']))
      
  
  
  $status='Success'; 
  $eid=$_POST['shopping_order_id']; 
  $subject='Your payment has been successful..';
  $key_value='okpmt'; 
    
  $date = new DateTime('now', new DateTimezone("Asia/Kolkata"));
  $payment_date=$date->format('Y-m-d H:i:s');
  
        $sql="SELECT * from payments WHERE txnid = '$txnid'"; 
        $result=mysqli_query($conn, $sql);
        $countts=mysqli_num_rows($result);
  if($txnid!=''){
    if($countts<=0)
    {
      $sql="INSERT INTO payments(name,amount,txnid,uid,payer_email,currency,mobile,pid,p_name,guests,dateofjourney,payment_date,status) 
      VALUES('$name','$amount','$txnid','$uid','$email','$currency','$phone','$pid','$package','$guests','$arrivals','$payment_date','$status')"; 
      $result=mysqli_query($conn,$sql);
}
 // start 
        echo ' <h2 style="color:#33FF00";>'.$subject.'</h2>   <hr>';

        echo '<table class="table">'; 
        echo '<tr> '; 
        $sql="SELECT * from payments WHERE txnid='$txnid'"; 
        $result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
{
    $dbdate = $row['payment_date'];
}
echo '<tr>  
          <th>Transaction ID:</th>
        <td>'.$txnid.'</td> 
    </tr>
     <tr> 
        <th>Paid Amount:</th>
        <td>'.$currency.' '. $amount.'</td> 
    </tr>
    <tr>
       <th>Payment Status:</th>
        <td>'.$status.'</td> 
   </tr>
   <tr> 
       <th>Payer Email:</th>
       <td>'.$email.'</td> 
   </tr>
    <tr> 
       <th>Name:</th>
       <td>'.$name.'</td>
   </tr>
   <tr> 
       <th>Package:</th>
       <td>'.$package.'</td>
   </tr>

   <tr>
       <th>Date :</th>
       <td>'.$dbdate.'</td> 
  </tr>
  </table>';
}
 else 
 {
  $html = "<p><div class='errmsg'>Invalid Transaction. Please Try Again</div></p>";   
  $error_found=1;      
 }    
}
else
{
    $html = "<p><div class='errmsg'>Invalid Transaction. Please Try Again</div></p>
             <p>{$error}</p>";
             $error_found=1;
}
if(isset($html)){
echo $html;
}
?>
					</div>
					<div class="col-4 text-center">
					<?php 
          $pid=$_SESSION['pid'];
          if(!isset($error_found)){
					 $sql="SELECT * from packages WHERE pid= $pid"; 
          $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
       echo '<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="'.$row['p_image'].'" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">'.$row['package_name'].'</h5>
  </div>
</div>';
}
				?> 
				<br> 
				</div>
				</div>
		</div>
	</div>	
</div>
</body>
</html>