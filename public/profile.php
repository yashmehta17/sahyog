<?php require_once("../resources/config.php"); ?>
<?php require_once("requirelogin.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="shortcut icon" href="./img/favicon.png" />
	<title>Profile</title>

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
				
                <div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Profile</h3>
							</div>
							<table class="order-history-table table" style="width:100% ">
								<!-- <thead>
									<tr>
										<th class="text-center"></th>
										<th class="text-center"></th>
										<th class="text-center"></th>
										<th class="text-center"></th>
									</tr>
								</thead> -->

								<tbody>
									<?php
										$cid = $_SESSION['cid'];
										$sql= "SELECT * FROM `customer` WHERE `cid` = '$cid'";
										$result = mysqli_query($con, $sql);
										$row = mysqli_fetch_assoc($result);
										echo '
											<tr>
												<td class="price text-center"><strong>Name</strong></td>
												<td class="price text-center">'.$row['cname'].'</td>
												<td class="text-center">
													<a href="edit-name.php" class="main-btn">Edit</a>
												</td>
											</tr>
                                            <tr style="cursor: no-drop;">
												<td class="details text-center"><h4><strong>Email</h4></td>
												<td class="price text-center">'.$row['cemail'].'</td>
												<td class="text-center" style="cursor: no-drop;">
													<a  class="main-btn" style="cursor: no-drop;">Edit</a>
												</td>
											</tr>
											<tr>
												<td class="details text-center"><h4><strong>Phone Number</h4></td>
												<td class="price text-center">'.$row['cphonenumber'].'</td>
												<td class="text-center">
													<a href="edit-phn.php" class="main-btn">Edit</a>
												</td>
											</tr>
                                            <tr>
												<td class="details text-center"><h4><strong>Password</h4></td>
												<td class="price text-center">********</td>
												<td class="text-center">
													<a href="change-password.php" class="main-btn">Edit</a>
												</td>
											</tr>
										';
									?>
								</tbody>
							</table>
						</div>
					</div>
                    <div class="col-md-2"></div>
				
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
