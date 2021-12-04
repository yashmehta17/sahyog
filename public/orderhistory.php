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
	<link rel="shortcut icon" href="./img/favicon.png" />
	<title>Order History</title>

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
								<h3 class="title">Order History</h3>
							</div>
							<table class="order-history-table table">
								<thead>
									<tr>
										<th class="text-center">Order ID</th>
										<th class="text-center">Date</th>
										<th class="text-center">Amount</th>
										<th class="text-center">View</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$cid = $_SESSION['cid'];
									

                                    $sql= "SELECT sum(cost) as total,`orderid`, `date` FROM `orderhistory`WHERE `cid` = '$cid' GROUP BY `orderid` ORDER BY date DESC";
                                    $result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_array($result))
									{

										$orgDate = $row['date'];  
    									$newDate = date("d-m-Y", strtotime($orgDate));
										echo '
											<tr onclick="window.location=\'orderdetail.php?oid='.$row['orderid'].'\'">
												<td class="details text-center"><h4><strong>'.$row['orderid'].'</h4></td>
												<td class="price text-center"><strong>'.$newDate.'</strong></td>
												<td class="qty text-center"><h4><strong>'.$row['total'].'</strong></h4></td>
												<td class="text-center">
													<a href="orderdetail.php?oid='.$row['orderid'].'" class="main-btn">View</button>
												</td>
											</tr>';
									}
									?>
								</tbody>
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
