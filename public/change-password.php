<?php require_once("../resources/config.php"); ?>
<?php require_once("requirelogin.php"); ?>

<?php  
    $exists1 = false;
    $exists2 = false;
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $oldpass = $_POST['old-password'];
        $cid = $_SESSION['cid'];
        $newpass = $_POST['new-password'];
        $cnewpass = $_POST['cnew-password'];
        $sql = "SELECT * FROM user INNER JOIN customer ON user.userid=customer.cemail WHERE `cid` = '$cid' AND `password` = '$oldpass' ";
		$result = mysqli_query($con, $sql);
		$num = mysqli_num_rows($result);
        if($num==1)
        {
            if($newpass==$cnewpass)
            {
                $row = mysqli_fetch_assoc($result);
                $email = $row['cemail'];
                $sql2 = "UPDATE `user` SET `password`='$newpass' WHERE `userid`= '$email' ";
                $result2 = mysqli_query($con, $sql2);
                header("location: profile.php");
            }
            else
            {
                $exists1 = true;
            }
        }
        else
        {
            $exists2 = true;
        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./img/favicon.png" />
    <title>Change Password</title>
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
    
    <?php
    $cid = $_SESSION['cid'];
	if($exists1){
		echo'
	<div class = "container" style ="margin-top: 10px; ">
			<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="alert alert-danger" role="alert" style = "text-align: center">
            Passwords does not match !
			</div>
	  </div>
	</div>';
	}

	if($exists2){
		echo'
	<div class = "container" style ="margin-top: 10px; ">
			<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="alert alert-danger" role="alert" style = "text-align: center">
				Incorrect Password !
			</div>
		</div>
	</div>';
	}
	?>

    <br>
    <br>

	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<form action = "change-password.php" method = "post">
				<div class="row">
					<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="section-title">
								<h3 class="title">Change Password</h3>
							</div>
							<div class="form-group">
								<input class="input" type="password" name="old-password" placeholder="Old Password">
							</div>
                            <div class="form-group">
								<input class="input" type="password" name="new-password" placeholder="New Password">
							</div>
                            <div class="form-group">
								<input class="input" type="password" name="cnew-password" placeholder="Confirm New Password">
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