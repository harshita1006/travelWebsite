<?php require("config.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payments | Bookings </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 form-container">
				<h1>Payments | Bookings</h1>
				<hr>
				<table class="table">
					<tr> 
						<th></th>
						<th>Package</th>
						<th>Paid Amount</th>
						<th>No of Guests</th>
						<th>Mobile</th>
						<th>Date of Journey</th>
						<th>Payment Date</th>
						<th>Txn Id </th>
						<th>Status</th>
					</tr>
				<?php 
					 session_start();
                     $uid=$_SESSION['uid'];
                     $sql="SELECT * from credentials,payments WHERE payments.uid=$uid and credentials.uid=$uid order by payments.payid DESC "; 
					 $result=mysqli_query($conn,$sql);
					 $row=mysqli_fetch_array($result); 
					 while($row=mysqli_fetch_array($result))
					 {
						$pid=$row['pid'];
					 $query="SELECT * from packages WHERE pid=$pid";
					 $result1=mysqli_query($conn,$query);
					 $row1=mysqli_fetch_array($result1);
				echo '<tr>
					<td style="vertical-align: middle"><img src="'.$row1['p_image'].'" height="100"></td>
					<td style="vertical-align: middle" >'.$row1['package_name'].'</td>
					<td style="vertical-align: middle">Rs.'.$row1['package_price'].'</td>
					<td style="vertical-align: middle">'.$row['guests'].'</td>
					<td style="vertical-align: middle">'.$row['mobile'].'</td>
					<td style="vertical-align: middle">'.$row['dateofjourney'].'</td>
					<td style="vertical-align: middle">'.$row['payment_date'].'</td>
					<td style="vertical-align: middle">'.$row['txnid'].'</td>
					<td style="vertical-align: middle">'.$row['status'].'</td>
				</tr>';
           }
				?> 
		</table> 
		</div>
	</div>
	
</div>
</body>
</html>