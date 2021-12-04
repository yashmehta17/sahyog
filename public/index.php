
<?php require_once("../resources/config.php"); ?>

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
	<?php include("nav.php"); ?>

	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<div class="home-wrap" style="margin-left: 0px;">
				<div id="home-slick">
					<div class="banner banner-1">
						<img src="./img/banner01.png" alt="">
					</div>
					<div class="banner banner-1">
						<img src="./img/banner02.png" alt="">
					</div>
					<div class="banner banner-1">
						<img src="./img/banner03.png" alt="">
					</div>
					<div class="banner banner-1">
						<img src="./img/banner04.png" alt="">
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

	<!-- category section -->
	<div class="section">
		<div class="container">
			<?php
					$sql = "SELECT * FROM `category`";
					$result = mysqli_query($con , $sql);
					$i = 1;
					while($row = mysqli_fetch_assoc($result)){
						$categoryname = $row['categoryname'];
						echo '	<div class="col-md-4 col-sm-6">
											<a class="banner banner-1" href="products.php?cid='.$row['categoryid'].'">
												<img style="border: 2px solid black; border-radius:5px;" src="data:image/jpeg;base64,',base64_encode($row['categoryimage']),'"/>
												<div class="banner-caption text-center">
													<h2 class="blue-color">'.$categoryname.'</h2>
												</div>
											</a>
								</div>';
			}
			?>
		</div>
	</div>
	<!-- /category section -->

	<?php include("footer.php"); ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
