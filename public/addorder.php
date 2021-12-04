
<?php require_once("../resources/config.php");?>

<?php

  session_start();
  if(isset($_POST['checkout'])){
      $cid = $_SESSION['cid'];
      $total = $_POST["total"];
      echo $total;
      $query = "INSERT INTO `order`(`totalamount`, `cid`) VALUES ('$total', '$cid')";
      $queryrun = mysqli_query($con , $query);
      header("location: checkout.php");
      
  }


?>
