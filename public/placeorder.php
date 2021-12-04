
<?php require_once("../resources/config.php");?>

<?php

  session_start();
  if(isset($_POST['placeorder'])){
      $cid = $_SESSION['cid'];
      $name = $_POST["name"];
      $al1 = $_POST["address1"];
      $al2 = $_POST["address2"];
      $pin = $_POST["pincode"];
      $phone = $_POST["phone"];
      $oid = $_POST["orderid"];
      $total = $_POST["total"];
      $query1 = "INSERT INTO `shippinginfo`(`name`, `addressline1`, `addressline2`, `pin`, `oid`) VALUES ('$name', '$al1', '$al2', '$pin', '$oid')";
      $queryrun1 = mysqli_query($con , $query1);
      $query6 = "SELECT * FROM `cart` WHERE cartid = '$cid'";
      $queryrun6 = mysqli_query($con , $query6);
      while($row=mysqli_fetch_array($queryrun6)){
        $pid = $row['pid'];
        $quantity = $row['quantity'];
        $query8 = "SELECT * FROM `product` WHERE `pid` = '$pid'";
        $queryrun8 = mysqli_query($con , $query8);
        $row8= mysqli_fetch_assoc($queryrun8);
        $cost = $row['cost'];
        $query3 = "INSERT INTO `orderhistory`(`orderid`, `pid`, `cid`, `quantity`, `cost`, `date`, `status`) VALUES ('$oid','$pid','$cid','$quantity','$cost',CURRENT_DATE(),'0')";
        $queryrun3 = mysqli_query($con , $query3);
      }
      $query2 = "INSERT INTO `phonenumber`(`phonenumber`, `oid`) VALUES ('$phone', '$oid')";
      $queryrun2 = mysqli_query($con , $query2);
      $query4 = "DELETE FROM `cart` WHERE cartid = '$cid'";
      $queryrun4 = mysqli_query($con , $query4);
      $query5 = "DELETE FROM `order` WHERE cid = '$cid'";
      $queryrun5 = mysqli_query($con , $query5);
      header("location: success.php");
  }

?>
