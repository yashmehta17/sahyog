<?php require_once("../resources/config.php"); ?>
<?php require_once("requirelogin.php"); ?>

<?php  
    
    if(isset($_POST['add-new-product']))
    {
        $pname = $_POST['pname'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $sql2 = "SELECT `categoryid` FROM `category` WHERE `categoryname` = '$category'";
        $result2 = mysqli_query($con, $sql2);
        $row = mysqli_fetch_assoc($result2);
        $cid = $row['categoryid'];

        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql1 = "INSERT INTO `product`(`catid`, `pname`, `price`, `description`, `productimage`) VALUES ('$cid','$pname','$price','$description','{$imgData}')";
            $result1 = mysqli_query($con, $sql1);
            $sql2 = "SELECT `pid` FROM `product` WHERE `pname` = '$pname' AND `catid` = '$cid' AND `price` = '$price' ORDER BY `pid` DESC";
            $result2 = mysqli_query($con, $sql2);
            $row = mysqli_fetch_assoc($result2);
            $pid = $row['pid'];
            if (isset($result1)) {
            header("Location: product-page.php?pid=$pid");
            }
        }


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
    <title>Add New Product</title>

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

	<div class="section">
		<div class="container">
			<form action = "add-new-product.php" method = "post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="section-title">
								<h3 class="title">Add New Product</h3>
							</div>
                            <p><strong>Product Name</strong></p>
							<div class="form-group">
                                <input type="text" class="input" id="pname" placeholder="Product Name" name="pname" value=""/>
							</div>
                            <p><strong>Category</strong></p>
                            <div class="form-group">

                            <?php 

                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($con, $sql);
                                echo '<select class="input" id="category" name="category">';
                                while ($row=mysqli_fetch_array($result)) {
                                    echo '<option>'.$row['categoryname'].'</option>';
                                };
                                echo '</select>';


                           ?>

							</div>
                            <p><strong>Price</strong></p>
                            <div class="form-group">
                                <input type="text" class="input" id="price" placeholder="Price" name="price" value=""/>
							</div>
                            <p><strong>Description</strong></p>
                            <div class="form-group">
                                <input type="text" class="input" id="description" placeholder="Description" name="description" value=""/>
							</div>
                            <div class="form-group">
                                <label for="image">Image (Square)</label><br>
                                <input type="file" id="myFile" name="image">
                            </div>
							<div class="pull-right">
								<button class="primary-btn" name="add-new-product">Save Changes</button>
							</div>
						</div>
					<div class="col-md-3"></div>
				</div>
			</form>
		</div>
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