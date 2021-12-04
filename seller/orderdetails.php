<?php require_once("../resources/config.php"); ?>
<?php require_once("requirelogin.php"); ?>

<?php 
    $orderid = isset($_GET['orderid']) ? $_GET['orderid'] : '';
    $pid = isset($_GET['pid']) ? $_GET['pid'] : '';
    $query = "SELECT * FROM `orderhistory` INNER JOIN `product` ON orderhistory.pid=product.pid WHERE orderhistory.orderid = '$orderid' AND orderhistory.pid = '$pid'";
    $queryrun = mysqli_query($con , $query);
    $row = mysqli_fetch_assoc($queryrun);
    
    $cid = $row['cid'];
    $query1 = "SELECT * FROM `customer` WHERE cid = '$cid'";
    $queryrun1 = mysqli_query($con , $query1);
    $row1 = mysqli_fetch_assoc($queryrun1);

    $query2 = "SELECT * FROM `phonenumber` INNER JOIN `shippinginfo` ON phonenumber.oid = shippinginfo.oid  WHERE phonenumber.oid = '$orderid'";
    $queryrun2 = mysqli_query($con , $query2);
    $row2 = mysqli_fetch_assoc($queryrun2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="./img/favicon.png" />
	<title>Profile</title>

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


	<div class="section">
		<div class="container">
			
            <div class="col-md-6">
                <div class="order-summary clearfix">
                    <div class="section-title">
                        <h3 class="title">Customer Details</h3>
                    </div>
                    <table class="shopping-cart-table table">
                        <tbody>
                            <tr>
                                <td class="total"><strong>Customer Name</strong></td>
                                <td class="total">
                                    <?php echo $row1['cname']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="total"><strong>Address</strong></td>
                                <td class="total">
                                    <?php echo $row2['addressline1'],' ', $row2['addressline2']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="total"><strong>Phone No.</strong></td>
                                <td class="total">
                                    <?php echo $row2['phonenumber']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="total"><strong>Date</strong></td>
                                <td class="total">
                                    <?php echo $row['date']; ?>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                        
                    </table>
                    
                </div>
            </div>



            <div class="col-md-6">
				
                <div class="section-title">
                    <h3 class="title">Order Details</h3>
                </div>

                <table class="shopping-cart-table table">
                        <tbody>
                            
                            <tr>
                                <td class="total"><strong>Product Name</strong></td>
                                <td class="total">
                                    <?php echo $row['pname']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="total"><strong>Price</strong></td>
                                <td class="total">
                                    <?php echo $row['price']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="total"><strong>Quantity</strong></td>
                                <td class="total">
                                    <?php echo $row['quantity']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="total"><strong>Total Cost</strong></td>
                                <td class="total">
                                    <?php echo $row['cost']; ?>
                                </td>
                            </tr>
                        </tbody>
                        
                    </table>
                
                    <div class="pull-right">
                        <form action='confirmorder.php' method="POST">
                        <?php echo '<input type="hidden" name="orderid" value='.$orderid.'">
                        <input type="hidden" name="pid" value='.$pid.'">'; ?>
                        <button class="primary-btn" name="confirmorder">Confirm Order</button>
                        </form>
                    </div>
			</div>



		</div>
	</div>

	<?php include("footer.php"); ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
