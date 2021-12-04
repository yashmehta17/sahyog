<?php require_once("../resources/config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Checkout</title>
	<link rel="shortcut icon" href="./img/favicon.png" />
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css?<?php echo rand(); ?>" />


</head>

<body>

	<?php include("nav.php"); ?>

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form action="placeorder.php" id="checkout-form" class="clearfix" method="post">
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing Details</h3>
							</div>
							<!-- <div class="form-group">
								<input class="input" type="text" name="name" placeholder="Name" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address1" placeholder="Address Line 1" required>
							</div>
              				<div class="form-group">
								<input class="input" type="text" name="address2" placeholder="Address Line 2" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="pincode" placeholder="PIN Code" required>
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="phone" placeholder="Phone Number" required>
							</div> -->


							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Name" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" placeholder="Address Line 2" name="address1" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address2" placeholder="Address Line 2" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="pincode" placeholder="PIN Code" pattern="^[0-9]{6}$" title="Invalid Pincode" required>
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="phone" placeholder="Phone Number" required>
							</div>
						</div>
					</div>



					<div class="col-md-6">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>
							<table class="shopping-cart-table table">
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<?php
										$cid = $_SESSION['cid'];
										$sql = "SELECT * FROM `order` WHERE orderid = (SELECT max(orderid) as MAXOID FROM `order` WHERE cid = '$cid')";
										$result = mysqli_query($con, $sql);
										$row = mysqli_fetch_assoc($result);
										echo '<th colspan="2" class="total">₹ ' . $row['totalamount'] . '</th>'; ?>
									</tr>
								</tfoot>
							</table>
							<div class="pull-right">
								<?php echo '<input type="hidden" name="total" value="' . $row['totalamount'] . '">
								<input type="hidden" name="orderid" value="' . $row['orderid'] . '">'; ?>
								<button class="primary-btn" name="placeorder">Place Order</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->




	<?php include("footer.php"); ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>