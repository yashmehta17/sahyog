
<?php require_once("../resources/config.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>FAQ</title>
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
				<form action="addfaq.php" id="checkout-form" class="clearfix" method="post">
					<div class="col-md-6">
						<div>
							<div class="section-title">
								<h4 class="title">FAQ</h4>
							</div>
							<?php
							$sql = "SELECT * FROM `faq`";
							$result = mysqli_query($con, $sql);
							while($row=mysqli_fetch_array($result)){
								echo '
							<p>
								<strong>'.$row['question'].'</strong>
							</p>
							<p>'.$row['answer'].'</p>
							<hr>';
							}
							?>
						</div>
					</div>

					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Post Your Question</h3>
							</div>
							<div class="form-group">
								<label for="category">Question</label>
								<textarea rows="10" cols="30" class="form-control" id="category" placeholder="Question" name="question"></textarea>
							  </div>
							<div class="form-group">
								<button class="primary-btn" name="addques">Add Question</button>
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
