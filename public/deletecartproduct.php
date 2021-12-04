<?php require_once("../resources/config.php");?>

<?php
  // $pid = $_GET["pid"];
  // echo $pid;
  session_start();
  // if(isset($_POST['deletebutton'])){
      $cid = $_SESSION['cid'];
      // $pid = $_POST["pid"];
      $pid = $_GET["pid"];
      echo $pid;
      echo $cid;
      $query = "DELETE FROM `cart` WHERE `cartid` = '$cid' AND `pid` = '$pid'";
      $queryrun = mysqli_query($con , $query);
      header("location: cart.php");
  


?>
