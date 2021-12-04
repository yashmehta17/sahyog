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
	// if($_SESSION['loggedin']==false){
	// 	header("location: login.php");
	// 	exit;	
	// }

	// if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
			
	// }
	// else {
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
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="shortcut icon" href="./img/favicon.png" />
	<title>Order Details</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css?<?php echo rand();?>" />

</head>

<body>
	<!-- HEADER AND NAVIGATION -->
	<?php include("nav.php"); ?>
	<!-- /HEADER AND NAVIGATION -->


	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix">

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Details</h3>
								<!-- <h4 class="text-right">Order No</h4> -->
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
                                        <th class="text-center">Product</th>
										<th class="text-center">Date</th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-center">Status</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$cid = $_SESSION['cid'];
									$oid = $_GET['oid'];

                                    // $sql= "SELECT * FROM `orderhistory`WHERE `cid` = '$cid' AND `orderid` = '$oid'";
									$sql= "SELECT * FROM `orderhistory` INNER JOIN `product` ON orderhistory.pid = product.pid WHERE `cid` = $cid AND `orderid` = $oid";
                                    $result = mysqli_query($con, $sql);
									$total=0;
									while($row = mysqli_fetch_array($result))
									{
										$total= $total+ $row['cost'];
										$orgDate = $row['date'];  
    									$newDate = date("d-m-Y", strtotime($orgDate));
										if ($row['status']==0){
											$status="Pending";
										} elseif ($row['status']==1) {
											$status="In Process";
										}
										elseif ($row['status']==2) {
											$status="Complete";
										}


										echo '
									<tr>
										<td class="price text-center"><a href="product-page.php?pid='.$row['pid'].'" target="_blank" rel="noopener noreferrer"><h4><strong>'.$row['pname'].'</strong></h4></a></td>
										<td class="price text-center"><strong>'.$newDate.'</strong></td>
										<td class="price text-center"><strong>'.$row['price'].'</strong></td>
										<td class="price text-center"><strong>'.$row['quantity'].'</strong></td>
										<td class="price text-center"><h4><strong>'.$row['cost'].'</strong></h4></td>
										<td class="price text-center"><strong>'.$status.'</strong></td>
										
									</tr>';
									}
									?>
								</tbody>
								<tfoot>
									<?php   
									
									echo'
									<tr>
										<th class="empty" colspan="3"></th>
										<th class="total"><strong>TOTAL</strong></th>
										<th colspan="2" class="total">₹ '.$total.'</th>
									</tr>';
									?>
								</tfoot>
								
							</table>
							
						</div>
					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

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
