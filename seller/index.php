
<?php require_once("../resources/config.php"); ?>
<?php require_once("requirelogin.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sahyog- Covid19 Resource Helper</title>
	<link rel="shortcut icon" href="./img/favicon.png" />
	
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css?<?php echo rand();?>" />


</head>

<body>
	<!-- HEADER AND NAVIGATION -->
	<?php include("nav.php"); ?>
	<!-- /HEADER AND NAVIGATION -->

	<!-- category section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- block -->
			

			<div class="col-md-12">
				<div class="order-summary clearfix">
					<div class="section-title">
						<h3 class="title">All Available Orders</h3>
						<!-- <h4 class="text-right">Order No</h4> -->
					</div>
					<table class="shopping-cart-table table">
						<thead>
							<tr>
								<th class="text-center">Product</th>
								<th class="text-center">Customer</th>
								<th class="text-center">Price</th>
								<th class="text-center">Quantity</th>
								<th class="text-right">Details</th>
							</tr>
						</thead>

						<tbody>
							<?php
							//$cid = $_SESSION['cid'];
							//$oid = $_GET['oid'];

							// $sql= "SELECT * FROM `orderhistory`WHERE `cid` = '$cid' AND `orderid` = '$oid'";
							$sql= "SELECT * FROM `orderhistory` INNER JOIN `product` ON orderhistory.pid = product.pid WHERE orderhistory.status = 0 ";
							$result = mysqli_query($con, $sql);

							
							// $total=0;
							while($row = mysqli_fetch_array($result))
							{
								$status = 'dsa';
								$customerid = $row['cid'];
								$sql1= "SELECT * FROM `customer` WHERE `cid` = '$customerid'";
								$result1 = mysqli_query($con, $sql1);
								$row1 = mysqli_fetch_assoc($result1);
								echo '
							<tr>
								<td class="price text-center"><a href="../public/product-page.php?pid='.$row['pid'].'" target="_blank" rel="noopener noreferrer"><strong>'.$row['pname'].'</strong></a></td>
								<td class="price text-center"><strong>'.$row1['cname'].'</strong></td>
								<td class="price text-center"><strong>'.$row['price'].'</strong></td>
								<td class="price text-center"><strong>'.$row['quantity'].'</strong></td>
								
								<td class="text-right">
									<a href="orderdetails.php?orderid='.$row['orderid'].'&pid='.$row['pid'].'" class="main-btn">info</button>
								</td>
								
							</tr>';
							}
							?>
						</tbody>
					</table>
					
				</div>
			</div>








			<!-- /block -->
		</div>
		<!-- /container -->
	</div>
	<!-- /category section -->

	<!-- FOOTER -->
	<?php include("footer.php"); ?>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
