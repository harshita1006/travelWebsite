<?php 
    require('razorpay-php-master\Razorpay.php'); 
    session_start();
    require('config.php');
    if(!isset($_SESSION['email'])) 
    {
        header('location:home.php');
        exit();
    }
    else 
    {
        $uid=$_SESSION['uid'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Payment - Techno Smarter </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 form-container">
                <h1>Payment</h1>
                <hr>
                <?php 
                    include("gateway-config.php");
                    //Razorpay//
                    use Razorpay\Api\Api;

                    $api = new Api($keyId, $keySecret);
                    $name=$_SESSION['name']; 
                    $email=$_SESSION['email'];
                    $mobile=$_SESSION['phone'];
                    $package=$_SESSION['package'];
                    $guests=$_SESSION['guests'];
                    $arrivals=$_SESSION['arrivals'];

                    $uid=$_SESSION['uid'];
                    $pid=$_SESSION['pid'];
                    $sql="SELECT * from packages WHERE pid= $pid"; 
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_array($result);
                    $price=$row['package_price'];
                    $_SESSION['price']=$price;
                    $title=$row['package_name'];  
                    $webtitle='Aapka Travel Planner'; // Change web title
                    $displayCurrency='INR';
                    $imageurl='https://technosmarter.com/assets/images/Avatar.png'; //change logo from here
                    $orderData = 
                    [
                        'receipt'         => 3456,
                        'amount'          => $price * 100, // 2000 rupees in paise
                        'currency'        => 'INR',
                        'payment_capture' => 1 // auto capture
                    ];
                    $razorpayOrder = $api->order->create($orderData);

                    $razorpayOrderId = $razorpayOrder['id'];

                    $_SESSION['razorpay_order_id'] = $razorpayOrderId;

                    $displayAmount = $amount = $orderData['amount'];

                    if ($displayCurrency !== 'INR')
                    {
                        $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
                        $exchange = json_decode(file_get_contents($url), true);

                        $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
                    }

                    $data = [
                        "key"               => $keyId,
                        "amount"            => $amount,
                        "name"              => $webtitle,
                        "description"       => $title,
                        "image"             => $imageurl,
                        "prefill"           => [
                        "name"              => $name,
                        "email"             => $email,
                        "contact"           => $mobile,
                        ],
                        "notes"             => [
                        "merchant_order_id" => "12312321",
                        ],
                        "theme"             => [
                        "color"             => "#F37254"
                        ],
                        "order_id"          => $razorpayOrderId,
                    ];

                    if ($displayCurrency !== 'INR')
                    {
                        $data['display_currency']  = $displayCurrency;
                        $data['display_amount']    = $displayAmount;
                    }

                    $json = json_encode($data);


                ?>
                <div class="row"> 
                    <div class="col-8"> 
                        <h4>(Payer Details)</h4>
                        <div class="mb-3">
                            <label  class="label">Name :- </label>
                            <?php 
                                echo $name; 
                            ?>
                        </div>
                        
                        <div class="mb-3">
                            <label class="label">Email:- </label>
                            <?php 
                                echo $email; 
                            ?>
                        </div>

                        <div class="mb-3">
                            <label class="label">Mobile:- </label>
                            <?php 
                                echo $mobile; 
                            ?>
                        </div>
                    </div>
                    
                    <div class="col-4 text-center">
                    <?php 
                        $sql="SELECT * from packages WHERE pid=$pid"; 
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($result);
                       echo 
                        '<div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="'.$row['p_image'].'" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">'.$row['package_name'].'</h5>
                                
                                <p class="card-text">Rs. '.$row['package_price'].' </p>
                            </div>
                        </div>';
                    ?> 
                    <br>
                    <center>
                    <form action="verify.php" method="POST">
                    <script
                        src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="<?php echo $data['key']?>"
                        data-amount="<?php echo $data['amount']?>"
                        data-currency="INR"
                        data-name="<?php echo $data['name']?>"
                        data-image="<?php echo $data['image']?>"
                        data-description="<?php echo $data['description']?>"
                        data-prefill.name="<?php echo $data['prefill']['name']?>"
                        data-prefill.email="<?php echo $data['prefill']['email']?>"
                        data-prefill.contact="<?php echo $data['prefill']['contact']?>"
                        data-notes.shopping_order_id="<?php echo $id;?>"
                        data-order_id="<?php echo $data['order_id']?>"
                        <?php 
                            if ($displayCurrency !== 'INR') 
                            { ?> 
                            data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
        <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
    >
    </script>
    <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
    <input type="hidden" name="shopping_order_id" value="<?php echo $id;?>">
    </form>
    </center>

                    </div>
                    </div>
            </div>
        </div>
    </div>
    </body>
</html>