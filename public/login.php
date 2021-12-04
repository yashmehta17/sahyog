<?php require_once("../resources/config.php"); ?>


<?php
		
		$login = true;
		session_start();
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
			header("location: index.php");
			exit;
		}
		session_abort();
			if($_SERVER['REQUEST_METHOD'] == "POST"){
					$login = false;
					$email = $_POST["email"];
					$password = $_POST["password"];
					$sql = "SELECT * FROM user INNER JOIN customer ON user.userid=customer.cemail WHERE `userid` = '$email' AND `password` = '$password' ";
					$result = mysqli_query($con, $sql);
					$num = mysqli_num_rows($result);
					if($num == 1){
						$row = mysqli_fetch_assoc($result);
						$login = true;
						session_start();
						$_SESSION['loggedin'] = true;
						$_SESSION['username'] = $email;
						$_SESSION['cid'] = $row['cid'];
						$_SESSION['cname'] = $row['cname'];
						header("location: index.php");
					}
			}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>
	<link rel="shortcut icon" href="./img/favicon.png" />
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
	<?php include("nav.php");?>
	<!-- /HEADER AND NAVIGATION -->



	<br>
	<br>

	<?php
	if(!$login){
		echo'
	<div class = "container" style ="margin-top: 10px; ">
			<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="alert alert-danger" role="alert" style = "text-align: center">
		  	Invalid Credentials !!
			</div>
	  </div>
	</div>';
	}
	?>

	<!-- LOGIN section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<form action = "login.php" method = "post">
				<div class="row">
					<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="section-title">
								<h3 class="title">Login</h3>
								<p>New here ? <a href="signup.php">Sign Up</a></p>
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="password" name="password" placeholder="Password">
							</div>
							<div class="form-group">
								<a href="forget-password.php" >Forget Password</a>
								<div class="pull-right">
								<button class="primary-btn">Login</button>
							</div>
							</div>
							
						</div>
					<div class="col-md-3"></div>
				</div>
			</form>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /LOGIN section -->

	<br>
	<br>


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
