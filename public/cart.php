<?php require_once("../resources/config.php"); ?>
<?php require_once("requirelogin.php"); ?>

<?php
	// session_start();
	// if(!isset($_SESSION['loggedin'])) {
	// 	echo 123456;
	// 	header("location: login.php");
	// 	exit;	
	// }
	// session_abort();
	// if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
			
	// }
	// else {
	// 	header("location: login.php");
	// 	exit;
	// }
	// $has_session = session_status() == PHP_SESSION_ACTIVE;
	// echo $has_session;
	// if ($has_session)
	// session_start();
	// if (session_status() !== PHP_SESSION_DISABLED) {
	// 	echo 123456;
		// header("location: login.php");
		// exit;
	// }

	// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']=false){
	// 	header("location: login.php");
	// 	exit;
	// }

	// if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']=false){
	// 	header("location: login.php");
	// 	exit;
	// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="./img/favicon.png" />
	<title>Cart</title>

	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css?<?php echo rand();?>" />


</head>

<body>
	<?php include("nav.php"); ?>
	


	<div class="section">
		<div class="container">
			<div class="row">

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Cart</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th class="text-center">Price</th>
										<th></th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right">Delete</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$cid = $_SESSION['cid'];
									$sql = "SELECT * FROM cart INNER JOIN product ON cart.pid=product.pid WHERE `cartid` = '$cid'";
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_array($result))
									{
										echo '
									<tr>
										<td class="details">
											<h4><strong>'.$row['pname'].'</h4>
										</td>
										<td class="price text-center"><strong>₹ '.$row['price'].'</strong></td>
										<td></td>
										<td class="qty text-center"><h4><strong>'.$row['quantity'].'</strong></h4></td>
										<td class="total text-center"><strong class="primary-color">₹ '.$row['cost'].'</strong></td>
										<td class="text-right">
											<a href="deletecartproduct.php?pid='.$row['pid'].'" class="main-btn icon-btn"><i class="fa fa-close"></i></button>
										</td>
									</tr>';
									}
									?>
								</tbody>											
								<tfoot>
									<?php
									$sql = "SELECT sum(cost) as total FROM cart INNER JOIN product ON cart.pid=product.pid WHERE `cartid` = '$cid'";
									$result = mysqli_query($con, $sql);
									$row = mysqli_fetch_assoc($result);
									echo'
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">₹ '.$row['total'].'</th>
									</tr>';
									?>
								</tfoot>
							</table>
							<?php 
								if ($row['total']==0){
									echo'
									<div class="pull-right">
										<a href="products.php" class="primary-btn" name="checkout">Check Out</a>
									</div>
									';
								} else {
									echo'
									<form action="addorder.php" method="post">
										<div class="pull-right">
											<input type="hidden" name="total" value="'.$row['total'].'">
											<button class="primary-btn" name="checkout">Check Out</button>
										</div>
									</form>
									
									';
								}

							?>

							
						</div>
					</div>
			</div>
		</div>
	</div>

	<?php include("footer.php"); ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
