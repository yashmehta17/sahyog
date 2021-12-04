<?php require_once("../resources/config.php"); ?>
<?php require_once("requirelogin.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./img/favicon.png" />
    <title>Edit Phone Number</title>

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


    <br>
    <br>
    <?php 
        $cid = $_SESSION['cid'];
        $sql = "SELECT * FROM `customer` WHERE `cid`='$cid'";
        $result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
        $name= $row['cname']; 
    ?>

    <!-- Edit name section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<form action = "save-name.php" method = "post">
				<div class="row">
					<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="section-title">
								<h3 class="title">Change Your Name</h3>
							</div>
                            <p>If you want to change the name associated with your customer account, you may do so below. Be sure to click the Save Changes button when you are done.</p>
							<hr>
                            <p><strong>New Name</strong></p>
							<div class="form-group">
								<input class="input" type="text" name="name" value="<?php echo $name ?>">
							</div>
							<div class="pull-right">
								<button class="primary-btn">Save Changes</button>
							</div>
						</div>
					<div class="col-md-3"></div>
				</div>
			</form>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Edit name section -->

	<br>
	<br>



    <?php include("footer.php"); ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>