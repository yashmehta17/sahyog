
<?php require_once("../resources/config.php");?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
	$pid = isset($_GET['pid']) ? $_GET['pid'] : '';
	$query = "SELECT * FROM `product` WHERE pid = '$pid' ";
	$queryrun = mysqli_query($con , $query);
	$row = mysqli_fetch_assoc($queryrun);
	?>
	<?php echo '<title>'.$row["pname"].'</title>';?>
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

	<?php include("nav.php"); ?>


	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<?php
				$pid = isset($_GET['pid']) ? $_GET['pid'] : '';
				$query = "SELECT * FROM `product` WHERE pid = '$pid' ";
				$queryrun = mysqli_query($con , $query);
				$row = mysqli_fetch_assoc($queryrun);
				?>
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view" style = "width:500px; height: 500px;">
								<?php echo '<img src="data:image/jpeg;base64,',base64_encode($row['productimage']),'"/>';?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<br><br><?php echo '<h1 class="product-name">'.$row['pname'].'</h1>';?><br>
							<?php echo '<h2 class="product-price">₹ '.$row['price'].'</h2>';?><br>
							<p><b>Description:</b>
							<?php echo $row['description']; ?>
							</p><br>
							
							<?php  
								echo '<form action="addcart.php" method="post">
								<div class="product-btns">
										<div class="qty-input">
											<span class="text-uppercase">QTY: </span>
											<input class="input" type="number" value="1" name="qty">
										</div>
										<input type="hidden" name="pid" value="'.$pid.'">
										<button class="primary-btn add-to-cart" name="add"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								</div>
							</form>';
							?>
							
							
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li><a data-toggle="tab" >Reviews</a></li>
							</ul>
								<div  class="tab-pane fade in">
									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												<?php
												$sql = "SELECT * FROM review INNER JOIN customer ON review.cid=customer.cid WHERE `pid` = '$pid'";
												$result = mysqli_query($con, $sql);
												while($row = mysqli_fetch_array($result)){
												echo '
												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> '.$row['cname'].'</a></div>
													</div>
													<div class="review-body">
														<p>'.$row['review'].'</p>
													</div>
												</div>';
												}
												?>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<p>Your email address will not be published.</p>
											<form action="addreview.php" method="post" class="review-form">
												<div class="form-group">
													<textarea class="input" name="review" placeholder="Your review" required></textarea>
												</div>
												<?php echo '<input type="hidden" name="pid" value="'.$pid.'">';?>
												<button type="submit" class="primary-btn" name="addreview">Submit</button>
											</form>
										</div>
									</div>



								</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
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
